<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\Adapter;

/**
 * Description of Book
 *
 * @author admin
 */
class Book implements PaperBookInterface{
    //put your code here
    
    /**
     * {@inheritdoc}
     */
    public function open()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function turnPage()
    {
    }
}
