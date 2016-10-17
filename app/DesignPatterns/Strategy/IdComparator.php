<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\Strategy;

/**
 * Description of IdComparator
 *
 * @author admin
 */
class IdComparator implements ComparatorInterface{
    //put your code here
    
    /**
     * {@inheritdoc}
     */
    public function compare($a, $b)
    {
        if ($a['id'] == $b['id']) {
            return 0;
        } else {
            return $a['id'] < $b['id'] ? -1 : 1;
        }
    }
}
