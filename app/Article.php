<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis as R;
use function Stringy\create as s;

class Article extends Model {

    const ONE_WEEK_IN_SECONDS = 7 * 86400;
    const VOTE_SCORE = 432;
    const ARTICLES_PRE_PAGE=10;

    //投票
    public function artice_vote($user, $article) {
        //计算投票截止时间
        $cutoff = time() - self::ONE_WEEK_IN_SECONDS;
        if (R::ZSCORE("time:", $article) < $cutoff) {
            return;
        }
        
        //记录评论人员,并增加分数和评论数
        $aid = s($article)->removeLeft("article:");
        if (R::SADD("voted:" . $aid, $user)) {
            dump($article);
            R::ZINCRBY("score:", self::VOTE_SCORE, $article);
            R::HINCRBY($article, "votes", 1);
        }
    }

    //发布文章
    public function post_artice($user, $title, $link) {
        //自增id
        $aid = R::INCR("article:");

        //投票表,默认自己已投票,可投票时间为7天
        $voted = "voted:" . $aid;
        R::SADD($voted, $user);
        R::EXPIRE($voted, self::ONE_WEEK_IN_SECONDS);

        //文章详情添加
        $now = time();
        $article = "article:" . $aid;
        R::HMSET($article, [
            'title' => $title,
            "link" => $link,
            "poster" => $user,
            "time" => $now,
            "votes" => 1,
        ]);

        //增加分数,时间,用于排序
        R::ZADD("score:", $now + self::VOTE_SCORE, $article);
        R::ZADD("time:", $now, $article);
        return $aid;
    }
    
    //获取文章
    public function get_articles($page,$order="score:"){
        $start=($page-1)*self::ARTICLES_PRE_PAGE;
        $end=$start+self::ARTICLES_PRE_PAGE-1;
        
        $ids=R::ZREVRANGE($order,$start,$end);
        $articles=[];
        foreach($ids as $id){
            $data=R::HGETALL($id);
            $data["id"]=$id;
            $articles[]=$data;
        }
        return $articles;
    }
    
    //对文章进行分组
    public function add_remove_groups($aid,$to_add=[],$to_remove=[]){
        $article="article:".$aid;
        foreach($to_add as $group){
            R::SADD('group:'.$group,$article);
        }
        foreach($to_remove as $vo){
            R::SREM('group:'.$group,$article);
        }
    }
    
    //获取组文章
    public function get_group_articles($group,$page,$order='score:'){
        $key=$order.$group;
        if(!R::EXISTS($key)){
            R::ZINTERSTORE($key,
                    ["group:".group,order],
                    $aggregate="max");
            R::EXPIRE($key,60);
        }
        return $this->get_articles($page,$key);
    }

}
