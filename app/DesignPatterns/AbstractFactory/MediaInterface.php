<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\AbstractFactory;

/**
 * Description of MediaInterface
 *
 * @author admin
 */
interface  MediaInterface {
    //put your code here
    
    /**
     * JSON 或 HTML（取决于具体类）输出的未经处理的渲染
     *
     * @return string
     */
    public function render();
}
