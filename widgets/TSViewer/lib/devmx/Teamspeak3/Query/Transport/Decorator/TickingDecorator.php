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
use devmx\Teamspeak3\Query\Command;
/**
 *
 * @author drak3
 */
class TickingDecorator extends \devmx\Teamspeak3\Query\Transport\AbstractQueryDecorator
{
    protected $tickTime = 0;
    protected $lastCommand = 0;
    
    public function setTickTime($time) {
        $this->tickTime = $time;
    }
    
    public function getTickTime() {
        return $this->tickTime;
    }
    
    public function sendCommand(Command $cmd) {
        $now = $this->getTime();
        $timeSinceLastCommand = $now - $this->lastCommand;
        if($timeSinceLastCommand < $this->tickTime) {
            $this->sleep(\ceil($this->tickTime-$timeSinceLastCommand));
        }
        $this->lastCommand = $this->getTime();
        return $this->decorated->sendCommand($cmd);
    }
    
    protected function sleep($seconds) {
        \sleep($seconds);
    }
    
    protected function getTime() {
        return \microtime(true);
    }
}

?>
