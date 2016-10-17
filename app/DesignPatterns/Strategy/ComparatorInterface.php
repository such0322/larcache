<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\Strategy;

/**
 * Description of ComparatorInterface
 *
 * @author admin
 */
interface  ComparatorInterface {
    //put your code here
    /**
     * @param mixed $a
     * @param mixed $b
     *
     * @return bool
     */
    public function compare($a, $b);
}
