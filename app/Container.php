<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;
use Closure;

class Container
{
    protected $binds;

    protected $instances;

    public function bind($abstract, $concrete)
    {
//        dump($abstract);
//        dump($concrete);
//        dump($concrete instanceof Closure);
        if ($concrete instanceof Closure) {
            $this->binds[$abstract] = $concrete;
        } else {
            $this->instances[$abstract] = $concrete;
        }
    }

    public function make($abstract, $parameters = [])
    {
//        dump($abstract);
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }
//        dump($abstract);
//        dump($parameters);
//        dump($this);
        array_unshift($parameters, $this);

        return call_user_func_array($this->binds[$abstract], $parameters);
    }
}