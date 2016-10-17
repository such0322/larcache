<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\DesignPatterns\AbstractFactory\Json;

use App\DesignPatterns\AbstractFactory\Text as BaseText;
/**
 * Description of Text
 *
 * @author admin
 */
class Text extends BaseText{
    //put your code here
    public function render() {
        return json_encode(array('content' => $this->text));
    }
}
