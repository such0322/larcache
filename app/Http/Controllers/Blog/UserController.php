<?php

namespace App\Http\Controllers\blog;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view("blog/user/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
        $username=$request->input("username");
        $password=$request->input("password");
        if($username =="" || $password==""){
            echo json_encode(array("status"=>"0","message"=>"账号密码不能为空"));
            exit;
        }
        if(!User::select("id")->where("username",$username)->get()->toArray()){
            $user=new User();
            $user->username=$username;
            $user->password=$password;
            $uid=$user->save();
            
            $token=Crypt::encrypt($user->id);
            User::update_token($token, $user);
            echo json_encode(array("status"=>"1","token"=>$token));
        }else{
            echo json_encode(array("status"=>"0","message"=>"账户已经存在"));
        }
    }
    
    public function login(){
        return view("blog/user/login");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
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
