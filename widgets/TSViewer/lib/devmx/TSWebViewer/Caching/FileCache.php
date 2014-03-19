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
 * Class for simple FileCaching 
 * @author Maximilian Narr
 * @since 1.1
 */
class FileCache implements CachingInterface
{

    protected $cachePath;
    protected $cacheTime;

    /**
     * Construct of FileCache
     * @param string $cachePath Path to the cache
     * @param int $cacheTime Time to Cache an item. Use 0 for infinite cache time
     * @throws \RuntimeException if $cachePath or $cacheTime are null or $cacheTime is not int
     */
    function __construct($cachePath, $cacheTime = 180)
    {
        if (is_null($cachePath) || is_null($cacheTime) || !is_int($cacheTime)) throw new \RuntimeException("cachePath or cacheTime are not set. Please set them");

        $this->cachePath = $cachePath;
        $this->cacheTime = $cacheTime;
    }

    public function cache($key, $data, $ttl = null)
    {
        if (is_null($ttl)) $ttl = $this->cacheTime;

        $cachePath = $this->cachePath . "/" . $key;
        $timePath = $this->cachePath . "/" . $key . ".time";

        if (is_writable($this->cachePath))
        {
            file_put_contents($cachePath, $data);
            file_put_contents($timePath, time() . ";$ttl");
        }
        else
        {
            throw new \RuntimeException("The cache directory is not writable. Please check permissions.");
        }
    }

    public function flush($key)
    {
        $cachePath = $this->cachePath . "/" . $key;
        $timePath = $this->cachePath . "/" . $key . ".time";

        if (file_exists($cachePath)) unset($cachePath);

        if (file_exists($timePath)) unset($timePath);
    }

    public function flushCache()
    {
        $handler = opendir($this->cachePath);

        while ($file = readdir($handler))
        {
            if (preg_match("/(.*)(\.cache)/", $file)) unset($file);
        }
    }

    public function getCache($key)
    {
        $cachePath = $this->cachePath . "/" . $key;

        if (file_exists($cachePath))
        {
            return file_get_contents($cachePath);
        }
        else
        {
            throw new \RuntimeException("The cache file you want to get does not exist");
        }
    }

    public function isCached($key)
    {
        $cachePath = $this->cachePath . "/" . $key;
        $timePath = $this->cachePath . "/" . $key . ".time";

        if (file_exists($cachePath) && file_exists($timePath))
        {
            $content = explode(";", file_get_contents($timePath));
            $cachedTime = $content[0];
            $ttl = $content[1];

            if ((int) $ttl == 0) return true;

            if (time() - $cachedTime <= $this->cacheTime) return true;
            return false;
        }
        return false;
    }

}

?>
