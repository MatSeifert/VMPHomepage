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

namespace devmx\Teamspeak3\FileTransfer;

/**
 * A download action for the Teamspeak3 ft-Interface
 * @author drak3
 */
class Downloader extends AbstractTransferer
{

    /**
     * The key which is sent to start the action
     * @var string  
     */
    protected $key;

    /**
     * the excepted bytes of the data to read 
     */
    protected $bytesToRead;

    /**
     * @param \devmx\Transmission\TransmissionInterface $transmission the transmission on which the download is performed
     * @param string $key the key to identify the ft-Session (normally sent by the Ts3-Query
     * @param int $bytesToRead 
     */
    public function __construct(\devmx\Transmission\TransmissionInterface $transmission, $key, $bytesToRead)
    {
        $this->transmission = $transmission;
        $this->key = $key;
        $this->bytesToRead = $bytesToRead;
    }

    /**
     * Downloads the file specified by the $key
     * @return string the downloaded file 
     */
    public function transfer()
    {
        if (!$this->transmission->isEstablished()) $this->transmission->establish();
        $this->sendFull($this->key, strlen($this->key));
        return $this->receiveFull($this->bytesToRead);
    }

    /**
     * Reads data from the stream until $toRead bytes are received
     * blocks until ALL bytes are read
     * @param int $toRead Number of bytes to read
     * @return string the read data
     */
    private function receiveFull($toRead)
    {
        $result = $cur = '';
        while ($toRead > 0)
        {
            $cur = $this->transmission->receiveData($toRead);
            $toRead -= strlen($cur);
            $result .= $cur;
        }
        return $result;
    }

}

?>
