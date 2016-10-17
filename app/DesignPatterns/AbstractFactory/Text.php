<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\AbstractFactory;

/**
 * Description of html
 *
 * @author admin
 */
abstract class Text implements MediaInterface{
    //put your code here
    
    /**
     * @var string
     */
    protected $text;

    /**
     * @param string $text
     */
    public function __construct($text) {
        $this->text=(string)$text;
    }
}
