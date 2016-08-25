<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

class Shot {
    protected $atk;
    protected $range;
    protected $limit;

    public function __construct($atk, $range,$limit)
    {
        $this->atk = $atk;
        $this->range = $range;
        $this->limit = $limit;
    }
}