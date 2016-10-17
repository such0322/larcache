<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\DesignPatterns\FactoryMethod;

/**
 * Description of FactoryMethod
 *
 * @author ZHON020
 */
abstract class FactoryMethod {
    //put your code here
    const CHEAP = 1;
    const FAST = 2;

    /**
     * 子类必须实现该方法
     *
     * @param string $type a generic type
     *
     * @return VehicleInterface a new vehicle
     */
    abstract protected function createVehicle($type);

    /**
     * 创建新的车辆
     *
     * @param int $type
     *
     * @return VehicleInterface a new vehicle
     */
    public function create($type)
    {
        $obj = $this->createVehicle($type);
        $obj->setColor("#f00");

        return $obj;
    }
    
}
