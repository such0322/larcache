<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\Decorator;

/**
 * Description of RenderInJson
 *
 * @author admin
 */
class RenderInJson extends Decorator {
    //put your code here

    /**
     * render data as JSON
     *
     * @return mixed|string
     */
    public function renderData() {
        $output = $this->wrapped->renderData();
        
        return json_encode($output);
    }
    
    public function aaa(){
        $output = $this->wrapped->renderData();
        return $output;
    }

}
