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


namespace devmx\Teamspeak3\Node;

/**
 * @since 1.0
 * @author drak3, Maximilian Narr
 */
interface ServerInterface
{
    
    public function createVirtualServer($data);
    
    public function deleteVirtualServer($identifyer);
    
    public function getVirtualServerByPort($port);
    
    public function getVirtualServerByID($id);
    
    public function stop();
    
    public function findVirtualServer($predicate);
    
    public function getVirtualServers($predicate=NULL);

       
    /**
     * @return \DateInterval the uptime of the server
     */
    public function getUptime();
    
    /**
     * @return \DateTime the current time on the server
     */
    public function getCurrentServerTime();
    
    /**
     * @since 1.0
     * @return int Number of virtual servers running 
     */
    public function getNumberOfRunningVirtualServers();
    
    /**
     * @since 1.0
     * @param int $numberOfRunningVirtualServers number of virtual servers running  
     */
    public function setNumberOfRunningVirtualServers($numberOfRunningVirtualServers);
    
    
    /**
     * @since 1.0
     * @return int Bandwith of filetransfer sent
     */
    public function getSentFileTransferBandwith();
    
    /**
     * @since 1.0
     * @param int $sentFileTransferBandwidth Bandwith of filetransfer sent
     */
    public function setSentFileTransferBandwidth($sentFileTransferBandwidth);
    
    
    /**
     * @since 1.0
     * @return int Bandwidth of filetransfer received 
     */
    public function getReceivedFiletransferBandwith();
    
    /**
     * @since 1.0
     * @param int $receivedFiletransferBandwith Bandwidth of filetransfer received
     */
    public function setReceivedFiletransferBandwith($receivedFiletransferBandwith);
    
    
    /**
     * @since 1.0
     * @return int Received Packets
     */
    public function getReceivedPackets();
    
    /**
     * @since 1.0
     * @param int $receivedPackets Received Packets 
     */
    public function setReceivedPackets($receivedPackets);
    
    
    /**
     * @since
     * @return int Sent Packets 
     */
    public function getSentPackets();
    
    /**
     * @since 1.0
     * @param int $sentPackets Sent Packets 
     */
    public function setSentPackets($sentPackets);
    
    
    /**
     * @since 1.0
     * @return int Received Bytes 
     */
    public function getReceivedBytes();
    
    /**
     * @since 1.0
     * @param int $receivedBytes Received Bytes 
     */
    public function setReceivedBytes($receivedBytes);
    
    
    /**
     * @since 1.0
     * @return int Sent Bytes 
     */
    public function getSentBytes();
    
    /**
     * @since 1.0
     * @param int $sentBytes Sent Bytes 
     */
    public function setSentBytes($sentBytes);
    
    
    /**
     * @since 1.0
     * @return int Bandiwdth sent last second 
     */
    public function getBandwidthSentLastSecond();
    
    /**
     * @since 1.0
     * @param int $bandwidthSentLastSecond Bandwidth sent last second 
     */
    public function setBandwidthSentLastSecond($bandwidthSentLastSecond);
    
    
    /**
     * @since 1.0
     * @return int Bandwidth Received Last Second 
     */
    public function getBandwidthReceivedLastSecond();
    
    /**
     * @since 1.0
     * @param int $bandwidthReceivedLastSecond Bandwidth Received last Second 
     */
    public function setBandwidthReceivedLastSecond($bandwidthReceivedLastSecond);
    
    
    /**
     * @since 1.0
     * @return int Bandwidth sent last minute 
     */
    public function getBandwidthSentLastMinute();
    
    /**
     * @since 1.0
     * @param int $bandwidthSentLastMinute Bandwidth sent last minute 
     */
    public function setBandwidthSentLastMinute($bandwidthSentLastMinute);
    
    
    /**
     * @since 1.0
     * @return int Bandwidth received last minute 
     */
    public function getBandwidthReceivedLastMinute();
    
    /**
     * @since 1.0
     * @param int $bandwidthReceivedLastMinute Bandwidth received last minute 
     */
    public function setBandwidthReceivedLastMinute($bandwidthReceivedLastMinute);
    
    
    /** 
     * @since 1.0
     * @return string Database version
     */
    public function getDatabaseVersion();
    
    /**
     * @since 1.0
     * @param string Databse version
     */
    public function setDatabaseVersion($databaseVersion);
    
    
    /** 
     * @since 1.0
     * @return int QueryGuestGroup-Id 
     */
    public function getQueryGuestGroupId();
    
    /**
     * @since 1.0
     * @param int $queryGuestGroupId QueryGuestGroup-Id 
     */
    public function setQueryGuestGroupId($queryGuestGroupId);
    
    
    /**
     * @since 1.0
     * @return int ServerAdminGroup-Template-Id 
     */
    public function getServerAdminGroupTemplateId();
    
    /**
     * @since 1.0
     * @param int $serverAdminGroupTemplateId ServerAdminGroup-Template-Id
     */
    public function setServerAdminGroupTemplateId($serverAdminGroupTemplateId);
    
    
    /**
     * @since 1.0
     * @return int Filetransfer-Port 
     */
    public function getFiletransferPort();

    /**
     * @since 1.0
     * @param int $filetransferPort Filetransfer-Port 
     */
    public function setFiletransferPort($filetransferPort);
    
    
    /**
     * @since 1.0
     * @return int Max download bandwidth 
     */
    public function getMaxDownloadBandwidth();
    
    /**
     * @since 1.0
     * @param int $maxDownloadBandwidth Max download bandwidth 
     */
    public function setMaxDownloadBandwidth($maxDownloadBandwidth);
    
    
    /**
     * @since 1.0
     * @return int max upload bandwidth
     */
    public function getMaxUploadBandwidth();
    
    /**
     * @since 1.0
     * @param int $maxUploadBandwidth max upload bandwidth
     */
    public function setMaxUploadBandwidth($maxUploadBandwidth);
    
    
    /** 
     * @since 1.0
     * @return int Default ServerGroup-Template-Id 
     */
    public function getDefaultServerGroupTemplateId();
    
    /**
     * @since 1.0
     * @param int $defaultServerGroupTemplateId Default ServerGroup-Template-Id 
     */
    public function setDefaultServerGroupTemplateId($defaultServerGroupTemplateId);
    
    
    /**
     * @since 1.0
     * @return int Default ChannelGroup-Template-Id 
     */
    public function getDefaultChannelGroupTemplateId();
    
    /**
     * @since 1.0
     * @param int $defaultChannelGroupTemplateId Default ChannelGroup-Template-Id   
     */
    public function setDefaultChannelGroupTemplateId($defaultChannelGroupTemplateId);
    
    
    /**
     * @since 1.0
     * @return int Default ChannelAdminGroup-Template-Id 
     */
    public function getDefaultChannelAdminGroupTemplateId();
    
    /**
     * @since 1.0
     * @param int $defaultChannelAdminGroupTemplateId Default ChannelAdminGroup-Template-Id 
     */
    public function setDefaultChannelAdminGroupTemplateId($defaultChannelAdminGroupTemplateId);
    
    
    /** 
     * @since 1.0
     * @return int Max Clients 
     */
    public function getMaxClients();
    
    /**
     * @since 1.0
     * @param int $maxClients Max Clients 
     */
    public function setMaxClients($maxClients);
    
    
    /**
     * @since 1.0
     * @return int Number of clients online 
     */
    public function getNumberOfClients();
    
    /**
     * @since 1.0
     * @param int $numberOfClients Number of clients online 
     */
    public function setNumberOfClients($numberOfClients);
    
    
    /**
     * @since 1.0
     * @return int Number of channels 
     */
    public function getNumberOfChannels();
    
    /**
     * @since 1.0
     * @param int $numberOfChannels Number of channels 
     */
    public function setNumberOfChannels($numberOfChannels);
    
    
    /**
     * @since 1.0
     * @return int Commands allowed per floodtime 
     */
    public function getCommandsAllowedPerFloodtime();
    
    /**
     * @since 1.0
     * @param int $commandsAllowedPerFloodtime Commands allowed per floodtime 
     */
    public function setCommandsAllowedPerFloodtime($commandsAllowedPerFloodtime);
    
    
    /**
     * @since 1.0
     * @return int Floodtime 
     */
    public function getFloodtime();
    
    /**
     * @since 1.0
     * @param int $floodtime Floodtime 
     */
    public function setFloodtime($flootime);
    
    
    /**
     * @since 1.0
     * @return int Flood bantime 
     */
    public function getFloodBantime();
    
    /**
     * @since 1.0
     * @param int $flootBantime Flood bantime 
     */
    public function setFloodBantime($floodBantime);
    
    
    /**
     * @since 1.0
     * @todo add type
     * @return Bound Ips
     */
    public function getBoundIps();   #
    
    /**
     * @since 1.0
     * @todo add type
     * @param $boundIps Bound Ips 
     */
    public function setBoundIps($boundIps);
}

?>
