<?php
namespace DesignPatterns\Structural\Facade\Tests;

use DesignPatterns\Structural\Facade\OsInterface;   
use DesignPatterns\Structural\Facade\Facade as Computer;
//use DesignPatterns\Structural\Facade\Test as Computer;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FacadeTest
 *
 * @author ZHON020
 */
class FacadeTest extends \PHPUnit_Framework_TestCase{
    //put your code here
    
    public function getComputer()
    {
        $bios = $this->getMockBuilder('DesignPatterns\Structural\Facade\BiosInterface')
                ->setMethods(array('launch', 'execute', 'waitForKeyPress'))
                ->disableAutoload()
                ->getMock();
        $os = $this->getMockBuilder('DesignPatterns\Structural\Facade\OsInterface')
                ->setMethods(array('getName'))
                ->disableAutoload()
                ->getMock();
        $bios->expects($this->once())
                ->method('launch')
                ->with($os);
        $os->expects($this->once())
                ->method('getName')
                ->will($this->returnValue('Linux'));

        $facade = new Computer($bios, $os);
        return array(array($facade, $os));
    }

    /**
     * @dataProvider getComputer
     */
    public function testComputerOn(Computer $facade, OsInterface $os)
    {
        // interface is simpler :
        $facade->turnOn();
        // but I can access to lower component
        $this->assertEquals('Linux', $os->getName());
    }
}
