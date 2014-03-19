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

namespace devmx\Teamspeak3\Query\Transport\Decorator\Logging;

class PlainTextLogger implements LoggingInterface
{

    private $dateTimeFormat;
    private $logFile;
    private $handle;

    /**
     * Constructor
     * @param string $logFile Path to the log file
     * @param string $dateTimeFormat Time format
     * @author Maximilian Narr
     */
    public function __construct($logFile, $dateTimeFormat = "d.m.Y H:i:s")
    {
        $this->logFile = $logFile;
        $this->dateTimeFormat = $dateTimeFormat;
    }
    
    /**
     * Destructor 
     */
    public function __destruct()
    {
        fclose($this->handle);
    }

    public function addLog($message, $logLevel)
    {
        if ($this->handle == null)
        {
            $this->handle = fopen($this->logFile, "a");
            
            if($this->handle == false)
                throw new \RuntimeException("Could not open log file.");
        }

        $time = date($this->dateTimeFormat);
        $string = "[$time] ";

        switch ($logLevel)
        {
            case 0:
                $string .= "  [INFO]:";
                break;
            case 1:
                $string .= " [NOTICE]:";
                break;
            case 2:
                $string .= "[WARNING]:";
                break;
            case 3:
                $string .= "  [ERROR]:";
                break;
            case 4:
                $string .= "  [FATAL]:";
                break;
        }
        
        $string .= " $message";

        if(fwrite($this->handle, $string."\n") == FALSE)
                throw new \RuntimeException("Could not write log file.");
    }

}

?>
