<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\FactoryMethod;

/**
 * Description of Porsche
 *
 * @author ZHON020
 */
class Porsche extends Car implements VehicleInterface{
    //put your code here
    /**
     * @var string
     */
    protected $color;

    /**
     * @param string $rgb
     */
    public function setColor($rgb)
    {
        $this->color = $rgb;
    }
    
    protected static function setName() {
        return "Porsche";
    }

    /**
     * 尽管只有奔驰汽车挂有AMG品牌，这里我们提供一个空方法仅作代码示例
     */
    public function addTuningAMG()
    {
    }
}
