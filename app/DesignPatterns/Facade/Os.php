<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\Facade;

/**
 * Description of Os
 *
 * @author ZHON020
 */
class Os implements OsInterface {
    
    private $osName;


    public function __construct($osName) {
        $this->osName=$osName;
    }

    public function halt() {
        echo "系统停止中...</br>";
    }
    
    public function getName(){
        return $this->osName;
    }
}