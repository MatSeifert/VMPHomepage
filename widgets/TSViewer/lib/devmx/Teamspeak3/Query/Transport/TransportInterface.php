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
 *
 * @author drak3
 */
interface TransportInterface
{

    /**
     * Connects to the Server
     */
    public function connect();

    /**
     * Returns wether the transport is connected to a server or not
     * @return boolean 
     */
    public function isConnected();

    /**
     * Returns all events occured since last time checking the query
     * This method is non-blocking, so it returns even if no event is on the query
     * @return array Array of all events lying on the query  
     */
    public function getAllEvents();

    /**
     * Sends a command to the query and returns the result plus all occured events
     * @param \devmx\Teamspeak3\Query\Command $command
     * @return \devmx\Teamspeak3\Query\CommandResponse
     */
    public function sendCommand(\devmx\Teamspeak3\Query\Command $command);
    
    /**
     * Wrapper for new Command and sendcommand
     * @return \devmx\Teamspeak3\Query\CommandResponse
     */
    public function query($name, array $args=Array(),array $options=Array());
    
    /**
     * Waits until an event occurs
     * This method is blocking, it returns only if a event occurs, so avoid calling this method if you aren't registered to any events
     * @return array array of all occured events (e.g if two events occur together it is possible to get 2 events) 
     */
    public function waitForEvent();

    public function disconnect();
}

?>
