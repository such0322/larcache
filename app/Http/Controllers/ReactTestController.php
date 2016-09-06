<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comment;

class ReactTestController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        
        return view("react/index")->with("aaa", "welcome my larcache");
    }

    public function test1() {
        return view("react/test1");
    }

    public function test2() {
        return view("react/test2");
    }

    public function test3() {
        return view("react/test3");
    }

    public function test4() {
        return view("react/test4");
    }

    public function test5() {
        return view("react/test5");
    }

    public function test6() {
        return view("react/test6");
    }
    
    public function dataReturn(){
        
        $data=  Comment::getList();
        echo json_encode($data);
    }
    
    public function test7() {
        return view("react/test7");
    }
    
    public function dataReturnPost(Request $request){
        $author=$request->input("author");
        $text=$request->input("text");
        $comment=new Comment();
        $comment->author=$author;
        $comment->text=$text;
        $rs=$comment->save();
        if($rs){
            $data=Comment::getList();
            echo json_encode($data);
        }else{
            echo json_decode(array("message"=>"失败","error"=>1));
        }
    }
    
    public function test8(){
        return view("react/test8");
    }
    
    

}
