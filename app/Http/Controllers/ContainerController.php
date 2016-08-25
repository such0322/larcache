<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Container;
use App\Superman;
use App\XPower;
use App\UltraBomb;
use ReflectionClass;

class ContainerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
//        $aaa=new XPower;
//        dump($aaa);
//        exit;
        $container = new Container;
//        $container->bind('xpower', function($container) {
//            return new XPower;
//        });
//        
//        $xpower=$container->make('xpower');
//        dump($xpower);
//        exit;
//        $supman=new Superman($container->make('xpower'));
//        dump($supman);
        
        $container->bind('superman', function($container, $moduleName) {
            return new Superman($container->make($moduleName));
        });
        
        $container->bind('xpower', function($container) {
            return new XPower();
        });
        // 同上
//        $container->bind('ultrabomb', function($container) {
//            return new UltraBomb;
//        });
        $ultrabomb=new UltraBomb();
        $container->bind('ultrabomb',$ultrabomb);
        
        $superman_1 = $container->make('superman', ['xpower']);
        $superman_1->usePower([10,200]);
        $superman_2 = $container->make('superman', ['ultrabomb']);
        $superman_2->usePower([1,2,3,4,5]);
        
        $reflector = new ReflectionClass('App\Superman');
        $properties=$reflector->getProperties();
        dump($properties);
        $name=$reflector->getMethods();
        dump($name);
        

        
//        $superman_3 = $container->make('superman', 'xpower');
////        
//        dump($superman_1);
        
        // 超能力模组
//        $superModule = new XPower;
//        $superModule2= new UltraBomb();
//        // 初始化一个超人，并注入一个超能力模组依赖
//        $superMan = new Superman($superModule);
//        $superMan->usePower('XPower',[10,20]);
        
        
        
//        $superman_1=new Superman([
//            'Fight' => [9, 100],
//            'Shot' => [99, 50, 2]
//        ]);
//        dump($superman_1);
        
        
//        $container = new Container;
//        
//        $container->bind('superman', function($container, $moduleName) {
//            return new Superman($container->make($moduleName));
//        });
//        $container->bind('xpower', function($container) {
//            return new XPower;
//        });
//        $container->bind('ultrabomb', function($container) {
//            return new UltraBomb;
//        });
//        dump($container);
//        $superman_1 = $container->make('superman', 'xpower');
//        $superman_2 = $container->make('superman', 'ultrabomb');
//        $superman_3 = $container->make('superman', 'xpower');
//        dump($superman_1);
        
    }

}
