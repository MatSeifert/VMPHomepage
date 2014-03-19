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

namespace devmx\Teamspeak3\Query\Transport\Common;

/**
 * 
 *
 * @author drak3
 */
class ResponseHandler implements \devmx\Teamspeak3\Query\Transport\ResponseHandlerInterface
{
    /**
     * The Length of the message sent by a common query on connect
     */

    const WELCOME_LENGTH = 150;

    /**
     * A string included in the welcomemessage
     */
    const WELCOME_IDENTIFY = "TS3";

    /**
     * The error id returned on success 
     */
    const ID_OK = 0;

    /**
     * The errormessage returned on success
     */
    const MSG_OK = "ok";

    /**
     * The string between two responses/events
     */
    const SEPERATOR_RESPONSE = "\n";

    /**
     * The string between two items (List of data)
     */
    const SEPERATOR_ITEM = "|";

    /**
     * The string between two data packages (e.g. key/value pair)
     */
    const SEPERAOR_DATA = " ";

    /**
     * The string between a key/value pair
     */
    const SEPERATOR_KEY_VAL = "=";
    

    const BAN_ERROR = 3329;
    
    const FLOOD_BAN_ERROR = 3331;

    /**
     * The chars masked by the query and their replacements
     * @var Array 
     */
    protected $unEscapeMap = Array(
        "\\\\" => "\\",
        "\\/" => "/",
        "\\n" => "\n",
        "\\s" => " ",
        "\\p" => "|",
        "\\a" => "\a",
        "\\b" => "\b",
        "\\f" => "\f",
        "\\r" => "\r",
        "\\t" => "\t",
        "\\v" => "\v",
    );

    /**
     * The regular expression to describe the error block of a response
     * @var string
     */
    protected $errorRegex = "/error id=[0-9]* msg=[a-zA-Z\\\\]*/";

    /**
     * Replaces all masked characters with their regular replacements (e.g. \\ with \)
     * uses $unEscapeMap
     * @param string $string
     * @return string the unmasked string 
     */
    public function unescape($string)
    {
        $string = strtr($string, $this->unEscapeMap);
        return $string;
    }

    /**
     * Parses a response coming from the query for a given command
     * Event notifications occured before sending the command are parsed too
     * @param \devmx\Teamspeak3\Query\Command $cmd
     * @param string $raw
     * @return Array in form Array('response' => $responseObject, 'events' => Array($eventobject1,$eventobject2));  
     */
    public function getResponseInstance(\devmx\Teamspeak3\Query\Command $cmd, $raw)
    {
        $response = Array('response' => NULL, 'events' => Array());
        $parsed = Array();

        $raw = \trim($raw, "\r\n");
        $parsed = \explode(self::SEPERATOR_RESPONSE, $raw);

        //find error message
        foreach($parsed as $key=>$value) {
            if($this->match($this->errorRegex, $value)) {
                $error = $value;
                unset($parsed[$key]);
                break;
            }
        }
        $data = '';
        foreach($parsed as $part) {
            if(substr($part, 0, strlen($this->getEventPrefix())) === $this->getEventPrefix()) {
                $response['events'][] = $this->parseEvent($part);
            }
            else {
                $data = $part;
            }
        }
        
        $response['response'] = $this->parseResponse($cmd, $error, $data);
        return $response;
    }
    
    protected function getEventPrefix() {
        return 'notify';
    }

    /**
     * Parses a response (no events in it) for a given command
     * Splits up the response in data and error message and builds a response object
     * @param \devmx\Teamspeak3\Query\Command $cmd
     * @param string $response
     * @return \devmx\Teamspeak3\Query\Response 
     */
    protected function parseResponse(\devmx\Teamspeak3\Query\Command $cmd, $error, $data='')
    {
        $parsedError = $this->parseData($error);
        $errorID = $parsedError[0]['id'];
        $errorMessage = $parsedError[0]['msg'];

        if ($data !== '') // parsed[1] holds the data if it is a fetching command
        {
            $items = $this->parseData($data);
        }
        else
        {
            $items = Array();
        }


        $responseClass = new \devmx\Teamspeak3\Query\CommandResponse($cmd, $items, $errorID, $errorMessage, $parsedError[0]);
        $responseClass->setRawResponse($data."\n".$error);
        return $responseClass;
    }

    /**
     * Parses a single event
     * @param string $event
     * @return \devmx\Teamspeak3\Query\Event 
     */
    protected function parseEvent($event)
    {
        $reason = '';
        $event = explode(self::SEPERAOR_DATA, $event, 2);
        $reason = $this->parseValue($event[0]); //the eventtype or eventreason is a single word at the beginnning of the event
        $event = $event[1];
        $data = $this->parseData($event); //the rest is a single block of data

        $eventClass = new \devmx\Teamspeak3\Query\Event($reason, $data);
        $eventClass->setRawResponse($event);
        return $eventClass;
    }

    /**
     * parses the data of a event or response.
     * First splits up in blocks (seperated by '|')
     * then in data packages (or key value pairs) (sperated by ' ')
     * if the datapackage is a key value pair it split this at '='
     * @param string $data
     * @return Array in form Array(0=>Array('key0'=>'val0','key1'=>'val1'), 1=>Array('key0'=>'val2','key1','val3'));
     */
    protected function parseData($data)
    {
        $parsed = Array();
        $items = \explode(self::SEPERATOR_ITEM, $data); //split up into single lists or blocks
        foreach ($items as $itemkey => $item)
        {
            $keyvals = explode(self::SEPERAOR_DATA, $item); //split up into data items or keyvalue pairs
            foreach ($keyvals as $keyval)
            {
                $keyval = explode(self::SEPERATOR_KEY_VAL, $keyval, 2); //parses key value pairs
                if (\trim($keyval[0]) === '')
                {
                    continue;
                }
                $keyval[1] = isset($keyval[1]) ? $keyval[1] : NULL;
                $parsed[$itemkey][$keyval[0]] = $this->parseValue($keyval[1]);
            }
        }
        return $parsed;
    }

    /**
     * Parses a value from the query
     * detects the following types:
     * int,boolean,null and string, where strings got unescaped
     * @param string $val
     * @return string|int|boolean|null 
     */
    protected function parseValue($val)
    {
        $val = \trim($val);
        if (ctype_digit($val))
        {
            return (int) $val;
        }
        if ($this->match("/^true$/Di", $val))
        {
            return TRUE;
        }
        if ($this->match("/^false$/Di", $val))
        {
            return FALSE;
        }
        if ($val === '' || $val === NULL)
        {
            return '';
        }


        return $this->unescape($val);
    }

    /**
     * Checks if the given string is a complete event.
     * because of actual restrictions of the query protocol this function only checks if the strin is nonempty
     * @param type $raw
     * @return type 
     */
    public function isCompleteEvent($raw)
    {
        $this->checkForBan($raw);
        if ($raw !== '' && $raw[strlen($raw)-1] === self::SEPERATOR_RESPONSE)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * Checks if the given string is a complete response
     * The function is doing that by checking for a error section
     * @param string $raw
     * @return boolean 
     */
    public function isCompleteResponse($raw)
    {
        $this->checkForBan($raw);
        if ($this->match($this->errorRegex, $raw) && $raw[strlen($raw)-1] == "\n")
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * Parses Events coming from the query
     * @param string $raw
     * @return array array of \devmx\Teamspeak3\Query\Event
     */
    public function getEventInstances($raw)
    {
        $events = \explode(self::SEPERATOR_RESPONSE, rtrim($raw));
        foreach ($events as $rawevent)
        {
            $ret[] = $this->parseEvent($rawevent);
        }
        return $ret;
    }

    /**
     * Returns the length of a normal welcomemessage
     * @return type 
     */
    public function getWelcomeMessageLength()
    {
        return self::WELCOME_LENGTH;
    }

    /**
     * Checks if the given string is a valid welcomemessage,
     * by checking length and for identifyer
     * @param string $welcome
     * @return boolean
     */
    public function isWelcomeMessage($welcome)
    {
        return (\strstr($welcome, self::WELCOME_IDENTIFY) && count(explode("\n", $welcome)) === 3 && $welcome[strlen($welcome)-1] === "\n");
    }
    
    private function match($regex, $raw, $exceptionOnFail=false) {
        $parsed = array();
        $matched = preg_match($regex, $raw, $parsed);
        if(  preg_last_error() !== PREG_NO_ERROR) {
            throw new \RuntimeException('Error while using preg_match try to increase your pcre.backtrack_limit '. "\n". $raw, preg_last_error());
        }
        if($matched === 0) {
            if($exceptionOnFail) {
                throw new \InvalidArgumentException('Cannot parse '.$raw);
            }
            return false;
        }
        return $parsed;
    }
    
    /**
     * Checks if the raw response contains a Ban message and throws Exception
     * @todo Add the ban time to the message
     * @param string $raw
     * @throws \RuntimeException 
     */
    private function checkForBan($raw) {
        $parsed = $this->match($this->errorRegex, $raw);
        if($parsed) {
            $parsed = $this->parseData($parsed[0]);
            if(isset($parsed[0]['id']) && ($parsed[0]['id'] == self::BAN_ERROR || $parsed[0]['id'] == self::FLOOD_BAN_ERROR)) {
                throw new \RuntimeException("You are banned");
            }
        }
    } 

}

?>
