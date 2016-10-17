<?php

namespace App\DesignPatterns\DependencyInjection;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AbstractConfig
 *
 * @author ZHON020
 */
abstract class AbstractConfig {

    //put your code here
    protected $storage;

    public function __construct($storage) {
        $this->storage = $storage;
    }

}
