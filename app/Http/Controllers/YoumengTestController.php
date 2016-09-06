<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Third\AesEncrypt;
use App\Third\YMCurl;

class YoumengTestController extends Controller {

    public function login() {
        $key = "fde6912680ed0107c6f774e156411321";
//        $key="273d7e70c2d115e62e0e45656ff82b39";
        $aes = new AesEncrypt($key);
        $data['user_info'] = array("name" => "moz", "gender" => 1);
        $data['source_uid'] = "123";
        $data['source'] = "self_account";
        $data = json_encode($data);
//        $data='{"user_info": {"name": "test1","icon_url": "http://umeng.com/1.jpg"},"source_uid": "4124","source": "self_account"}';
//        print_r($data);
        // 加密
        $data = pack("N", strlen($data)) . $data;
        $string = $aes->encrypt($data);
        $encode_str = base64_encode($string);
        dump($encode_str);


        $url = "https://rest.wsq.umeng.com/0/get_access_token?ak=57b6a3cf67e58e18ef001c1d";
//        $url="http://www.devdo.net";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
//        curl_setopt($ch, CURLOPT_PROTOCOLS, CURLPROTO_HTTPS);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "encrypted_data=" . $encode_str);
        $output = curl_exec($ch);
        curl_close($ch);
        dump(json_decode($output, true));

//        b0d18f098c9170bf7a4354d9b48322fea8fac87c525d9577c9a124172d35c9f626eb583473bb9ad92ec9feb60b6b832737d76bca6601a40c5efdf77f0ceb0e9a
    }

    public function userInfo() {
//        
        $uid = "57b6b370d36ef336e2a8e731";
        $url = "https://rest.wsq.umeng.com/0/user?ak=57b6a3cf67e58e18ef001c1d&uid=" . $uid;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
////        curl_setopt($ch, CURLOPT_PROTOCOLS, CURLPROTO_HTTPS);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        dump(json_decode($output, true));
    }

    public function userUpdate() {

        $token = "b0d18f098c9170bf7a4354d9b48322fea8fac87c525d9577c9a124172d35c9f626eb583473bb9ad92ec9feb60b6b832737d76bca6601a40c5efdf77f0ceb0e9a";
        $ak = "57b6a3cf67e58e18ef001c1d";
        $url = "https://rest.wsq.umeng.com/0/user/update?ak={$ak}&access_token={$token}";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_POST, TRUE);
//        curl_setopt($ch,CURLOPT_HTTPHEADER,array("X-HTTP-Method-Override: PUT"));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, "name=moz&age=18");
        $output = curl_exec($ch);
        curl_close($ch);
        dump(json_decode($output, true));
    }

    public function topicList() {
        $api = "/0/topic/community/topics";
        $params['count'] = 30;
        $params['page'] = 1;
        $rslist = YMCurl::get($api, $params);

        dump($rslist);
    }

    public function topicCate() {
        $api = "/0/topic/community/topic/categories";
        $params['count'] = 30;
        $params['page'] = 1;
        $rslist = YMCurl::get($api, $params);

        dump($rslist);
    }

    public function topicCateList() {
        $api = "/0/topic/category/topics";
        $params['t_cat_id'] = "57c9216755c400c05735ec31";
        $params['count'] = 30;
        $params['page'] = 1;
        $rslist = YMCurl::get($api, $params);

        dump($rslist);
    }

    public function topicSearch() {
        $api = "/0/topic/search";
        $params['access_token'] = "b0d18f098c9170bf7a4354d9b48322fea8fac87c525d9577c9a124172d35c9f626eb583473bb9ad92ec9feb60b6b832737d76bca6601a40c5efdf77f0ceb0e9a";
        $params['q'] = "描述";
        $params['count'] = 30;
        $params['page'] = 1;
        $rslist = YMCurl::get($api, $params);

        dump($rslist);
    }

    public function topicCreate() {
        $api="/0/topic/create";
        $token = "b0d18f098c9170bf7a4354d9b48322fea8fac87c525d9577c9a124172d35c9f626eb583473bb9ad92ec9feb60b6b832737d76bca6601a40c5efdf77f0ceb0e9a";

        $arr["name"] = "测试话题64";
        $arr["tags"] = json_encode(['标签1', '标签2']);
        $arr["icon_url"] = array(80=>"bbbb"); //["origin" => "222",80 => '',160 => ''];
        $arr["description"] = "话题描述话题描述话题描述";
        $arr["image_urls"] = json_encode([
            ['origin' => '111', '60' => '222', '360' => '333', '750' => '444', '900' => '555', 'format' => '666']
        ]);
        $arr["custom"] = json_encode(["test", "sku", "bug"]);
        
        $rslist = YMCurl::post($api, $token,$arr);
        dump($rslist);
    }

    public function feedList() {

        $api = "/0/feed/topic_timeline";
        $params['topic_id'] = "57c8f299d36ef3d3ca48cbaf";
        $params['count'] = 30;
        $params['page'] = 1;
//        $params['topic_tag']=  json_encode(["bbb","nodejs"]);
        $rslist = YMCurl::get($api, $params);

        dump($rslist);
    }

    public function feedCreate() {
        $api="/0/feed/update";
        $token = "b0d18f098c9170bf7a4354d9b48322fea8fac87c525d9577c9a124172d35c9f626eb583473bb9ad92ec9feb60b6b832737d76bca6601a40c5efdf77f0ceb0e9a";
        
        $arr["title"]="feed的标题5";
        $arr['topic_ids']="57c93a14b9a9960ba1c4d594,57c8f299d36ef3d3ca48cbaf";
        $arr['custom']=  json_encode(["aaa","sku"]);
        $arr["content"]="这是内容啊.其实用用看看.主要是搜索看看会不会搜到里面的内容.否者我也不会写这么多了";
        $arr["related_uids"]="57c001f6d36ef37ba05254c6";
        $arr["topic_tag"]=json_encode(["bbb","nodejs"]);
                
        $rslist = YMCurl::post($api, $token,$arr);
        dump($rslist);
    }
    
    public function feedSearch(){
        $api="/0/feed/search";
        $params['access_token'] = "b0d18f098c9170bf7a4354d9b48322fea8fac87c525d9577c9a124172d35c9f626eb583473bb9ad92ec9feb60b6b832737d76bca6601a40c5efdf77f0ceb0e9a";
        $params['q'] = "";
        $params['count'] = 30;
        $params['page'] = 1;
        $rslist = YMCurl::get($api, $params);

        dump($rslist);
    }

}
