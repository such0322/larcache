<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\DesignPatterns\AbstractFactory\Html;

use App\DesignPatterns\AbstractFactory\Picture as BasePic;
/**
 * Description of Picture
 *
 * @author admin
 */
class Picture extends BasePic{
    //put your code here
    public function render() {
        return sprintf('<img src="%s" title="%s"/>', $this->path, $this->name);
    }
}
