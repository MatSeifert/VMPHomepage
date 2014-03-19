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

class ApcCache implements CachingInterface
{
    private $isAvailable;
    private $cacheTime;
    
    public function __construct($cachetime=180)
    {
        if(extension_loaded("apc"))
        {
            $this->isAvailable = true;
        }
        else
        {
            $this->isAvailable = false;
        }
        
        $this->cacheTime = $cachetime;
    }
    
    public function cache($key, $data, $ttl=NULL)
    {
        if(!$this->isAvailable)
            return false;
        
        if($ttl == NULL)
            $ttl = $this->cacheTime;
        
        return apc_store($key, serialize($data), $ttl);
    }
    
    public function getCache($key)
    {
        if(!$this->isAvailable)
            return false;
        
        return unserialize(apc_fetch($key));
    }

    public function flush($key)
    {
        if(!$this->isAvailable)
            return false;
        
        return apc_delete($key);
    }

    public function flushCache()
    {
        if(!$this->isAvailable)
            return false;
        
        return apc_clear_cache();
    }

    public function isCached($key)
    {
        if(!$this->isAvailable)
            return false;
        
        return apc_exists($key);
    }

}

?>
