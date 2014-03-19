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
 * 
 *
 * @author drak3
 */
class Command
{

    /**
     * A simple builder which drops support for multiple values of params
     * @deprecated currently its just a alias for new Command();
     * @param string $name
     * @param array $options
     * @param array $params 
     * @return Command
     */
    public static function simpleCommand($cmdname, array $params = Array(), array $options = Array())
    {
        return new Command($cmdname, $params, $options);
    }

    /**
     * The name of the command
     * @var string 
     */
    protected $name = '';

    /**
     * The options of the command
     * @var array of String 
     */
    protected $options = Array();

    /**
     * The parameters of the command. Since a parameter could have
     * @var array of (string => array(string))  or (string => string)
     */
    protected $parameters = Array();

    /**
     *
     * @param type $name
     * @param array $parameters
     * @param array $options the options in form Array("foo", "bar") 
     */
    public function __construct($name, array $parameters = Array(), array $options = Array())
    {
        $this->name = $name;
        $this->options = $options;
        $this->parameters = $parameters;
    }

    /**
     * returns the name of the Command
     * @return string name 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the options of the command
     * @return array of String 
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Returns the parameters of the command
     * @return array of (String => array of string) 
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Returns wether a option is set or not
     * @param string $name
     * @return boolean 
     */
    public function optionIsSet($name)
    {
        return in_array( $name, $this->options );
    }

    /**
     *
     * @param type $name the name of the parameter
     * @param misc $else the value returned if the parameter is not set
     * @param int  $index the index of the parameter value
     * @return array of string 
     */
    public function getParameter($name, $else = NULL, $index = 0)
    {
        if(isset($this->parameters[$name])) {
            return $this->parameters[$name];
        }
        else {
            return $else;
        }
    }

    /**
     * Test for equality of two commands
     * order of parameter does not matter for this test
     * @param Command $c
     * @return boolean 
     */
    public function equals(Command $c)
    {
        $found = FALSE;
        if ($c->getName() !== $this->getName())
        {
            return false;
        }
        if (count($this->getOptions()) !== count($c->getOptions()))
        {
            return FALSE;
        }
        foreach ($this->getOptions() as $op)
        {
            $found = FALSE;
            foreach ($c->getOptions() as $op2)
            {
                if ($op === $op2)
                {
                    $found = TRUE;
                    break;
                }
            }
            if (!$found) return FALSE;
        }

        if (count($this->getParameters()) !== count($c->getParameters()))
        {
            return FALSE;
        }
        foreach ($this->getParameters() as $pname1 => $pvalue1)
        {
            $found = FALSE;
            foreach ($c->getParameters() as $pname2 => $pvalue2)
            {
                if ($pname1 === $pname2 && $pvalue1 === $pvalue2)
                {
                    $found = TRUE;
                    break;
                }
            }
            if (!$found) return FALSE;
        }
        return TRUE;
    }

}

?>
