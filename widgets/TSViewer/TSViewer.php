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

// Set absolute directory of the server
$rootDirServer = __DIR__ . "/";
$rootDirPublic = "";

// Set HTTP path to the webviewer
if ((int) $_SERVER['SERVER_PORT'] == 80 || (int) $_SERVER['SERVER_PORT'] == 443)
{
    $url = $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
}
else
{
    $url = $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . $_SERVER['PHP_SELF'];
}

if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === '' || $_SERVER['HTTPS'] === "off")
{
    $rootDirPublic = "http://" . $url;
}
else
{
    $rootDirPublic = "https://" . $url;
}

// Replace file names
$rootDirPublic = str_replace("TSViewer.php", "", $rootDirPublic);
$rootDirPublic = str_replace("index.php", "", $rootDirPublic);

spl_autoload_register(function($class)
        {
            global $rootDirServer;
            $path = str_replace("\\", "/", $class);
            $path = $rootDirServer . "lib/" . $path . ".php";
            if (\file_exists($path)) require_once $path;
        });


// Load configuration file
$config = simplexml_load_file($rootDirServer . "config.xml");

// Apply render options options
$viewerOptions = new devmx\TSWebViewer\RenderOptions();
$viewerOptions->stylesheetURL($rootDirPublic . "css/style.css");
$viewerOptions->connectLink(true);
$viewerOptions->imgPath($rootDirPublic . "img");
$viewerOptions->countryIconsUrl($rootDirPublic . "img/countries");
$viewerOptions->countryIconsPath($rootDirServer . "img/countries");
$viewerOptions->countryIconsFileType("png");

// If images should be shown
if ((string) $config->showImages == "true") $viewerOptions->showImages(true);
else $viewerOptions->showImages(false);

// If country icons should be shown
if ((string) $config->showCountryIcons == "true") $viewerOptions->showCountryIcons(true);
else $viewerOptions->showCountryIcons(false);

// If query clients should be shown
if((string) $config->renderServerQueryClients == "true") $viewerOptions->renderServerQueryClients (true);
else $viewerOptions->renderServerQueryClients (false);

// If caching should be enabled
if ((string) $config->caching == "true")
{
    // Create HTMLCacheHandler
    $cacheHandler = new devmx\TSWebViewer\Caching\FileCache($rootDirServer . "cache");


    $viewerOptions->imageCaching(true);
    $viewerOptions->imageCachingPathPublic($rootDirPublic . "cache");
    $viewerOptions->ImageCachingHandler($cacheHandler);
    $viewerOptions->HTMLCaching(true);
    $viewerOptions->HTMLCachingHandler($cacheHandler);
}



$host = (string) $config->host;
$queryPort = (int) $config->queryport;
$serverPort = (int) $config->serverport;

$username = (string) $config->username;
$password = (string) $config->password;

// Check for empty config variables
if (empty($host) || empty($queryPort) || empty($serverPort)) exit("Not all config variables are filled out. Please check your config.");

// If login is needed
if (!empty($username) && !empty($password))
{
    $viewer = new devmx\TSWebViewer\TSWebViewer($host, $queryPort, $serverPort, $username, $password);
}
// If no login is needed
else
{
    $viewer = new devmx\TSWebViewer\TSWebViewer($host, $queryPort, $serverPort);
}

// header("Content-Type: text/html; charset=utf-8");

// Render viewer
try
{
    echo($viewer->renderServer($viewerOptions));
}
catch (Exception $ex)
{
    echo(sprintf("<strong>Fatal Error:</strong> %s<br><strong>line: </strong>%s<br><strong>File: </strong>%s<br><strong>Trace: </strong><pre>%s</pre>", $ex->getMessage(), $ex->getLine(), $ex->getFile(), $ex->getTraceAsString()));
}
?>
