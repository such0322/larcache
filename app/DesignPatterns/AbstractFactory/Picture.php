<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\AbstractFactory;

/**
 * Description of Picture
 *
 * @author admin
 */
abstract class Picture implements MediaInterface{
    //put your code here
    
     /**
     * @var string
     */
    protected $path;

    /**
     * @var string
     */
    protected $name;
    
    public function __construct($path, $name = '') {
        $this->name = (string) $name;
        $this->path = (string) $path;
    }
}
