<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\DesignPatterns\AbstractFactory\Html;

use App\DesignPatterns\AbstractFactory\Text as BaseText;
/**
 * Description of Text
 *
 * @author admin
 */
class Text extends BaseText{
    //put your code here
    public function render() {
        return '<div>' . htmlspecialchars($this->text) . '</div>';
    }
}
