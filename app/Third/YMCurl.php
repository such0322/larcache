<?php

/*
 * Created on 2016-04-28
 *
 * @author xingang
 * @require (PHP 4 >= 4.0.2, PHP 5, PHP 7)
 * @require  key length must more than 16 !!!
 * @required_php_extention mcrypt
 */

namespace App\Third;

class YMCurl {
    
    public static function get($api,$params=array()){
        $ak = "57b6a3cf67e58e18ef001c1d";
        $arr['ak']=$ak;
        $arr=$params?array_merge($arr,$params):$arr;
        $url_str=http_build_query($arr);
        $url = "https://rest.wsq.umeng.com/{$api}?{$url_str}";
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output, true);
        
    }
    
    public static function post($api,$token,$params=array()){
        $ak = "57b6a3cf67e58e18ef001c1d";
        $arr['ak']=$ak;
        $arr['access_token']=$token;
        $url_str=http_build_query($arr);
        $url = "https://rest.wsq.umeng.com/{$api}?{$url_str}";
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output, true);
    }
    
    public static function put(){
        
    }

}

?>