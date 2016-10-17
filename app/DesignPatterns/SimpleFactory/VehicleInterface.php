<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\SimpleFactory;

/**
 *
 * @author ZHON020
 */
interface VehicleInterface {
    //put your code here
    /**
     * @param mixed $destination
     *
     * @return mixed
     */
    public function driveTo($destination);
}
