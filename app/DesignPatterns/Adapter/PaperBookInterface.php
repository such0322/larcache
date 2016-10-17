<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\DesignPatterns\Adapter;
/**
 *
 * @author admin
 */
interface PaperBookInterface {
    //put your code here
    
    /**
     * 翻页方法
     *
     * @return mixed
     */
    public function turnPage();

    /**
     * 打开书的方法
     *
     * @return mixed
     */
    public function open();
}
