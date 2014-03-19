<?php

/*
  This file is part of TeamSpeak3 Library.

  TeamSpeak3 Library is free software: you can redistribute it and/or modify
  it under the terms of the GNU Lesser General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  TeamSpeak3 Library is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU Lesser General Public License for more details.

  You should have received a copy of the GNU Lesser General Public License
  along with TeamSpeak3 Library. If not, see <http://www.gnu.org/licenses/>.
 */
namespace devmx\Teamspeak3\Query\Transport\Decorator;
use devmx\Teamspeak3\Query\Transport\AbstractQueryDecorator;
use devmx\Teamspeak3\Query\Command;

/**
 *
 * @author drak3
 */
class DebuggingDecorator extends AbstractQueryDecorator
{
    
    protected $openedConnections;
    protected $closedConnections;
    protected $sentCommands = array();
    protected $receivedResponses = array();
    protected $receivedEvents = array();
    static protected $cloned = 0;
    
    public function getOpenedConnections()
    {
        return $this->openedConnections;

    }

    public function getClosedConnections()
    {
        return $this->closedConnections;

    }

    public function getSentCommands()
    {
        return $this->sentCommands;

    }

    public function getReceivedResponses()
    {
        return $this->receivedResponses;

    }

    public function getReceivedEvents()
    {
        return $this->receivedEvents;

    }

    static public function getCloned()
    {
        return self::$cloned;
    }

    
    public function connect()
    {
        $this->openedConnections++;
        return $this->decorated->connect();
    }

    public function disconnect()
    {
        $this->closedConnections++;
        return $this->decorated->disconnect();
    }

    public function getAllEvents()
    {
        $events = $this->decorated->getAllEvents();
        $this->receivedEvents = array_merge($this->receivedEvents, $events);
        return $events;
    }

    public function sendCommand(\devmx\Teamspeak3\Query\Command $command)
    {
        $response = $this->decorated->sendCommand($command);
        $this->sentCommands[] = $command;
        $this->receivedResponses[] = $response;
        return $response;
    }
    
    public function query($name, array $args=array(), array $options=array()) {
        $response = $this->decorated->query($name , $args , $options);
        $this->sentCommands[] = new Command($name, $args, $options);
        $this->receivedResponses[] = $response;
        return $response;
    }
    
    public function waitForEvent()
    {
        $events = $this->decorated->waitForEvent();
        $this->receivedEvents = array_merge($this->receivedEvents, $events);
        return $events;
    }
    
    public function __clone() {
        $this->decorated = clone $this->decorated;
        self::$cloned++;
    }
    
}

?>
