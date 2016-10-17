<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DesignPatterns\Decorator;

/**
 * Description of RenderInXml
 *
 * @author admin
 */
class RenderInXml extends Decorator {

    //put your code here
    /**
     * render data as XML
     *
     * @return mixed|string
     */
    public function renderData() {
        $output = $this->wrapped->renderData();

        // do some fancy conversion to xml from array ...

        $doc = new \DOMDocument();

        foreach ($output as $key => $val) {
            $doc->appendChild($doc->createElement($key, $val));
        }

        return $doc->saveXML();
    }

}
