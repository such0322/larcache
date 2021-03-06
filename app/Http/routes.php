<?php

use Illuminate\Support\Facades\Redis;

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', "IndexController@index");
Route::get("list", "PostController@index");
Route::get("post/create", "PostController@create");
Route::get("post/random", "PostController@showRandom");
Route::get("post/{id}", "PostController@show");
Route::get("showCount", "PostController@showAllCount");
Route::get("game/create/{name}/{thread}/{index}", "RedisTestController@create");
Route::get("game/read", "RedisTestController@index");

Route::get("chat", "ChatController@index");


Route::get('publish', function () {
    // 路由逻辑...
    Redis::publish('test-channel', json_encode(['foo' => 'bar']));
});

Route::get('/foo', function () {
    $exitCode = Artisan::call('email:send', [
                'user' => 1, '--queue' => 'default'
    ]);
});


Route::get("cont1", "ContainerController@index");


Route::group(['prefix' => 'ym'], function() {
    Route::get("login", "YoumengTestController@login");
    Route::get("userInfo", "YoumengTestController@userInfo");
    Route::get("userUpdate", "YoumengTestController@userUpdate");
    Route::get("topicList", "YoumengTestController@topicList");
    Route::get("topicCate", "YoumengTestController@topicCate");
    Route::get("topicCateList", "YoumengTestController@topicCateList");
    Route::get("topicSearch", "YoumengTestController@topicSearch");
    Route::get("topicCreate", "YoumengTestController@topicCreate");
    
    Route::get("feedList", "YoumengTestController@feedList");
    Route::get("feedCreate", "YoumengTestController@feedCreate");
    Route::get("feedSearch", "YoumengTestController@feedSearch");
    
});

Route::group(['prefix' => 'react'], function() {
    Route::get("index", "ReactTestController@index");
    Route::get("test1", "ReactTestController@test1");
    Route::get("test2", "ReactTestController@test2");
    Route::get("test3", "ReactTestController@test3");
    Route::get("test4", "ReactTestController@test4");
    Route::get("test5", "ReactTestController@test5");
    Route::get("test6", "ReactTestController@test6");
    Route::get("dataReturn", "ReactTestController@dataReturn");
    Route::get("test7", "ReactTestController@test7");
    Route::post("dataReturn", "ReactTestController@dataReturnPost");
    Route::get("test8", "ReactTestController@test8");
});


//Route::group(["prefix"=>"stringy"],function(){
//    Route::get("index","StringyController@index");
//});
Route::controller("stringy","StringyController");

Route::controller("article","ArticleController");

Route::group(['namespace' => 'Blog','prefix' => 'blog'],function(){
    Route::resource("/","ArticleController",['except' => ['show','edit', 'update', 'destroy']]);
    
    Route::controller("api","ApiController");
    
    Route::group(['prefix' => 'user'],function(){
        Route::get("create","UserController@create");
        Route::post("create","UserController@store");
        Route::get("login","UserController@login");
        Route::post("login","UserController@dologin");
        Route::get("logout","UserController@logout");
    });
});

//设计模式
Route::group(['prefix' => 'DesignPatterns'],function(){
    //门面
    Route::get("DPFacade","DesignPatternsController@DPFacade");
    //依赖注入
    Route::get("DITest","DesignPatternsController@DITest");
    //单例
    Route::get("SingletonTest","DesignPatternsController@SingletonTest");
//    SFTest 简单工厂
    Route::get("SFTest","DesignPatternsController@SFTest");
    //工厂
    Route::get("FMTest","DesignPatternsController@FMTest");
//    AFTest 抽象工厂
    Route::get("AFTest","DesignPatternsController@AFTest");
//    ProxyTest 代理
    Route::get("ProxyTest","DesignPatternsController@ProxyTest");
//    ObserverTest 观察者
    Route::get("ObserverTest","DesignPatternsController@ObserverTest");
//    StrategyTest 策略
    Route::get("StrategyTest","DesignPatternsController@StrategyTest");
//    DecoratorTest 装饰
    Route::get("DecoratorTest","DesignPatternsController@DecoratorTest");
//    AdapterTest 适配器
    Route::get("AdapterTest","DesignPatternsController@AdapterTestt");
    
});
