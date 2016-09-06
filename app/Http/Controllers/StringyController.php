<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Stringy\Stringy as S;
//use function Stringy\create as s;
//use Stringy\StaticStringy as S;

use XdgBaseDir\Xdg;

class StringyController extends Controller {
    
    public function getXdg(){
        $xdg= new Xdg();
        $dir=$xdg->getHomeDir();
        dump($dir);
        $dir=$xdg->getHomeDataDir();
        dump($dir);
        $dir=$xdg->getHomeConfigDir();
        dump($dir);
        $dir=$xdg->getHomeCacheDir();
        dump($dir);
        $dir=$xdg->getDataDirs();
        dump($dir);
        $dir=$xdg->getConfigDirs();
        dump($dir);
        $dir=$xdg->getRuntimeDir(false);
        dump($dir);
    }
    
    public function getTest4(){
//        $s= s('fòô')->append('bàř')->
//        dump($s);
        
        $s= S::create("fòô")->first(2);
        dump($s);
    }
    
    public function getTest3(){
        $s=S::substr('fòôbàř', 0, 3);
        dump($s);
    }

    public function getTest2(){
        $s = s('fòô     bàř')->collapseWhitespace()->swapCase();
        dump($s);
    }

    public function getTest1() {
//        $str = strtoupper('fòôbàř');
//        dump($str);
//
//        $num = strlen('fòôbàř');
//        dump($num);
//
//
//        $s = S::create('fòô     bàř')->collapseWhitespace()->swapCase(); // 'FÒÔ BÀŘ'
//        dump($s);
//        $stringy = S::create('fòôbàř');
//        foreach ($stringy as $char) {
//            echo $char;
//        }
//
//        $stringy = S::create('fòô');
//        count($stringy);  // 3


        $stringy = S::create('bàř');
        echo $stringy[2];     // 'ř'
        echo $stringy[-2];    // 'à'
        isset($stringy[-4]);  // false
        
//        $s3=$stringy[3];          // OutOfBoundsException
//        $stringy[2] = 'a';    // Exception
        
    }

}
