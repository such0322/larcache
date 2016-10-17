<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\FactoryMethod;

/**
 * Description of GermanFactory
 *
 * @author ZHON020
 */
class GermanFactory extends FactoryMethod{
    //put your code here
    protected function createVehicle($type) {
        switch ($type) {
            case parent::CHEAP:
                return new Bicycle("German");
                break;
            case parent::FAST:
                $obj = new Porsche("German");
                //因为我们已经知道是什么对象所以可以调用具体方法
                $obj->addTuningAMG();

                return $obj;
                break;
            default:
                throw new \InvalidArgumentException("$type is not a valid vehicle");
        }
    }
    
}
