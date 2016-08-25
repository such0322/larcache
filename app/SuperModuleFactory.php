<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

class SuperModuleFactory
{
    public function makeModule($moduleName, $options)
    {
        switch ($moduleName) {
            case 'Fight': 
                return new Fight($options[0], $options[1]);
            case 'Force': 
                return new Force($options[0]);
            case 'Shot': 
                return new Shot($options[0], $options[1], $options[2]);
        }
    }
}