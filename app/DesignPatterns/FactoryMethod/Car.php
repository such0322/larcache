<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\FactoryMethod;

/**
 * Description of Car
 *
 * @author ZHON020
 */
abstract class Car {
    protected $factory;
    public $name;
    //put your code here
    public function __construct($factory) {
        $this->factory=$factory;
        $this->name=static::setName();
        
    }
    abstract static protected function setName();

    public function getName() {
        return $this->factory."-".$this->name;
    }
}
