<?php
namespace App\DesignPatterns\Observer;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author admin
 */
class User implements \SplSubject{
    //put your code here
    /**
     * user data
     *
     * @var array
     */
    protected $data = array();

    /**
     * observers
     *
     * @var \SplObjectStorage
     */
    protected $observers;
    
    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }
    
    public function attach(\SplObserver $observer) {
        $this->observers->attach($observer);
    }
    public function detach(\SplObserver $observer) {
        $this->observers->detach($observer);
    }
    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
    
    /**
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return void
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;

        // 通知观察者用户被改变
        $this->notify();
    }
}
