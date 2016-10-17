<?php
namespace App\DesignPatterns\Strategy;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ObjectCollection
 *
 * @author admin
 */
class ObjectCollection {
    //put your code here
    
     /**
     * @var array
     */
    private $elements;

    /**
     * @var ComparatorInterface
     */
    private $comparator;

    /**
     * @param array $elements
     */
    public function __construct(array $elements = array())
    {
        $this->elements = $elements;
    }

    /**
     * @return array
     */
    public function sort()
    {
        if (!$this->comparator) {
            throw new \LogicException("Comparator is not set");
        }

        $callback = array($this->comparator, 'compare');
        dump($callback);
        uasort($this->elements, $callback);

        return $this->elements;
    }

    /**
     * @param ComparatorInterface $comparator
     *
     * @return void
     */
    public function setComparator(ComparatorInterface $comparator)
    {
        $this->comparator = $comparator;
    }
}
