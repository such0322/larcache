<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of XPower
 *
 * @author ZHON020
 */
class XPower implements SuperModuleInterface {

    //put your code here

    public function activate(array $target) {
        // 这只是个例子。。具体自行脑补
        dump($target);
    }

}
