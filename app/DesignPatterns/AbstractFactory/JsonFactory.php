<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\AbstractFactory;

/**
 * Description of JsonFactory
 *
 * @author admin
 */
class JsonFactory extends AbstractFactory{
    //put your code here
    public function createPicture($path, $name = '') {
        return new Json\Picture($path, $name);
    }
    public function createText($content) {
        return new Json\Text($content);
    }
}
