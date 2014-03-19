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


namespace devmx\Teamspeak3\Query\Transport\Decorator\Logging;

/**
 * Provides a simple logging interface
 * @author Maximilian Narr 
 */
interface LoggingInterface
{

    const LOGGING_LEVEL_INFO = 0;
    const LOGGING_LEVEL_NOTICE = 1;
    const LOGGING_LEVEL_WARNING = 2;
    const LOGGING_LEVEL_ERROR = 3;
    const LOGGING_LEVEL_FATAL = 4;

    /**
     * @param string $message Log message
     * @param int $logLevel Log level
     * @author Maximilian Narr 
     */
    public function addLog($message, $logLevel);
}

?>
