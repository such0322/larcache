<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Third\AesEncrypt;

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
        curl_setopt($ch, CURLOPT_POSTFIELDS, "name=moz11&age=18");
        $output = curl_exec($ch);
        curl_close($ch);
        dump(json_decode($output, true));
    }

}
