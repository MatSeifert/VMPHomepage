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

namespace devmx\Teamspeak3\Query;

/**
 * The base class for all responses sent by the Query
 * A response acts like an array, so you can acces all items directly via the response object
 * @author drak3
 */
class Response implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * 
     * @var array of array of (String=>String) 
     */
    protected $items;
    
    protected $raw;

    /**
     * Returns all holded items
     * @return array of array of (String=>misc) 
     */
    public function getItems()
    {
        return $this->items;
    }

    public function setItems(array $items)
    {
        $this->items = $items;
    }

    /**
     * Returns a item of the response
     * @param string $index
     * @param misc $else
     * @return array | misc array of (String => misc) if set else $else
     */
    public function getItem($index, $else = Array())
    {
        if (isset($this->items[$index])) return $this->items[$index];
        else return $else;
    }

    /**
     * Returns the value of an item
     * @param int $index
     * @param string $name
     * @param misc $else
     * @return misc 
     */
    public function getValue($name, $index=0, $else = NULL)
    {
        if (isset($this->items[$index][$name])) return $this->items[$index][$name];
        else return $else;
    }

    /**
     * Converts the items array to an associative array with $key as key
     * @param string $key
     * @return array 
     */
    public function toAssoc($key)
    {
        $assoc = Array();
        foreach ($this->items as $val)
        {
            if (isset($val[$key]))
            {
                $assoc[$val[$key]] = $val;
            }
        }
        return $assoc;
    }
    
    
    public function setRawResponse($raw) {
        $this->raw = $raw;
    }
    
    public function getRawResponse() {
        return $this->raw;
    }

    //implementing \ArrayAccess, \Iterator and \Countable
    public function offsetSet($offset, $value)
    {
        
    }

    public function offsetExists($offset)
    {
        if(is_string($offset) && isset($this->items[0][$offset])) {
            return true;
        }
        return isset($this->items[$offset]);
    }

    public function offsetUnset($offset)
    {
        
    }

    public function offsetGet($offset)
    {
        if(is_string($offset) && isset($this->items[0][$offset])) {
            return $this->items[0][$offset];
        }
        return isset($this->items[$offset]) ? $this->items[$offset] : null;
    }

    public function rewind()
    {
        reset($this->items);
    }

    public function current()
    {
        return current($this->items);
    }

    public function key()
    {
        return key($this->items);
    }

    public function next()
    {
        return next($this->items);
    }

    public function valid()
    {
        return $this->current() !== false;
    }

    public function count()
    {
        return count($this->items);
    }

}

?>
