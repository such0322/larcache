<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\Decorator;

/**
 * Description of Decorator
 *
 * @author admin
 */
abstract class Decorator implements RendererInterface{
    //put your code here
    
    /**
     * @var RendererInterface
     */
    protected $wrapped;

    /**
     * 必须类型声明装饰组件以便在子类中可以调用renderData()方法
     *
     * @param RendererInterface $wrappable
     */
    public function __construct(RendererInterface $wrappable)
    {
        $this->wrapped = $wrappable;
    }
}
