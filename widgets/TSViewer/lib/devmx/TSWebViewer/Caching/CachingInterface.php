<?php

/**
 *  This file is part of devMX TS3 Webviewer Lite.
 *  Copyright (C) 2012  Maximilian Narr
 *
 *  devMX Webviewer Lite is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  TeamSpeak3 Webviewer is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with devMX TS3 Webviewer Lite.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace devmx\TSWebViewer\Caching;

/**
 * Provides a simple caching interface
 * @author Maximilian Narr 
 * @since 1.1
 */
interface CachingInterface
{

    /**
     * Caches a data which can be accessed with key in the cache. 
     * @param string $key identifier of the data
     * @param mixed $data data to cache
     * @param int $ttl Time to live (cachetime) 
     * @throws \RuntimeException if error occures
     */
    public function cache($key, $data);

    /**
     * Returns the cached object
     * @param string $key identifier of the data
     * @return mixed data on success
     * @throws \RuntimeException if error occures
     */
    public function getCache($key);

    /**
     * If a specific key is cached
     * @param mixed $key identifier of the data
     * @param bool $ignoreTTL If the time to live should be ignored
     * @return bool true if cached else false 
     */
    public function isCached($key);

    /**
     * Deletes a key from the cache
     * @param string $key key to delete from cache 
     * @return bool true if success else false
     */
    public function flush($key);

    /**
     * Flushes the whole cache 
     * @return bool true if success else false
     */
    public function flushCache();
}

?>
