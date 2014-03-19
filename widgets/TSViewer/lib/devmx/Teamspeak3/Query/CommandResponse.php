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
/**
 * A response caused directly by a command (e.g. channellist)
 * @author drak3
 */
class CommandResponse extends Response
{
    /**
     *
     * @var \devmx\Teamspeak3\Query\Command 
     */
    protected $command;
    /**
     *
     * @var string 
     */
    protected $errorID;
    /**
     *
     * @var string 
     */
    protected $errorMessage;
    /**
     *
     * @var string
     */
    protected $errorValues;
    
    /**
     *
     * @param Command $c
     * @param array $items
     * @param int $errorID
     * @param string $errorMessage 
     */
    public function __construct(Command $c, array $items=array(), $errorID=0, $errorMessage="ok", $errorValues=array()) {
        $this->command = $c;
        $this->items = $items;
        $this->errorID = $errorID;
        $this->errorMessage = $errorMessage;
        $this->errorValues = $errorValues;
    }
    
    /**
     * Returns the command that caused the response
     * @return \devmx\Teamspeak3\Query\Command 
     */
    public function getCommand() { return $this->command;}
    /**
     * Returns the error code of the response
     * @return int 
     */
    public function getErrorID() { return $this->errorID;}
    /**
     * Returns the error message of the response
     * @return string 
     */
    public function getErrorMessage() { return $this->errorMessage;}
    /**
     * Returns the extra message of the response (empty string if none as 
     * @return string 
     */
    public function getExtraMessage() { return $this->getErrorValue('extra_message');}
    
    public function errorOccured() {
        return ($this->errorID !== 0);
    }
    
    public function toException() {
        if($this->errorOccured()) {
            throw new \RuntimeException(sprintf("Error with id %d and message %s occured while sending command %s", 
                                                $this->errorID,
                                                $this->errorMessage,
                                                $this->command->getName()));
        }
    }

    public function getErrorValue( $name, $default='')
    {
        if(isset($this->errorValues[$name])) {
            return $this->errorValues[$name];
        }
        return $default;
    }
    
    
}

?>
