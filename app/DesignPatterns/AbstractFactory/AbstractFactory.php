<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\DesignPatterns\AbstractFactory;
/**
 * Description of AbstractFactory
 *
 * @author admin
 */
abstract class AbstractFactory {
    //put your code here
    
    /**
     * 创建本文组件
     *
     * @param string $content
     *
     * @return Text
     */
    abstract public function createText($content);

    /**
     * 创建图片组件
     *
     * @param string $path
     * @param string $name
     *
     * @return Picture
     */
    abstract public function createPicture($path, $name = '');
}
