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

namespace devmx\Teamspeak3\Query;
use devmx\Transmission\TransmissionInterface;
use devmx\Teamspeak3\Transport\CommandTranslatorInterface;
use devmx\Teamspeak3\Query\Transport\ResponseHandlerInterface;

/**
 * Abstraction of the Teamspeak3-Query
 * @author drak3
 */
class QueryTransport implements \devmx\Teamspeak3\Query\Transport\TransportInterface
{
    /**
     * Constructs a common Query which should fit to the official query
     * @param string $host the host of the Ts3-Server
     * @param int $port the Queryport of the Ts3-Server
     * @return QueryTransport 
     * @deprecated
     */
    public static function getCommon($host, $port)  {
        $trans = new \devmx\Transmission\TCP($host, $port);
        return new QueryTransport($trans, new Transport\Common\CommandTranslator(), new Transport\Common\ResponseHandler());
    }
    
    /**
     *
     * @var TransmissionInterface 
     */
    protected $transmission;
    /**
     *
     * @var CommandTranslatorInterface 
     */
    protected $commandTranslator;
    /**
     *
     * @var ResponseHandlerInterface 
     */
    protected $responseHandler;
    
    protected $isConnected = FALSE;
    
    protected $pendingEvents = Array();
    
    /**
     *
     * @param TransmissionInterface $transmission
     * @param \devmx\Teamspeak3\Query\Transport\CommandTranslatorInterface $translator
     * @param ResponseHandlerInterface $responseHandler 
     */
    public function __construct(TransmissionInterface $transmission,
                                \devmx\Teamspeak3\Query\Transport\CommandTranslatorInterface $translator,
                                ResponseHandlerInterface $responseHandler) {
        $this->transmission = $transmission;
        $this->commandTranslator = $translator;
        $this->responseHandler = $responseHandler;
        
    }
    
    /**
     * Sets a new CommandTranslator
     * @param Transport\CommandTranslatorInterface $translator 
     */
    public function setTranslator(Transport\CommandTranslatorInterface $translator) {
        $this->commandTranslator = $translator;
    }
    
    public function getTranslator() {
        return $this->commandTranslator;
    }
    
    /**
     * Sets a new ResponseHandler
     * @param ResponseHandlerInterface $handler 
     */
    public function setHandler(ResponseHandlerInterface $handler) {
        $this->responseHandler = $handler;
    }
    
    public function getHandler() {
        return $this->responseHandler;
    }
    
    public function getTransmission() {
        return $this->transmission;
    }
    
    /**
     * Connects to the Server
     */
    public function connect() {
        try {
           $this->transmission->establish();
            $this->checkWelcomeMessage();
            $this->isConnected = TRUE; 
        } catch(\Exception $e) {
            throw new \RuntimeException('Cannot connect: '.$e->getMessage());
        }
        
    }
    
    /**
     * Returns wether the transport is connected to a server or not
     * @return boolean 
     */
    public function isConnected() {
        return $this->isConnected;
    }
    
    /**
     * Returns all events occured since last time checking the query
     * This method is non-blocking, so it returns even if no event is on the query
     * @param boolean $dryRun if this is true just the internal event storage, 
     * where events occured before call to sendCommand are stored, is checked.
     * @return array Array of all events lying on the query  
     */
    public function getAllEvents($dryRun=FALSE)
    {
        if(!$dryRun) {
            if(!$this->isConnected()) {
                throw new \BadMethodCallException('Connection not established');
            }
            $response = $this->transmission->getAll();
            if ( $response )
            {
                while ( !$this->responseHandler->isCompleteEvent( $response ) )
                {
                    $response .= $this->transmission->receiveLine();
                }
            } else {
                return;
            }
            $events = array_merge($this->pendingEvents, $this->responseHandler->getEventInstances( $response ));
            $this->pendingEvents = Array();
           return $events;
        }
        else {
            $events = $this->pendingEvents;
            $this->pendingEvents = Array();
            return $events;
        }
    }
    
    /**
     * Sends a command to the query and returns the result
     * All occured events are stored internaly, and can be get via getAllEvents
     * @param \devmx\Teamspeak3\Query\Command $command
     * @return CommandResponse
     */
    public function sendCommand( \devmx\Teamspeak3\Query\Command $command )
    {
     
        $data = '';


        $this->transmission->send( $this->commandTranslator->translate( $command ) );

        while ( !$this->responseHandler->isCompleteResponse( $data ) )
        {
            $data .= $this->transmission->receiveLine();
        }

        $responses = $this->responseHandler->getResponseInstance( $command , $data );
        
        $this->pendingEvents = array_merge($this->pendingEvents,$responses['events']);
        return $responses['response'];
    }
    
    public function query($cmdname, array $params=Array(),array $options=Array()) {
        return $this->sendCommand(new Command($cmdname , $params , $options));
    }
    
    /**
     * Waits until an event occurs
     * This method is blocking, it returns only if a event occurs, so avoid calling this method if you aren't registered to any events
     * @return array array of all occured events (e.g if two events occur together it is possible to get 2 events) 
     */
    public function waitForEvent()
    {
        if($this->pendingEvents !== Array()) {
            $events =  $this->pendingEvents;
            $this->pendingEvents = Array();
            return $events;
        }
        
        $response = '';
        while ( !$this->responseHandler->isCompleteEvent( $response ))
        {
            $response .= $this->transmission->receiveLine();
        }
        $events = $this->responseHandler->getEventInstances( $response );
        return $events;
    }
    
    public function disconnect() {
        // because disconnect could be also called on invalid servers, we just send the quit message and don't wait for any response
        $this->transmission->send("quit\n");
        $this->transmission->close();
        $this->isConnected = FALSE;
    }
    
    /**
     * Checks the welcome message
     * @throws \RuntimeException if the welcomemessage is not valid
     */
    protected function checkWelcomeMessage()
    {

        $welcome = $this->transmission->receiveData( $this->responseHandler->getWelcomeMessageLength() );
        if ( !$this->responseHandler->isWelcomeMessage( $welcome ) )
        {
            $this->disconnect();
            throw new \RuntimeException( "Server is not valid" );
        }

    }
    
    public function __clone() {
        $this->transmission = clone $this->transmission;
    }
    
    
}

?>
