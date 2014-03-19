<?php


namespace devmx\Teamspeak3;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 
 *
 * @author drak3
 */
class Client implements devmx\Teamspeak3\Node\ClientInterface
{
    
    public function getData() {
        return $this->data;
    }
    
}

?>
