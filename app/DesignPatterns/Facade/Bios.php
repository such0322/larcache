<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\Facade;

/**
 * Description of Bios
 *
 * @author ZHON020
 */
class Bios implements BiosInterface{
    //put your code here
    public function execute() {
        echo "系统启动...</br>";
    }
    public function waitForKeyPress() {
        echo "等待按键...</br>";
    }
    public function launch(OsInterface $os) {
        echo "系统载入中..</br>";
        dump($os->getName());
        echo "系统载入完成..</br>";
    }
    public function powerDown() {
        echo "bios 关闭中...</br>";
    }
    
}
