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


namespace devmx\Teamspeak3\Query\Transport;

/**
 * Base class for an QueryTransport decorator
 * The concrete class just have to overwrite the methods it wants
 * @author drak3
 */
abstract class AbstractQueryDecorator implements TransportInterface
{

    /**
     * @var \devmx\TeamSpeak3\Query\Transport\TransportInterface
     */
    protected $decorated;

    public function __construct(TransportInterface $toDecorate)
    {
        $this->decorated = $toDecorate;
    }

    public function connect()
    {
        return $this->decorated->connect();
    }

    public function disconnect()
    {
        return $this->decorated->disconnect();
    }

    public function getAllEvents()
    {
        return $this->decorated->getAllEvents();
    }

    public function isConnected()
    {
        return $this->decorated->isConnected();
    }

    public function sendCommand(\devmx\Teamspeak3\Query\Command $command)
    {
        return $this->decorated->sendCommand($command);
    }
    
    public function query($name, array $args=Array(),array $options=Array())
    {
        return $this->decorated->query($name, $args, $options);
    }
    

    public function waitForEvent()
    {
        return $this->decorated->waitForEvent();
    }
    
    public function __clone() {
        $this->decorated = clone $this->decorated;
    }

}

?>
