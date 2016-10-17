<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Structural\Facade;

/**
 *
 * @author ZHON020
 */
interface BiosInterface {
    //put your code here
    /**
     * execute the BIOS
     */
    public function execute();

    /**
     * wait for halt
     */
    public function waitForKeyPress();

    /**
     * launches the OS
     *
     * @param OsInterface $os
     */
    public function launch(OsInterface $os);

    /**
     * power down BIOS
     */
    public function powerDown();
}
