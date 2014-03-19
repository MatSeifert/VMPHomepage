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

namespace devmx\TSWebViewer;

/**
 * Provides rendering options for \devmx\TSWebViewer\TSWebViewer;
 * @author Maximilian Narr
 * @since 1.0
 */
class RenderOptions
{

    protected $headTags = false;
    protected $renderServerQueryClients = false;
    protected $connectLink = true;
    protected $connectLinkTarget = false;
    protected $stylesheetURL = null;
    protected $imagePath = null;
    protected $showImages = true;
    protected $showCountryIcons = false;
    protected $countryIconsUrl = null;
    protected $countryIconsPath = null;
    protected $countryIconsFileType = null;
    protected $downloadCustomImages = true;
    protected $divClass = "devmx-webviewer";
    protected $HTMLCaching = false;

    /**
     * @var \devmx\TSWebViewer\Caching\CachingInterface
     */
    protected $HTMLCachingHandler = null;
    protected $imageCaching = false;
    protected $imageCachingPathPublic = "cache";

    /**
     * @var \devmx\TSWebViewer\Caching\CachingInterface
     */
    protected $imageCachingHandler = null;

    /**
     * Sets/ Gets if the viewer should be output as a standalone html page
     * @param bool|null $use If the viewer should be output in a standalone html page.
     * @return bool true if the viewer should be output in a standalone html page, else false. If $use is specified it will set it before
     * @since 1.0
     * @author Maximilian Narr
     */
    public function headTags($use = null)
    {
        if (is_null($use))
        {
            return $this->headTags;
        }
        else
        {
            $this->headTags = $use;
            return $this->headTags;
        }
    }

    /**
     * If ServerQueryClients should be rendered by the viewer
     * @param bool|null $render If ServerQueryClients should be rendered by the viewer.
     * @return mixed true if ServerQueryClients should be rendered else false. If $render is specified it will set it before
     * @since 1.0
     * @author Maximilian Narr
     */
    public function renderServerQueryClients($render = null)
    {
        if (is_null($render))
        {
            return $this->renderServerQueryClients;
        }
        else
        {
            $this->renderServerQueryClients = $render;
            return $this->renderServerQueryClients;
        }
    }

    /**
     * If a link should be applied to the servername that you can directly connect to the server
     * @param bool $addLink If a link should be applied to the servername [optional]
     * @return bool If a link should be applied. If $addLink is set it will set it before
     * @since 1.0
     * @author Maximilian Narr
     */
    public function connectLink($addLink = null)
    {
        if (is_null($addLink))
        {
            return $this->connectLink;
        }
        else
        {
            $this->connectLink = $addLink;
            return $this->connectLink;
        }
    }

    /**
     * If you have set 127.0.0.1 or localhost in the main config, you can set here the public ip of the server
     * @param string $linkTarget Public ip adress or hostname of the teamspeak server
     * @return string|boolean If you set a custom adress before this will be returned else it returns false.
     * @since 1.0
     * @author Maximilian Narr
     */
    public function connectLinkTarget($linkTarget = null)
    {
        if (is_null($linkTarget))
        {
            if (is_string($this->connectLinkTarget)) return $this->connectLinkTarget;
            else return false;
        }
        else
        {
            $this->connectLinkTarget = (string) $linkTarget;
            return $this->connectLinkTarget;
        }
    }

    /**
     * URL to the stylesheet, the viewer should use
     * @param string|null $url URL to the stylesheet. If $url = null it returns the current value of $stylesheetURL
     * @return string URL to the stylesheet. If $url is specified it will set it before
     * @since 1.0
     * @author Maximilian Narr
     */
    public function stylesheetURL($url = null)
    {
        if (is_null($url))
        {
            return $this->stylesheetURL;
        }
        else
        {
            $this->stylesheetURL = $url;
            return $this->stylesheetURL;
        }
    }

    /**
     * Path to the standard group images. The images must be in format 100.png, 200.png, 300.png, 500.png and 600.png
     * @param string|null $path Path to the images. If $path = null it returns the current value of $imgPath
     * @return string Path to images.
     * @since 1.0
     * @author Maximilian Narr
     */
    public function imgPath($path = null)
    {
        if (is_null($path)) return $this->imagePath;
        else
        {
            if (substr($path, -1) != "/") $path .= "/";
            $this->imagePath = $path;
            return $this->imagePath;
        }
    }

    /**
     * If any images should be shown in the webviewer
     * @param bool|null $show If images should be shown. If $show = null it returns the current value of $showImages
     * @return bool If images should be shown
     * @since 1.1
     * @author Maximilian Narr
     */
    public function showImages($show = null)
    {
        if (is_null($show)) return $this->showImages;
        else
        {
            $this->showImages = $show;
            return $this->showImages;
        }
    }

    /**
     * If country icons should be displayed
     * @param bool|null $show If country icons should be shown. If $show = null it returns the current value of $showCountryIcons
     * @return bool If country icons should be shown
     * @since 1.1
     * @author Maximilian Narr
     */
    public function showCountryIcons($show = null)
    {
        if (is_null($show)) return $this->showCountryIcons;
        else
        {
            $this->showCountryIcons = $show;
            return $this->showCountryIcons;
        }
    }

    /**
     * Public url to the country icons directory
     * @param string|null $url Url to the directory of the country icons. If $url = null it returns the current value of $countryIconsUrl;
     * @return string Url to the country icons directory
     * @since 1.0
     * @author Maximilian Narr
     */
    public function countryIconsUrl($url = null)
    {
        if (is_null($url)) return $this->countryIconsUrl;
        else
        {
            if (substr($url, -1) !== "/") $this->countryIconsUrl = $url . "/";
            else $this->countryIconsUrl = $url;
            return $this->countryIconsUrl;
        }
    }

    /**
     * Server side path to the country icons diectory
     * @param string|null $path Path to the directory of the country icons. If $path = null it returns the current value of $countryIconsPath
     * @return string Path to the country icons
     * @since 1.0
     * @author Maximilian Narr
     */
    public function countryIconsPath($path = null)
    {
        if (is_null($path)) return $this->countryIconsPath;
        else
        {
            if (substr($path, -1) !== "/") $this->countryIconsPath = $path . "/";
            else $this->countryIconsPath = $path;
            return $this->countryIconsPath;
        }
    }

    /**
     * Sets the file type of the country icon
     * @param string|null $type Filetype of the country icons. If $type = null it returnst the current value of $countryIconsFileType;
     * @return string File type of the country icons
     * @since 1.1
     * @author Maximilian Narr
     */
    public function countryIconsFileType($type = null)
    {
        if (is_null($type)) return $this->countryIconsFileType;
        else
        {
            $this->countryIconsFileType = str_replace(".", "", $type);
            return $this->countryIconsFileType;
        }
    }

    /**
     * If custom icons should downloaded from the ts server
     * @param boolean|null $download If icons should be downloaded set true, else false. If $download is not set, it will return the current set option
     * @return bool True if icons should be downloaded, else false. Returns currently set options of $download is null
     */
    public function downloadCustomImages($download = null)
    {
        if (is_null($download))
        {
            return $this->downloadCustomImages;
        }
        else
        {
            $this->downloadCustomImages = $download;
            return $this->downloadCustomImages;
        }
    }

    /**
     * Class of the div around the viewer
     * @param string|null $class name of the class. If $class = null it returns the current value of $divClass 
     * @return string name of the class.
     * @since 1.0
     * @author Maximilian Narr
     */
    public function divClass($class = null)
    {
        if (is_null($class))
        {
            return $this->divClass;
        }
        else
        {
            $this->divClass = $class;
            return $this->divClass;
        }
    }

    /**
     * If HTML output should be cached
     * @param bool|null $enabled If HTML output should be cached. If $enabled = null it only returns the current value of $HTMLCaching
     * @return bool If HTML caching is enabled. If $enabled is set as well it will set it before
     * @since 1.0
     * @author Maximilian Narr
     */
    public function HTMLCaching($enabled = null)
    {
        if (is_null($enabled))
        {
            return $this->HTMLCaching;
        }
        else
        {
            $this->HTMLCaching = $enabled;
            return $this->HTMLCaching;
        }
    }

    /**
     * Handler which handles the HTML Caching
     * @param \devmx\TSWebViewer\Caching\CachingInterface $handler Caching handler
     * @return \devmx\TSWebViewer\Caching\CachingInterface If $handler is specified it will set it before
     * @since 1.1
     * @author Maximilian Narr
     */
    public function HTMLCachingHandler($handler = null)
    {
        if (is_null($handler))
        {
            return $this->HTMLCachingHandler;
        }
        else
        {
            $this->HTMLCachingHandler = $handler;
            return $this->HTMLCachingHandler;
        }
    }

    /**
     * If image caching should be used. Default: no
     * @param bool|null $use True if image caching should be used, else false
     * @return bool If image caching should be used
     * @since 1.0
     * @author Maximilian Narr
     */
    public function imageCaching($use = null)
    {
        if (is_null($use))
        {
            return $this->imageCaching;
        }
        else
        {
            $this->imageCaching = $use;
            return $this->imageCaching;
        }
    }

    /**
     * Path to the image cache which is accessible by the public
     * @param string|null $path Public path to the image cache.
     * @return string Public path of the image cache. If $path is specified it will set it before
     * @since 1.0
     * @author Maximilian Narr
     * @example http://example.com/imagecache/
     */
    public function imageCachingPathPublic($path = null)
    {
        if (is_null($path)) return $this->imageCachingPathPublic;
        else
        {
            if (substr($path, -1) !== "/") $this->imageCachingPathPublic = $path . "/";
            else $this->imageCachingPathPublic = $path;
            return $this->imageCachingPathPublic;
        }
    }

    /**
     * Handler which handles the image Caching
     * @param \devmx\TSWebViewer\Caching\CachingInterface $handler Caching handler
     * @return \devmx\TSWebViewer\Caching\CachingInterface If $handler is specified it will set it before
     * @since 1.1
     * @author Maximilian Narr
     */
    public function ImageCachingHandler($handler = null)
    {
        if (is_null($handler))
        {
            return $this->imageCachingHandler;
        }
        else
        {
            $this->imageCachingHandler = $handler;
            return $this->imageCachingHandler;
        }
    }

}

?>
