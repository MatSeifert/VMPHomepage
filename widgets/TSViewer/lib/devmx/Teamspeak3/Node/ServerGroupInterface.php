<?php


namespace devmx\Teamspeak3\Node;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author drak3
 */
interface ServerGroupInterface extends NodeInterface
{
    public function getID();
    public function setID($id);
    public function getIconID();
    public function setIconID();
    public function addMember($client);
    public function deleteMember($client);
    public function getName();
    public function setName($name);
    public function getSortID();
    public function setSortID($id);
    public function getType();
    public function setType($type);
}

?>
