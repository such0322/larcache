<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\FactoryMethod;

/**
 * Description of ItalianFactory
 *
 * @author ZHON020
 */
class ItalianFactory extends FactoryMethod{
    //put your code here
    protected function createVehicle($type) {
        switch ($type) {
            case parent::CHEAP:
                return new Bicycle("Italian");
                break;
            case parent::FAST:
                return new Ferrari("Italian");
                break;
            default:
                throw new \InvalidArgumentException("$type is not a valid vehicle");
        }
    }
}
