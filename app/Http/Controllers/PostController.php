<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Postmeta;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class PostController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $posts = Post::orderBy("id", "desc")->paginate(10);
        return view("list")->with("posts", $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //

        $posts = array();
        $time = time();
        for ($i = 1; $i <= 1000; $i++) {
            $posts[] = array(
                'title' => str_random(10),
                'content' => str_random(40),
                'desc' => $i . "--" . bcrypt(str_random(5)),
                'status' => 1,
                'type' => 1,
                "created_at" => $time,
                "updated_at" => $time,
            );
        }
        for ($a = 0; $a < 100; $a++) {
            Post::insert($posts);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $st = microtime(1);
        if (Cache::has($id)) {
            $view = Cache::get($id);
        } else {
            $post = Post::find($id);
            $view = view("post")->with("post", $post)->render();
            $cacheTime = config("cache.cache_time");
            $expiresAt = \Carbon\Carbon::now()->addMinutes($cacheTime);
            Cache::put($id, $view, $expiresAt);
        }
        
        Post::addReads($id);
        $et = microtime(1);
        dump($et - $st);
        return $view;
    }
    
    public function showAllCount(){
        Redis::get();
    }
    
    public function showRandom(){
        $id=  rand(1, 603101);
        $st = microtime(1);
        if (Cache::has($id)) {
            $view = Cache::get($id);
        } else {
            $post = Post::find($id);
            $view = view("post")->with("post", $post)->render();
            $cacheTime = config("cache.cache_time");
            $expiresAt = \Carbon\Carbon::now()->addMinutes($cacheTime);
            Cache::put($id, $view, $expiresAt);
        }
        
        Post::addReads($id);
        $et = microtime(1);
        Postmeta::addMeta($id,"use_time",$et-$st);
        return $view;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
