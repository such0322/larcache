<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

class Superman {

//    protected $power;
//
//    public function __construct(array $modules)
//    {
//        // 初始化工厂
//        $factory = new SuperModuleFactory;
//
//        // 通过工厂提供的方法制造需要的模块
////        $this->power = $factory->makeModule('Fight', [9, 100]);
//        // $this->power = $factory->makeModule('Force', [45]);
//        // $this->power = $factory->makeModule('Shot', [99, 50, 2]);
//        /*
//        $this->power = array(
//            $factory->makeModule('Force', [45]),
//            $factory->makeModule('Shot', [99, 50, 2])
//        );
//        */
//        
//        foreach ($modules as $moduleName => $moduleOptions) {
//            $this->power[] = $factory->makeModule($moduleName, $moduleOptions);
//        }
//    }


    protected $module;
    protected $aaa;

    public function __construct(SuperModuleInterface $module) {
        $this->module = $module;
        $aaa=1;
    }

    public function usePower(array $target) {
        $this->module->activate($target);
    }

}
