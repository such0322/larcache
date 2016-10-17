<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\FactoryMethod;

/**
 * Description of Bicycle
 *
 * @author ZHON020
 */
class Bicycle extends Car implements VehicleInterface{
    //put your code here
    /**
     * @var string
     */
    protected $color;

    /**
     * 设置自行车的颜色
     *
     * @param string $rgb
     */
    public function setColor($rgb)
    {
        $this->color = $rgb;
    }
    
    protected static function setName() {
        return "Bicycle";
    }
}
