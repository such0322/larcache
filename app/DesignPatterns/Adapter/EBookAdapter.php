<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\Adapter;

/**
 * Description of EBookAdapter
 *
 * @author admin
 */
class EBookAdapter implements PaperBookInterface{
    //put your code here
    
    /**
     * @var EBookInterface
     */
    protected $eBook;

    /**
     * 注意该构造函数注入了电子书接口EBookInterface
     *
     * @param EBookInterface $ebook
     */
    public function __construct(EBookInterface $ebook)
    {
        $this->eBook = $ebook;
    }

    /**
     * 电子书将纸质书接口方法转换为电子书对应方法
     */
    public function open()
    {
        $this->eBook->pressStart();
    }

    /**
     * 纸质书翻页转化为电子书翻页
     */
    public function turnPage()
    {
        $this->eBook->pressNext();
    }
}
