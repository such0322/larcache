<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\DependencyInjection;

/**
 * Description of Parameters
 *
 * @author ZHON020
 */
interface  Parameters {
    //put your code here
    /**
     * 获取参数
     *
     * @param string|int $key
     *
     * @return mixed
     */
    public function get($key);

    /**
     * 设置参数
     *
     * @param string|int $key
     * @param mixed      $value
     */
    public function set($key, $value);
}
