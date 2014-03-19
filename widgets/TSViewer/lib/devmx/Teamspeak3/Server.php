<?php


namespace devmx\Teamspeak3;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 
 *
 * @author drak3
 */
class Server implements \devmx\Teamspeak3\Node\ServerInterface, \ArrayAccess
{
    
    const LOG_LEVEL_ERROR = 1;
    const LOG_LEVEL_WARNING = 2;
    const LOG_LEVEL_DEBUG = 3;
    const LOG_LEVEL_INFO = 4;
    
    /**
     * @var array  
     */
    protected $data;
    
    protected $virtualServers = Array();
    
    /**
     * @todo maybe rename to set($name, $value)
     * @param type $name
     * @param type $value 
     */
    public function setValue($name, $value) {
        $this->data[$name] = $value;
    }
    
    /**
     * @todo maybe rename to get($name)
     * @param type $name
     * @return type 
     */
    public function getValue($name) {
        return $this->data[$name];
    }
    
    public function offsetExists( $offset )
    {
        return TRUE;
    }

    public function offsetGet( $offset )
    {
        return $this->getValue($offset);
    }

    public function offsetSet( $offset , $value )
    {
        return $this->setValue($offset, $value);
    }

    public function offsetUnset( $offset )
    {
        unset($this->data[$offset]);
    }
    
    public function getData() {
        return $this->data;
    } 
    
    public function setData(array $data) {
        $this->data = $data;
    }

    
    public function createVirtualServer($data) {
       if($data instanceof Node\VirtualServerInterface && is_int($data->getID())) {
           $this->virtualServers[$data->getID()] = $data;
       }
       elseif(is_int($data['id'])) {
           $server = new VirtualServer();
           $server->setData($data);
       }
       return $data;
    }
    
    public function deleteVirtualServer($identifyer) {
        if(is_int($identifyer)) {
            if(isset($this->virtualServers[$identifyer])) {
                unset($this->virtualServers[$identifyer]);
            }
        }
        elseif($identifyer instanceof Node\VirtualServerInterface) {
            if(isset($this->virtualServers[$identifyer->getID()])) {
                unset($this->virtualServers[$identifyer->getID()]);
            }
        }
    }
    
    public function getVirtualServerByPort($port) {
        foreach($this->virtualServers as $server) {
            if($server->getPort() == $port) {
                return $server;
            }
        }
    }
    
    public function getVirtualServerByID($id){
        foreach($this->virtualServers as $server) {
            if($server->getID() == $id) {
                return $server;
            }
        }
    }
    
    public function stop() {
        $this->stopped = TRUE;
    }
    
    public function findVirtualServer($predicate) {
        foreach($this->virtualServers as $server) {
            if($predicate($server)) {
                return $server;
            }
        }
    }
    
    public function getVirtualServers($predicate=NULL) {
        if($predicate !== NULL && is_callable( $predicate )) {
            $ret = Array();
            foreach($this->virtualServers as $server) {
                if($predicate($server)) {
                    $ret[] = $server;
                }
            }
            return $ret;
        }
        return $this->virtualServers;
    }

    
    public function getVersion() {
        return $this['_version'];
    }
    
    public function setVersion($v) {
        $this['_version'] = $v;
        return $this;
    }
    
    /**
     * @return \DateInterval the uptime of the server
     */
    public function getUptime() {
        return $this['instance_uptime'][0];
    }
    
    public function setUptime($up) {
        $this['instance_uptime'] = $up;
        return $this;
    }
    
    /**
     * @return \DateTime the current time on the server
     */
    public function getCurrentServerTime() {
        $time = new \DateTime();
        $time->setTimestamp($this['host_timestamp_utc']);
    }
    
    public function setCurrentServerTime(  \DateTime $time) {
        $this['host_timestamp_utc'] = $time->getTimestamp();
        return $this;
    }
    
    /**
     * @since 1.0
     * @return int Number of virtual servers running 
     */
    public function getNumberOfRunningVirtualServers() {
        return $this['virtualservers_running_total'];
    }
    
    /**
     * @since 1.0
     * @param int $numberOfRunningVirtualServers number of virtual servers running  
     */
    public function setNumberOfRunningVirtualServers($numberOfRunningVirtualServers) {
        $this['virtualservers_running_total'] = $numberOfRunningVirtualServers;
        return $this;
    }
    
    
    /**
     * @since 1.0
     * @return int Bandwith of filetransfer sent
     */
    public function getSentFileTransferBandwith() {
       return $this['connection_filetransfer_bandwidth_sent'];
    }
    
    /**
     * @since 1.0
     * @param int $sentFileTransferBandwidth Bandwith of filetransfer sent
     */
    public function setSentFileTransferBandwidth($sentFileTransferBandwidth) {
        $this['connection_filetransfer_bandwidth_sent'] = $sentFileTransferBandwidth;
        return $this;
    }
    
    
    /**
     * @since 1.0
     * @return int Bandwidth of filetransfer received 
     */
    public function getReceivedFiletransferBandwith() {
        return $this['connection_filetransfer_bandwidth_received'];
    }
    
    /**
     * @since 1.0
     * @param int $receivedFiletransferBandwith Bandwidth of filetransfer received
     */
    public function setReceivedFiletransferBandwith($receivedFiletransferBandwith) {
        $this['connection_filetransfer_bandwidth_received'] = $receivedFiletransferBandwith;
        return $this;
    }
    
    
    /**
     * @since 1.0
     * @return int Received Packets
     */
    public function getReceivedPackets() {
        return $this['connections_packets_received_total'];
    }
    
    /**
     * @since 1.0
     * @param int $receivedPackets Received Packets 
     */
    public function setReceivedPackets($receivedPackets){
        $this['connections_packets_received_total'] = $receivedPackets;
        return $this;
    }
    
    
    /**
     * @since
     * @return int Sent Packets 
     */
    public function getSentPackets() {  
        return $this['connections_packets_sent_total'];
    }
    
    /**
     * @since 1.0
     * @param int $sentPackets Sent Packets 
     */
    public function setSentPackets($sentPackets) {
        $this['connections_packets_sent_total'] = $sentPackets;
        return $this;
    }
    
    
    /**
     * @since 1.0
     * @return int Received Bytes 
     */
    public function getReceivedBytes() {
        return $this['connection_bytes_received_total'];
    }
    
    /**
     * @since 1.0
     * @param int $receivedBytes Received Bytes 
     */
    public function setReceivedBytes($receivedBytes) {
        $this['connections_bytes_received_total'] = $receivedBytes;
        return $this;
    }
    
    
    /**
     * @since 1.0
     * @return int Sent Bytes 
     */
    public function getSentBytes() {
        return $this['connections_bytes_sent_total'];
    }
    
    /**
     * @since 1.0
     * @param int $sentBytes Sent Bytes 
     */
    public function setSentBytes($sentBytes) {
        $this['connections_bytes_sent_total'] = $sentBytes;
        return $this;
    }
    
    
    /**
     * @since 1.0
     * @return int Bandiwdth sent last second 
     */
    public function getBandwidthSentLastSecond() {
        return $this['connection_bandwith_sent_last_second_total'];
    }
    
    /**
     * @since 1.0
     * @param int $bandwidthSentLastSecond Bandwidth sent last second 
     */
    public function setBandwidthSentLastSecond($bandwidthSentLastSecond) {
        $this['connection_bandwith_sent_last_second_total'] = $bandwidthSentLastSecond;
        return $this;
    }
    
    
    /**
     * @since 1.0
     * @return int Bandwidth Received Last Second 
     */
    public function getBandwidthReceivedLastSecond() {
        return $this['connection_bandwith_received_last_second_total'];
    }
    
    /**
     * @since 1.0
     * @param int $bandwidthReceivedLastSecond Bandwidth Received last Second 
     */
    public function setBandwidthReceivedLastSecond($bandwidthReceivedLastSecond) {
        $this['connection_bandwith_received_last_second_total'] = $bandwidthReceivedLastSecond;
        return $this;
    }
    
    
    /**
     * @since 1.0
     * @return int Bandwidth sent last minute 
     */
    public function getBandwidthSentLastMinute() {
        return $this['connection_bandwith_sent_last_minute_total'];
    }
    
    /**
     * @since 1.0
     * @param int $bandwidthSentLastMinute Bandwidth sent last minute 
     */
    public function setBandwidthSentLastMinute($bandwidthSentLastMinute) {
        $this['connection_bandwith_sent_last_minute_total'] = $bandwidthSentLastMinute;
        return $this;
    }
    
    
    /**
     * @since 1.0
     * @return int Bandwidth received last minute 
     */
    public function getBandwidthReceivedLastMinute() {
        return $this['connection_bandwith_received_last_minute_total'];
    }
    
    /**
     * @since 1.0
     * @param int $bandwidthReceivedLastMinute Bandwidth received last minute 
     */
    public function setBandwidthReceivedLastMinute($bandwidthReceivedLastMinute) {
        $this['connection_bandwith_received_last_minute_total']  = $bandwidthReceivedLastMinute;
        return $this;
    }
    
    
    /** 
     * @since 1.0
     * @return string Database version
     */
    public function getDatabaseVersion() {
        return $this['serverinstance_database_version'];
    }
    
    /**
     * @since 1.0
     * @param string Databse version
     */
    public function setDatabaseVersion($databaseVersion) {
        $this['serverinstance_database_version'] = $databaseVersion;
        return $this;
    }
    
    
    /** 
     * @since 1.0
     * @return int QueryGuestGroup-Id 
     */
    public function getQueryGuestGroupId() {
        return $this['serverinstance_guest_serverquery_gruop'];
    }
    
    /**
     * @since 1.0
     * @param int $queryGuestGroupId QueryGuestGroup-Id 
     */
    public function setQueryGuestGroupId($queryGuestGroupId) {
        $this['serverinstance_guest_serverquery_gruop'] = $queryGuestGroupId;
        return $this;
    }
    
    
    /**
     * @since 1.0
     * @return int ServerAdminGroup-Template-Id 
     */
    public function getServerAdminGroupTemplateId() {
        return $this['serverinstance_template_serveradmin_group'];
    }
    
    /**
     * @since 1.0
     * @param int $serverAdminGroupTemplateId ServerAdminGroup-Template-Id
     */
    public function setServerAdminGroupTemplateId($serverAdminGroupTemplateId) {
        $this['serverinstance_template_serveradmin_group'] = $serverAdminGroupTemplateId;
        return $this;
    }
    
    
    /**
     * @since 1.0
     * @return int Filetransfer-Port 
     */
    public function getFiletransferPort() {
        return $this['serverinstance_filetransfer_port'];
    }

    /**
     * @since 1.0
     * @param int $filetransferPort Filetransfer-Port 
     */
    public function setFiletransferPort($filetransferPort) {
        $this['serverinstance_filetransfer_port'] = $filetransferPort;
        return $this;
    }
    
    
    /**
     * @since 1.0
     * @return int Max download bandwidth 
     */
    public function getMaxDownloadBandwidth() {
        return $this['serverinstance_max_download_total_bandwidth'];
    }
    
    /**
     * @since 1.0
     * @param int $maxDownloadBandwidth Max download bandwidth 
     */
    public function setMaxDownloadBandwidth($maxDownloadBandwidth) {
        $this['serverinstance_max_download_total_bandwidth'] = $maxDownloadBandwidth;
        return $this;
    }
    
    
    /**
     * @since 1.0
     * @return int max upload bandwidth
     */
    public function getMaxUploadBandwidth() {
        return $this['serverinstance_max_upload_total_bandwidth'];
    }
    
    /**
     * @since 1.0
     * @param int $maxUploadBandwidth max upload bandwidth
     */
    public function setMaxUploadBandwidth($maxUploadBandwidth) {
        $this['serverinstance_max_upload_total_bandwidth'] = $maxUploadBandwidth;
        return $this;
    }
    
    
    /** 
     * @since 1.0
     * @return int Default ServerGroup-Template-Id 
     */
    public function getDefaultServerGroupTemplateId() {
        return $this['serverinstance_template_serverdefault_group'];
    }
    
    /**
     * @since 1.0
     * @param int $defaultServerGroupTemplateId Default ServerGroup-Template-Id 
     */
    public function setDefaultServerGroupTemplateId($defaultServerGroupTemplateId) {
        $this['serverinstance_template_serverdefault_group'] = $defaultServerGroupTemplateId;
        return $this;
    }
    
    
    /**
     * @since 1.0
     * @return int Default ChannelGroup-Template-Id 
     */
    public function getDefaultChannelGroupTemplateId() {
        return $this['serverinstance_template_channeldefault_group'];
    }
    
    /**
     * @since 1.0
     * @param int $defaultChannelGroupTemplateId Default ChannelGroup-Template-Id   
     */
    public function setDefaultChannelGroupTemplateId($defaultChannelGroupTemplateId) {
        $this['serverinstance_template_channeldefault_group'] = $defaultChannelGroupTemplateId;
        return $this;
    }
    
    
    /**
     * @since 1.0
     * @return int Default ChannelAdminGroup-Template-Id 
     */
    public function getDefaultChannelAdminGroupTemplateId() {
        return $this['serverinstance_template_channeladmin_group'];
    }
    
    /**
     * @since 1.0
     * @param int $defaultChannelAdminGroupTemplateId Default ChannelAdminGroup-Template-Id 
     */
    public function setDefaultChannelAdminGroupTemplateId($defaultChannelAdminGroupTemplateId) {
        $this['serverinstance_template_channeladmin_group'] = $defaultChannelAdminGroupTemplateId;
        return $this;
    }
    
    
    /** 
     * @since 1.0
     * @return int Max Clients 
     */
    public function getMaxClients() {
        return $this['virtualservers_total_maxclients'];
    }
    
    /**
     * @since 1.0
     * @param int $maxClients Max Clients 
     */
    public function setMaxClients($maxClients) {
        $this['virtualservers_total_maxclients'] = $maxClients;
        return $this;
    }
    
    
    /**
     * @since 1.0
     * @return int Number of clients online on all virtual servers
     */
    public function getNumberOfClients() {
        return $this['virtualservers_total_clients_online'];
    }
    
    /**
     * @since 1.0
     * @param int $numberOfClients Number of clients online 
     */
    public function setNumberOfClients($numberOfClients) {
        $this['virtualservers_total_clients_online'] = $numberOfClients;
        return $this;
    }
    
    
    /**
     * @since 1.0
     * @return int Number of channels 
     */
    public function getNumberOfChannels() {
        return $this['virtualservers_total_channels_online'];
    }
    
    /**
     * @since 1.0
     * @param int $numberOfChannels Number of channels 
     */
    public function setNumberOfChannels($numberOfChannels) {
         $this['virtualservers_total_channels_online'] = $numberOfChannels;
         return $this;
    }
    
    
    /**
     * @since 1.0
     * @return int Commands allowed per floodtime 
     */
    public function getCommandsAllowedPerFloodtime() {
        return $this['serverinstance_serverquery_flood_commands'];
    }
    
    /**
     * @since 1.0
     * @param int $commandsAllowedPerFloodtime Commands allowed per floodtime 
     */
    public function setCommandsAllowedPerFloodtime($commandsAllowedPerFloodtime) {
        $this['serverinstance_serverquery_flood_commands'] = $commandsAllowedPerFloodtime;
        return $this;
    }
    
    
    /**
     * @since 1.0
     * @return int Floodtime 
     */
    public function getFloodtime() {
        return $this['serverinstance_serverquery_flood_time'];
    }
    
    /**
     * @since 1.0
     * @param int $floodtime Floodtime 
     */
    public function setFloodtime($floodtime) {
        $this['serverinstance_serverquery_flood_time'] = $floodtime;
        return $this;
    }
    
    
    /**
     * @since 1.0
     * @return int Flood bantime 
     */
    public function getFloodBantime() {
        return $this['serverinstance_serverquery_flood_ban_time'];
    }
    
    /**
     * @since 1.0
     * @param int $flootBantime Flood bantime 
     */
    public function setFloodBantime($floodBantime) {
        $this['serverinstance_serverquery_flood_ban_time'] = $floodBantime;
        return $this;
    }
    
    
    /**
     * @since 1.0
     * @todo add type
     * @return Bound Ips
     */
    public function getBoundIps() {
        return $this['_bound_ips'];
    }
    
    /**
     * @since 1.0
     * @todo add type
     * @param $boundIps Bound Ips 
     */
    public function setBoundIps($boundIps) {
        $this['_bound_ips'] = $boundIps;
        return $this;
    }
}

?>
