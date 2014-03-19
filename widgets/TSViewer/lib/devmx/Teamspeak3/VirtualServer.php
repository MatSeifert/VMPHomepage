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
class VirtualServer implements \ArrayAccess//implements \devmx\Teamspeak3\Node\VirtualServerInterface
{
    
    public function createChannel($channelData) {
        
    }
    
    public function getChannelByID($id) {
        
    }
    
    public function findChannelsByName($name) {
        
    }
    
    public function findChannels($predicate) {
        
    }
    
    public function getClients($predicate=NULL) {
        
    }
    
    public function getClientById($id) {
        
    }
    public function getClientByDBID($id) {
        
    }
    public function findClients($predicate) {
        
    }
    public function createClient($data) {
        
    }
    
    public function sendMessage($msg) {
        
    }
    
    public function getServerGroups($predicate=NULL) {
        
    }
    
    public function getChannelGroups($predicate=NULL) {
        
    }
    
    public function getServerGroupByID($id) {
        
    }
    
    public function getChannelGroupByID($id) {
        
    }
    
    public function createChannelGroup($identifyer) {
        
    }
    
    public function createServerGroup($identifyer) {
        
    }
    
    public function addToken($token) {
        
    }
    public function getTokens() {
        
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
        
    }
    
    public function getValue($name) {
        
    }
    
    public function setValue($name) {
        
    }


    
    
    public function getName()
    {
        return $this["virtualserver_name"];
    }
    
    public function setName($name)
    {
        $this['virtualserver_name'] = $name;
        return $this;
    }
    
    
    public function getWelcomeMessage()
    {
        return $this["virtualserver_welcomemessage"];
    }
    
    public function setWelcomeMessage($welcomeMessage)
    {
        $this["virutalserver_welcomemessage"] = $welcomeMessage ;
        return $this;
    }
    
    
    public function getMaximumClients()
    {
        return $this["virtualserver_maxclients"];
    }
    
    public function setMaximumClients($maxClients)
    {
        $this["virtualserver_maxclients"] = $maxClients;
        return $this;
    }
    
    
    public function hasPassword()
    {
        return $this["virtualserver_flag_password"];
    }
    
    public function getPassword()
    {
        return $this["virtualserver_password"];
    }
    
    public function setPassword($pass)
    {
        $this["virtualserver_password"] = $pass;
        return $this;
    }
    
    
    public function getNumberOfClients()
    {
        return $this["virtualserver_clientsonline"];
    }
    
    
    public function getNumberOfQueryClients()
    {
        return $this["virtualserver_queryclients_online"];
    }
    
    
    public function getNumberOfChannels()
    {
        return $this["virtualserver_channelsonline"];
    }
    
    
    public function getDateOfCreation()
    {
        return $this["virtualserver_created"];
    }
    
    public function setDateOfCreation(\DateTime $creation)
    {
        $this["virtualserver_created"] = $creation;
        return $this;
    }
    
    
    public function getUptime()
    {
        return $this["virtualserver_uptime"];
    }
    
    public function setUptime(\DateInterval $uptime)
    {
        $this["virtualserver_uptime"] = $uptime;
        return $this;
    }
    
    
    public function getHostMessage()
    {
        return $this["virtualserver_hostmessage"];
    }
    
    public function setHostMessage($msg)
    {
        $this["virtualserver_hostmessage"] = $msg;
        return $this;
    }
    
    
    public function getHostMessageMode()
    {
        return $this["virtualserver_hostmessage_mode"];
    }
    
    public function setHostMessageMode($mode)
    {
        $this["virtualserver_hostmessage_mode"] = $mode;
        return $this;
    }
    
    
    public function getDefaultChannelGroup()
    {
        return $this["virtualserver_default_channel_group"];
    }
    
    public function setDefaultChannelGroup($group)
    {
        $this["virtualserver_default_channel_group"];
        return $this;
    }
    
    
    public function getDefaultServerGroup()
    {
        $this["virtualserver_default_server_group"];
    }
    
    public function setDefaultServerGroup($group)
    {
        $this["virtualserver_default_server_group"] = $group;
        return $this;    
    }
    
    
    public function getDefaultChannelAdminGroup()
    {
        return $this["virtualserver_default_channel_admin_group"];
    }
    
    public function setDefaultChannelAdminGroup($group)
    {
        $this["virtualserver_default_channel_admin_group"] = $group;
        return $this;
    }
    
    
    public function getPlatform()
    {
        return $this["virtualserver_platform"];
    }
    
    public function setPlatform($platform)
    {
        $this["virtualserver_platform"] = $platform;
        return $this;
    }
    
    
    public function getVersion()
    {
        return $this["virtualserver_version"];
    }
    
    public function setVersion(\devmx\Teamspeak3\Version $version)
    {
        $this["virtualserver_version"] = $version;
        return $this;
    }
    
    
    public function getMaximumDownloadBandwidth()
    {
        return $this["virtualserver_max_download_total_bandwidth"];
    }
    
    public function setMaximumDownloadBandwidth($bandwidth)
    {
        $this["virtualserver_max_download_total_bandwidth"] = $bandwidth;
        return $this;
    }
    
    
    public function getMaximumUploadBandwidth()
    {
        return $this["virtualserver_max_upload_total_bandwidth"];
    }
    
    public function setMaximumUploadBandwidth($bandwidth)
    {
        $this["virtualserver_max_upload_total_bandwidth"] = $bandwidth;
        return $this;
    }
    
    
    public function getHostBannerURL()
    {
        return $this["virtualserver_hostbanner_url"];
    }
    
    public function setHostBannerURL($url)
    {
        $this["virtualserver_hostbanner_url"] = $url;
        return $this;
    }
    
    
    public function getHostBannerGFXURL()
    {
        return $this["virtualserver_hostbanner_gfx_url"];
    }
    
    public function setHostBannerGFXURL($url)
    {
        $this["virtualserver_hostbanner_gfx_url"] = $url;
        return $this;
    }
    
    
    public function getHostBannerReloadInterval()
    {
        return $this["virtualserver_hostname_gfx_interval"];
    }
    
    public function setHostBannerReloadInterval(\DateInterval $interval)
    {
        $this["virtualserver_hostname_gfs_interval"];
        return $this;
    }
    
    
    public function getComplainLimit()
    {
        return $this["virtualserver_complain_autoban_count"];
    }
    
    public function setComplainLimit($limit)
    {
        $this["virtualserver_complain_autoban_count"] = $limit;
        return $this;
    }
    
    
    public function getAutoBanTime()
    {
        return $this["virtualserver_complain_autoban_time"];
    }
    
    public function setAutoBanTime(\DateInterval $time)
    {
        $this["virtualserver_complain_autoban_time"] = $time;
        return $this;
    }
    
    
    public function getComplainRemoveTime()
    {
        return $this["virtualserver_complain_remove_time"];
    }
    
    public function setComplainRemoveTime(\DateInterval $time)
    {
        $this["virtualserver_complain_remove_time"] = $time;
        return $this;
    }
    
    
    public function getNumberOfClientsInChannelBeforeForcedSilence()
    {
        return $this["virtualserver_min_clients_in_channel_before_forced_silence"];
    }
    
    
    public function setNumberOfClientsInChannelBeforeForcedSilence($number)
    {
        $this["virtualserver_min_clients_in_channel_before_forced_silence"] = $number;
        return $this;
    }
    
    
    public function getPrioritySpeakerDimmModificator()
    {
        return $this["virtualserver_priority_speaker_dimm_modificator"];
    }
    
    public function setPrioritySpeakerDimmModificatior($mod)
    {
        $this["virtualserver_priority_speaker_dimm_modificator"] = $mod;
        return $this;
    }
    
    
    public function getAntiFloodPointsReducedByTick()
    {
        return $this["virtualserver_antiflood_points_tick_reduce"];
    }
    
    public function setAntiFloodPointsReducedByTick($points)
    {
        $this["virtualserver_antiflood_points_tick_reduce"] = $points;
        return $this;
    }
    
    
    public function getAntiFloodPointsNeededForWarning()
    {
        return $this["virtualserver_antiflood_points_needed_warning"];
    }
    
    public function setAntiFloodPointsNeededForWarning($points)
    {
        $this["virtualserver_antiflood_points_needed_warning"] = $points;
        return $this;
    }
    
    
    public function getAntiFloodPointsNeededForBan()
    {
        return $this["virtualserver_antiflood_points_needed_ban"];
    }
    
    public function setAntiFloodPointsNeededForBan($points)
    {
        $this["virtualserver_antiflood_points_needed_ban"] = $points;
        return $this;
    }
    
    
    public function getAutomaticBanTime()
    {
        return $this["VIRTUALSERVER_ANTIFLOOD_POINTS _BAN_TIME"];
    }
    
    public function setAutomaticBanTime(\DateInterval $time)
    {
        $this["VIRTUALSERVER_ANTIFLOOD_POINTS _BAN_TIME"] = $time;
        return $this;
    }
    
    
    public function getClientConnections()
    {
        return $this["virtualserver_client_connections"];
    }
    
    public function setClientConnections($cons)
    {
        $this["virtualserver_client_connections"] = $cons;
        return $this;
    }
    
    
    public function getQueryClientConnections()
    {
        return $this["virtualserver_query_client_connections"];
    }
    
    public function setQueryClientConnections($cons)
    {
        $this["virtualserver_query_client_connections"] = $this;
        return $this;
    }
    
    
    public function getHostButtonTooltipText()
    {
        return $this["virtualserver_hostbutton_tooltip"];
    }
    
    public function setHostButtonTooltipText($text)
    {
        $this["virtualserver_hostbutton_tooltip"] = $text;
        return $this;
    }
    
    
    public function getHostButtonGFXURL()
    {
        return $this["virtualserver_hostbutton_gfx_url"];
    }
    
    public function setHostButtonGFXURL($url)
    {
        $this["virtualserver_hostbutton_gfx_url"] = $url;
        return $this;
    }
    
    
    public function getHostButtonURL()
    {
        return $this["virtualserver_hostbutton_url"];
    }
    
    public function setHostButtonURL($url)
    {
        $this["virtualserver_hostbutton_url"] = $url;
        return $this;
    }
    
    
    public function getDownloadQuota()
    {
       return $this["virtualserver_download_quota"];
    }
    
    public function setDownloadQuota($quota)
    {
        $this["virtualserver_download_quota"] = $quota;
        return $this;
    }
    
    
    public function getUploadQuota()
    {
        return $this["virtualserver_upload_quota"];
    }
    
    public function setUploadQuota($quota)
    {
        $this["virtualserver_upload_quota"] = $quota;
        return $this;
    }
    
    
    public function getBytesUploadedThisMonth()
    {
        return $this["virtualserver_month_bytes_downloaded"];
    }
    
    public function setBytesUploadedThisMonth($bytes)
    {
        $this["virtualserver_month_bytes_downloaded"] = $bytes;
        return $this;        
    }
    
    
    public function getBytesDownloadedThisMonth()
    {
        return $this["virtualserver_month_bytes_uploaded"];
    }
    
    public function setBytesDownloadedThisMonth($bytes)
    {
        $this["virtualserver_month_bytes_uploaded"] = $bytes;
        return $this;
    }
    
    
    public function getBytesDownloaded()
    {
        return $this["virtualserver_total_bytes_downloaded"];
    }
    
    public function setBytesDownloaded($bytes)
    {
        $this["virtualserver_total_bytes_downloaded"] = $bytes;
        return $this;
    }
    
    
    public function getBytesUploaded()
    {
        return $this["VIRTUALSERVER_ TOTAL_BYTES_UPLOADED"];
    }
    
    public function setBytesUploaded($bytes)
    {
        $this["VIRTUALSERVER_ TOTAL_BYTES_UPLOADED"] = $bytes;
        return $this;
    }
    
    
    public function getUniqueID()
    {
        return $this["virtualserver_unique_identifer"];
    }
    
    public function setUniqueID($id)
    {
        $this["virtualserver_unique_identifer"] = $id;
        return $this;
    }
    
    
    public function getID()
    {
        return $this["virtualserver_id"];
    }
    
    public function setID($id)
    {
        $this["virtualserver_id"] = $id;
        return $this;
    }
    
    
    public function getMachineID()
    {
        return $this["virtualserver_machine_id"];
    }
        
    public function setMachineID($id)
    {
        $this["virtualserver_machine_id"] = $id;
        return $this;
    }
    
    
    public function getPort()
    {
        return $this["virtualserver_port"];
    }
    
    public function setPort($port)
    {
        $this["virtualserver_port"] = $port;
        return $this;
    }
    
    
    public function isAutostarting()
    {
        return $this["virtualserver_autostart"];
    }
    
    public function setIsAutostarting($isAutoStarting)
    {
        $this["virtualserver_autostart"] = $isAutoStarting;
        return $this;
    }
    
    
    public function getFileTransferBandwidthSent()
    {
        return $this["connection_filetransfer_bandwidth_sent"];
    }
    
    public function setFileTransferBandwidthSent($bandwidth)
    {
        $this["connection_filetransfer_bandwidth_sent"] = $bandwidth;
        return $this;
    }
    
    
    public function getFileTransferBandwidthReceived()
    {
        return $this["connection_filetransfer_bandwidth_received"];
    }
    
    public function setFileTransferBandwidthReceived($bandwidth)
    {
        $this["connection_filetransfer_bandwidth_received"] = $bandwidth;
        return $this;
    }
    
    
    public function getPacketsSent()
    {
        return $this["connection_packets_sent_total"];
    }
    
    public function setPacketsSent($packets)
    {
        $this["connection_packets_sent_total"] = $packets;
        return $this;
    }
    
    
    public function getPacketsReceived()
    {
        return $this["connection_packets_received_total"];
    }
    
    public function setPacketsReceived($packets)
    {
        $this["connection_packets_received_total"] = $packets;
        return $this;
    }
    
    
    public function getBytesSent()
    {
        return $this["connection_bytes_sent_total"];
    }
    
    public function setBytesSent($bytes)
    {
        $this["connection_bytes_sent_total"] = $bytes;
        return $this;
    }
   
  
    public function getBytesReceived()
    {
        return $this["connection_bytes_received_total"];
    }
    
    public function setBytesReceived($bytes)
    {
        $this["connection_bytes_received_total"] = $bytes;
        return $this;
    }
    
    
    public function getBandwidthSentLastSecond()
    {
        return $this["connection_bandwidth_sent_last_second_total"];
    }
    
    public function setBandwidthSentLastSecond($bandwidth)
    {
        $this["connection_bandwidth_sent_last_second_total"] = $bandwidth;
        return $this;
    }
    
    
    public function getBandwidthReceivedLastSecond()
    {
        return $this["connection_bandwidth_received_last_second_total"];
    }
    
    public function setBandwidthReceivedLastSecond($bandwidth)
    {
        $this["connection_bandwidth_received_last_second_total"] = $bandwidth;
        return $this;
    }
    
    
    public function getBandwidthSentLastMinute()
    {
        return $this["connection_bandwidth_sent_last_minute_total"];
    }
    
    public function setBandwidthSentLastMinute($bandwidth)
    {
        $this["connection_bandwidth_sent_last_minute_total"] = $bandwidth;
    }
    
    
    public function getBandwidthReceivedLastMinute()
    {
        return $this["connection_bandwidth_received_last_minute_total"];
    }
    
    public function setBandwidthReceivedLastMinute($bandwidth)
    {
        $this["connection_bandwidth_received_last_minute_total"] = $bandwidth;
        return $this;
    }
    
    
    public function getStatus()
    {
        return $this["virtualserver_status"];
    }
    
    public function setStatus($status)
    {
        $this["virtualserver_status"] = $status;
        return $this;
    }
    
    
    public function logsClientEvents()
    {
        return $this["VIRTUALSERVER_ LOG_CLIENT"];
    }
    
    public function setLogsClientEvents($logs)
    {
        $this["VIRTUALSERVER_ LOG_CLIENT"] = $logs;
        return $this;
    }
    
    
    public function logsQueryEvents()
    {
        return $this["VIRTUALSERVER_ LOG_QUERY"];
    }
    
    public function setLogsQueryEvents($logs)
    {
        $this["VIRTUALSERVER_ LOG_QUERY"] = $logs;
        return $this;
    }
    
    
    public function logsChannelEvents()
    {
        return $this["VIRTUALSERVER_ LOG_CHANNEL"];
    }
    
    public function setLogsChannelEvents($logs)
    {
        $this["VIRTUALSERVER_ LOG_CHANNEL"] = $logs;
        return $this;
    }
    
    
    public function logsPermissionEvents()
    {
        return $this["VIRTUALSERVER_ LOG_PERMISSIONS"];
    }
    
    public function setLogsPermissionEvents($logs)
    {
        $this["VIRTUALSERVER_ LOG_PERMISSIONS"] = $logs;
        return $this;
    }
    
    
    public function logsServerEvents()
    {
        return $this["VIRTUALSERVER_ LOG_SERVER"];
    }
    
    public function setLogsServerEvents($logs)
    {
        $this["VIRTUALSERVER_ LOG_SERVER"] = $logs;
        return $this;
    }
    
    
    public function logsFileTransferEvents()
    {
        return $this["VIRTUALSERVER_ LOG_FILETRANSFER"];
    }
    
    public function setLogsFileTransferEvents($logs)
    {
        $this["VIRTUALSERVER_ LOG_FILETRANSFER"] = $logs;
        return $this;
    }
    
    
    public function getMinimalClientVersion()
    {
        return $this["virtualserver_min_client_version"];
    }
    
    public function setMinimalClientVersion(Version $version)
    {
        $this["virtualserver_min_client_version"] = $version;
        return $this;
    }
    
    
    public function getNeededSecurityLevel()
    {
        return $this["virtualserver_needed_identity_security_level"];
    }
    
    public function setNeededSecurityLevel($level)
    {
        $this["virtualserver_needed_identity_security_level"] = $level;
        return $this;
    }
    
    
    public function getPhoneticName()
    {
        return $this["virtualserver_name_phonetic"];
    }
    
    public function setPhoneticName($name)
    {
        $this["virtualserver_name_phonetic"] = $name;
        return $this;
    }
    
    
    public function getIconID()
    {
        return $this["virtualserver_icon_id"];
    }
    
    public function setIconID($id)
    {
        $this["virtualserver_icon_id"] = $id;
        return $this;
    }
    
    
    public function getReservedSlots()
    {
        return $this["virtualserver_reserved_slots"];
    }
    
    public function setReservedSlots($slots)
    {
        $this["virtualserver_reserved_slots"] = $slots;
        return $this;
    }
    
    public function getSpeechPacketLoss()
    {
        return $this["virtualserver_total_packetloss_speech"];
    }
    
    public function setSpeechPacketLoss($loss)
    {
        $this["virtualserver_total_packetloss_speech"] = $loss;
        return $this;
    }
    
    
    public function getKeepalivePacketLoss()
    {
        return $this["virtualserver_total_packetloss_keepalive"];
    }
    
    public function setKeepalivePacketLoss($loss)
    {
        $this["virtualserver_total_packetloss_keepalive"] = $loss;
        return $this;
    }
    
    
    public function getControlPacketLoss()
    {
        return $this["virtualserver_total_packetloss_control"];
    }
    
    public function setControlPacketLoss($loss)
    {
        $this["virtualserver_total_packetloss_control"] = $loss;
        return $this;
    }
    
    
    public function getTotalPacketLoss()
    {
        return $this["virtualserver_total_packetloss_total"];
    }
    
    public function setTotalPacketLoss($loss)
    {
        $this["virtualserver_total_packetloss_total"] = $loss;
        return $this;
    }

    
    public function getAverageClientPing()
    {
        return $this["virtualserver_total_ping"];
    }
    
    public function setAverageClientPing($ping)
    {
        $this["virtualserver_total_ping"] = $ping;
        return $this;
    }
    
    
    public function getIp()
    {
        return $this["virtualserver_ip"];
    }
    
    public function setIp($ip)
    {
        $this["virtualserver_ip"] = $ip;
        return $this;
    }
    
    
    public function hasWebListEnabled()
    {
        return $this["virtualserver_weblist_enabled"];
    }
    
    public function setHasWebListEnabled($has)
    {
        $this["virtualserver_weblist_enabled"] = $has;
        return $this;
    }
    
    
    public function getCodecEncryptionMode()
    {
        return $this["virtualserver_codec_encryption_mode"];
    }
    
    public function setCodecEncryptionMode($encription)
    {
        $this["virtualserver_codec_encryption_mode"] = $encription;
        return $this;
    }
    
    
    public function getFileBase()
    {
        return $this["virtualserver_filebase"];
    }
    
    public function setFileBase($base)
    {
        $this["virtualserver_filebase"] = $base;
        return $this;
    }
    
    public function getData() {
        return $this->data;
    }
}

?>
