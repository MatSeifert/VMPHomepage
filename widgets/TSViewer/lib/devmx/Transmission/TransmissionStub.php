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
namespace devmx\Transmission;

/**
 *
 * @author drak3
 */
class TransmissionStub implements \devmx\Transmission\TransmissionInterface
{
    protected $isEstablished = false;
    protected $host;
    protected $port;
    protected $sentData = '';
    protected $toReceive = '';
    protected $received = '';
    protected $errorOnDelay = false;
    protected static $cloned = 0;
    
    public function construct($host, $port) {
        $this->host = $host;
        $this->port = $port;
    }
       
    public function establish() {
        $this->isEstablished = true;
    }

    public function getPort() {
        return $this->port;
    }

    public function getHost() {
        return $this->host;
    }

    public function isEstablished() {
        return $this->isEstablished;
    }

    public function send($data) {
        if(!$this->isEstablished()) {
            throw new \BadMethodCallException('Cannot send: Connection not established');
        }
        $this->sentData .= $data;
        return strlen($data);
    }
    
    public function getSentData() {
        return $this->sentData;
    }
    
    public function setSentData($data) {
        $this->sentData = $data;
    }
    
    public function errorOnDelay($error) {
        $this->errorOnDelay = $error;
    }

    /**
     * waits until a line end and returns the data (blocking)
     */
    public function receiveLine($length = 4096) {
        if(!$this->isEstablished()) {
            throw new \BadMethodCallException('Cannot receive, Connection not established');
        }
        if($this->errorOnDelay) {
            throw new \LogicException('This function causes delay, not allowed');
        }
        $lines = \explode("\n",$this->toReceive);
        if(!isset($lines[0])) {
            throw new \LogicException('Cannot receive line, not enough data');
        }
        if(\strlen($lines[0]) < $length) {
            $ret = $lines[0]."\n";
        }
        else {
            $ret = \substr($lines[0],0, $length-1);
        }
        $count = 0;
        $this->toReceive = \preg_replace('/'.\preg_quote($ret,'/').'/m','', $this->toReceive, 1, $count);
        if($count !== 1) {
            throw new \LogicException('string is not found, BUG');
        }
        $this->received .= $ret;
        return $ret;
    }
    
    public function setToReceive($toReceive) {
        $this->toReceive = $toReceive;
    }
    
    public function getToReceive() {
        return $this->toReceive;
    }
    
    public function addToReceive($toAdd) {
        $this->toReceive .= $toAdd;
    }
    
    public function getReceived() {
        return $this->received;
    }
    
    public function setReceived($r) {
        $this->received = $r;
    }

    /**
     * Returns all data currently on the stream (nonblocking)
     */
    public function getAll() {
        if(!$this->isEstablished()) {
            throw new \BadMethodCallException('Cannot receive, Connection not established');
        }
        $this->received .= $this->toReceive;
        $ret = $this->toReceive;
        $this->toReceive = '';
        return $ret;
    }

    /**
     * waits until given datalength is sent and returns data
     */
    public function receiveData($length = 4096) {
        if($this->errorOnDelay) {
            throw new \LogicException('This function causes delay, not allowed');
        }
        if(!$this->isEstablished()) {
            throw new \BadMethodCallException('Cannot receive, Connection not established');
        }
        if(strlen($this->toReceive) < $length) {
            throw new \LogicException("Cannot receive $length bytes");
        }
        $ret = substr($this->toReceive,0,$length);
        $this->toReceive = substr($this->toReceive, $length);
        $this->received .= $ret;
        if(strlen($ret) < $length) {
            throw new \LogicException('BUG');
        }
        return $ret;
    }

    public function close() {
        $this->isEstablished = FALSE;
    }
    
    public function __clone() {
        self::$cloned++;
    }
    
    public static function cloned() {
        return self::$cloned;
    }
    
}

?>
