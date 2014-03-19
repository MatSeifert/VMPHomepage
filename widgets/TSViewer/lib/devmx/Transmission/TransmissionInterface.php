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

namespace devmx\Transmission;

/**
 *
 * @author drak3
 */
interface TransmissionInterface
{

    public function establish();

    public function getPort();

    public function getHost();

    public function isEstablished();

    public function send($data);

    /**
     * waits until a line end and returns the data (blocking)
     */
    public function receiveLine($length = 4096);

    /**
     * Returns all data currently on the stream (nonblocking)
     */
    public function getAll();

    /**
     * waits until given datalength is sent and returns data
     */
    public function receiveData($lenght = 4096);

    public function close();
}

?>
