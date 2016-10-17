<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\DependencyInjection;

/**
 * Description of ArrayConfig
 *
 * @author ZHON020
 */
class ArrayConfig extends AbstractConfig implements Parameters{
    //put your code here
    /**
     * 获取参数
     *
     * @param string|int $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        if (isset($this->storage[$key])) {
            return $this->storage[$key];
        }
        return $default;
    }

    /**
     * 设置参数
     *
     * @param string|int $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        $this->storage[$key] = $value;
    }
    
}
