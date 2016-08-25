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
class AesEncrypt{
	
	private $key = null;
	public function __construct($key) {
		$this->key = $key;
	}
	/**
	 * 加密函数
	 * @param string data
	 * @return string 加密后的字符串
	 */
	public function encrypt($data) {
		$td = mcrypt_module_open(MCRYPT_RIJNDAEL_128,'',MCRYPT_MODE_CBC,'');
		$iv = substr($this->key,0,16);
		mcrypt_generic_init($td,$this->key,$iv);
		$length=32;
		$count = mb_strlen($data);
		$amont = $length-($count%$length);
		if($amont == 0)
			$amont = $length;
		$pad_char = chr($amont&0xFF);
		$data = $data.str_repeat($pad_char,$amont);
		$encrypted = mcrypt_generic($td,$data);
		mcrypt_generic_deinit($td);
		return $encrypted;
	}
	/**
	 * 解密函数
	 * @param string data 加密过的字符串
	 * @return string 解密后的字符串
	 */
	public function decrypt($data) {
		$td = mcrypt_module_open(MCRYPT_RIJNDAEL_128,'',MCRYPT_MODE_CBC,'');
		$iv = substr($this->key,0,16);
		mcrypt_generic_init($td,$this->key,$iv);
		$data = mdecrypt_generic($td,$data);
		mcrypt_generic_deinit($td);
		mcrypt_module_close($td);
                
		return rtrim($data,substr($data,-1));
	}
}
// $key = "273d7e70c2d115e62e0e45656ff82b39";
// $aes = new AesEncrypt($key);
// $data = '{"source_uid": "123312", "source": "qq", "source_name": "hello"}';
// // 加密
// $data = pack("N",strlen($data)).$data;
// $string = $aes->encrypt($data);
// echo base64_encode($string);
// // 解密
// echo " ||  ",$aes->decrypt($string);
?>