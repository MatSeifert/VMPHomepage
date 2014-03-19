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

namespace devmx\Teamspeak3\Query\Transport\Decorator\Caching;

use devmx\Teamspeak3\Query\Transport\Decorator\Caching;
use devmx\Teamspeak3\Query\Transport;

/**
 * @author Maximilian Narr 
 */
class CachingDecorator extends Transport\AbstractQueryDecorator
{

    protected $cache;

    public function __construct($toDecorate, CachingInterface $cache)
    {
        parent::__construct($toDecorate);
        $this->cache = $cache;
    }

    public function connect()
    {
        return;
    }

    public function disconnect()
    {
        if ($this->decorated->isConnected())
        {
            $this->decorated->disconnect();
        }
        else
        {
            return;
        }
    }

    public function sendCommand(\devmx\Teamspeak3\Query\Command $command)
    {
        $key = md5(serialize($command));

        if ($this->cache->isCached($key))
        {
            return $this->cache->getCache($key);
        }
        else
        {
            if (!$this->decorated->isConnected())
            {
                $this->decorated->connect();
            }

            $ret = $this->decorated->sendCommand($command);

            $this->cache->cache($key, $ret);
            return $ret;
        }
    }
    
    public function getAllEvents()
    {
        if(!$this->decorated->isConnected())
            $this->decorated->connect ();
        
        return $this->decorated->getAllEvents();
    }
 
    public function waitForEvent()
    {
        if(!$this->decorated->isConnected())
            $this->decorated->connect ();
        
        return $this->decorated->waitForEvent();
    }
}

?>
