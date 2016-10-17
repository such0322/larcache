<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\Observer;

/**
 * Description of UserObserver
 *
 * @author admin
 */
class UserObserver implements \SplObserver{
    //put your code here
    public function update(\SplSubject $subject) {
        echo get_class($subject) . ' has been updated';
    }
}
