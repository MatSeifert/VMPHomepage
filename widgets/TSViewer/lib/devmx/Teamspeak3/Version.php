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

namespace devmx\Teamspeak3;

/**
 * Gives an object oriented way to acces teamspeak3 client and server versions
 * A version has a major number (3 in most cases) a minor number a revision number and a buildnumber
 * @author drak3
 */
class Version
{
 
    /**
     * Creates a version object from a string
     * @param string $version the version string in form <major>.<minor>.<revision> [Build:<build>]
     * @return Version 
     */
    public static function fromString($version) {
        $matches = Array();
        $error = preg_match(self::VERSION_PATTERN, $version, $matches);
        if($error === 0 || $error === FALSE) {
            throw new \InvalidArgumentException($version." is not a valid version string");
        }
        $v = new Version($matches[1],$matches[2],$matches[3]);
        if(isset($matches[5])) {
            $v->setBuildNumber($matches[5]);
        }
        return $v;
    }
    
    //the three possible returntypes of compare
    const LOWER = -1;
    const EQUAL = 0;
    const HIGHER = 1;
    const VERSION_STRING = "%d.%d.%d [Build: %d]";
    const VERSION_PATTERN = '/(\d+)\.(\d+)\.(\d+)( \[Build: (\d+)\])?/';
    
    protected $majorNumber;
    protected $minorNumber;
    protected $revisionNumber;
    protected $buildNumber;
    
    /**
     *
     * @param int $major
     * @param int $minor
     * @param int $revision
     * @param int $build 
     */
    public function __construct($major, $minor, $revision, $build=0) {
        $this->setBuildNumber($build);
        $this->setMajorNumber($major);
        $this->setMinorNumber($minor);
        $this->setRevisionNumber($revision);
    }
    
    /**
     * Compares two version objects
     * @param Version $v the version to compare if
     * @return int -1 (== Version::LOWER) if this instance has a lower version than $v, 
     * 0 (== Version::Equal) if the two versions are equal or 1 (==Version::Equal) if this version is higher than $v  
     */
    public function compare(Version $v) {
        if($this->getMajorNumber() < $v->getMajorNumber()) {
            return self::LOWER;
        }
        else if($this->getMajorNumber() > $v->getMajorNumber()) {
            return self::HIGHER;
        }
        else if($this->getMinorNumber() < $v->getMinorNumber()) {
            return self::LOWER;
        }
        else if($this->getMinorNumber() > $v->getMinorNumber()) {
            return self::HIGHER;
        }
        else if($this->getRevisionNumber() < $v->getRevisionNumber()) {
            return self::LOWER;
        }
        else if($this->getRevisionNumber() > $v->getRevisionNumber()) {
            return self::HIGHER;
        }
        else if($this->getBuildNumber() < $v->getBuildNumber() ) {
            return self::LOWER;
        }
        else if($this->getBuildNumber() > $v->getBuildNumber()) {
            return self::HIGHER;
        }
        else {
            return self::EQUAL;
        }
    }
    
    public function __toString()
    {
        return sprintf(self::VERSION_STRING, $this->majorNumber, $this->minorNumber, $this->revisionNumber, $this->buildNumber);
    }
    
    /**
     *
     * @return int the major number  
     */
    public function getMajorNumber()
    {
        return $this->majorNumber;

    }
    
    /**
     *
     * @param int $majorNumber 
     */
    public function setMajorNumber( $majorNumber )
    {
        $this->majorNumber = (int) $majorNumber;

    }

    /**
     *
     * @return int the minor versionnumber 
     */    
    public function getMinorNumber()
    {
        return $this->minorNumber;

    }

    /**
     *
     * @param int $minorNumber 
     */
    public function setMinorNumber( $minorNumber )
    {
        $this->minorNumber = (int) $minorNumber;

    }
    
    /**
     *
     * @return int the revisionnumber 
     */
    public function getRevisionNumber()
    {
        return $this->revisionNumber;

    }
    
    /**
     *
     * @param int $revisionNumber 
     */
    public function setRevisionNumber( $revisionNumber )
    {
        $this->revisionNumber = (int) $revisionNumber;

    }
    
    /**
     *
     * @return int the buildnumber 
     */
    public function getBuildNumber()
    {
        return $this->buildNumber;

    }
    
    /**
     *
     * @param int $buildNumber 
     */
    public function setBuildNumber( $buildNumber )
    {
        $this->buildNumber = (int) $buildNumber;

    }
    
     
    
    
}

?>
