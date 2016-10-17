<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\Strategy;

/**
 * Description of DateComparator
 *
 * @author admin
 */
class DateComparator implements ComparatorInterface{
    //put your code here
    
    /**
     * {@inheritdoc}
     */
    public function compare($a, $b)
    {
        $aDate = new \DateTime($a['date']);
        $bDate = new \DateTime($b['date']);

        if ($aDate == $bDate) {
            return 0;
        } else {
            return $aDate < $bDate ? -1 : 1;
        }
    }
}
