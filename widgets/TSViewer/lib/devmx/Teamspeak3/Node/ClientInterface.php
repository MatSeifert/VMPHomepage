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
 *
 * @author drak3
 */
interface ClientInterface extends NodeInterface
{
    

    
    const QUERY_CLIENT = 1;
    const REAL_CLIENT = 0;
    
    const ENDLESS_BAN = 0;
    const CHANNEL_DEFAULT = 0; //Move to default channel
    
    /**
     * Sends a private message to the client
     * @param $msg the message to send
     */
    public function sendMessage($msg);
    
    /**
     * Moves the client to a specific channel
     */
    public function move($toChannel=CHANNEL_DEFAULT);
    
    /**
     * Kicks the client from the channel
     */
    public function kickFromChannel();
    
    /**
     * Kicks the client from the server
     */
    public function kickFromServer();
    
    /**
     * Bans the client for an given interval
     * @param \DateInterval|int baninterval or bantime in seconds
     */
    public function ban($for);
    
    /**
     * Returns the ID of the client
     * @return int the id of the client
     */
    public function getId();
    
    /**
     * @param int $id the id of the client
     */
    public function setId($id);
    
    /**
     * @return string the nickname of the client
     */
    public function getNickname();
    
    /**
     * @param string $nick the nickname of the client
     */
    public function setNickname($nick);
    
    /**
     * @return \devmx\Teamspeak3\Version client version 
     */
    public function getVersion();
    
    /**
     * @param \devmx\Teamspeak3\Version $version client version
     */
    public function setVersion(\devmx\Teamspeak3\Version $version);
    
    /**
     * @return string client platform (e.g. Linux)
     */
    public function getPlatform();
    
    /**
     * @param string $platform client platform
     */
    public function setPlatform($platform);
    
    /**
     *  @return boolean if input is muted or not
     */
    public function inputIsMuted();
    
    /**
     * @param boolean $is if the input is muted or not
     */
    public function setInputIsMuted($is);
    
    /**
     * @return boolean if output is muted or not
     */
    public function outputIsMuted();
    
    /**
     * @param boolean $is if output is muted or not
     */
    public function setOutputIsMuted($is);
    
    
    /**
     * @return boolean true if client's inputhardware is enabled, false otherwise
     */    
    public function hasInputHardware();
    
    /**
     * @param boolean $has if client input device is enabled
     */
    public function setHasInputHardware($has);
    
    /**
     * @return boolean true if client's outputhardware is enabled, false otherwise
     */
    public function hasOutputHardware();
    
    /**
     * @param bpplean $has if clients inputdevice is enabled
     */
    public function setHasOutputHardware($has);
        
    /**
     * @return mixed the default channel of the client
     */
    public function getDefaultChannel();
    
    /**
     * @param mixed the default channel of the client
     */
    public function setDefaultChannel($chan);
    
    /**
     * @return string|null metadata of the client
     */
    public function getMetaData();
    
    /**
     * @param string $meta the metadata of the client
     */
    public function setMetaData($meta);
    
    /**
     * @return boolean if the client is recording
     */
    public function isRecording();
    
    /**
     * @param boolean $is if the client is recording or not
     */
    public function setIsRecording($is);
    
    /**
     * @return string|null the login name of the client
     */
    public function getLoginName();
    
    /**
     * @param string $loginName the login name of the client 
     */
    public function setLoginName($loginName);
    
    /**
     * @return int the database id of the client
     */
    public function getDatabaseId();
    
    /**
     * @param int $id the database id of the client
     */
    public function setDatabaseId($id);
    
    /**
     *  @return int the channelgroup id 
     */
    public function getChannelGroupId();
    
    /**
     * @param int $id the channelgroup ID
     */
    public function setChannelGroupId($id);
    
    /**
     * @return array of int, the servergroupids assigned to this client
     */
    public function getServergroups();
    
    /**
     * @param array of int 
     */
    public function setServerGroups(array $groups);
    
    /**
     * @return \DateTime the time of the clients first connection to the server
     */
    public function getCreationTime();
    
    /**
     * @param \DateTime $time the time the client connected the first time to the server
     */
    public function setCreationTime(\DateTime $time);
    
    /**
     * @return \DateTime the time of the last connection of the client
     */
    public function getLastConnected();
    
    /**
     * @param \DateTime $time the time the client connected last time
     */
    public function setLastConnected(\DateTime $time);
    
    /**
     * @return int number of connections
     */
    public function getTotalConnections();
    
    /**
     * @param int $cons set the number of total connections
     */
    public function setTotalConnections($cons);
    
    /**
     * @return boolean true if client is away, false if not
     */
    public function isAway();
    
    /**
     * @param boolean $is if the client is away or not
     */
    public function setIsAway($is);
    
    /**
     * @return string|null if the client is away, and has set the message, the message as string, null otherwise
     */
    public function getAwayMessage();
    
    /**
     * @param string $msg the away message of the user which is returned if he is away
     */
    public function setAwayMessage($msg);
    
    /**
     * @return int type of the query as defined in constants ClientInterface::Real_Client and ClientInterface::Query_Client
     */
    public function getType();
    
    /**
     * @param int $type type of the query as defined in constants ClientInterface::Real_Client and ClientInterface::Query_Client
     */
    public function setType($type);

    /**
     * @return boolean if the client has an avatar or not
     */
    public function hasAvatar();
    
    /**
     * @return string the id of the avatar
     */
    public function getAvatarID();
    
    /**
     * @param int $id the id of the avatar
     */
    public function setAvatarID($id);
    
    /**
     * @return int the clients talk power
     */
    public function getTalkPower();
    
    /**
     * @param int $talkPower the clients talk power
     */
    public function setTalkPower($talkPower);
    
    /**
     * @return boolean if the client is requesting talk power or not
     */
    public function requestsTalkPower();
    
    /**
     * @param boolean if the client is requesting talk power or not
     */
    public function setRequestsTalkPower($requests);
    
    /**
     * @return string message if set, else empty string
     */
    public function getTalkRequestMessage();
    
    /**
     * @param string $msg the talk request message if the client is requesting talkpower
     */
    public function setTalkRequestMessage($msg);
    
    /**
     * @return description of the client
     */
    public function getDescription();
    
    /**
     * @param string $description the description of the client
     */
    public function setDescription($description);
    
    /**
     * @return boolean if the client is talking at the moment
     */
    public function isTalker();
    
    /**
     * @param boolean $is if the client is talker or not
     */
    public function setIsTalker($is);
    
    /**
     * @return int number of bytes uploaded this month
     */
    public function getMonthBytesUploaded();
    
    /**
     * @param int $bytes number of bytes uploaded this month
     */
    public function setMonthBytesUploaded($bytes);


    /**
     * @return int the number of bytes downloaded this month
     */
    public function getMonthBytesDownloaded();
    
    /**
     * @param int $bytes the number of bytes downloaded this month
     */
    public function setMonthBytesDownloaded($bytes);
    
    /**
     * @return int the total number of bytes uploaded
     */
    public function getTotalBytesUploaded();
    
    /**
     * @param int $bytes total bytes uploaded
     */
    public function setTotalBytesUploaded($bytes);
    
    /**
     * @return int the total number of bytes downloaded
     */
    public function getTotalBytesDownloaded();
    
    /**
     * @param $bytes total bytes downloaded
     */
    public function setTotalBytesDownloaded($bytes);
    
    /**
     * @return boolean if the client is a priority speaker
     */
    public function isPrioritySpeaker();
    
    /**
     * @param boolean $is if the client is a priority speaker or not
     */
    public function setIsPrioritySpeaker($is);
    
    /**
     * @return string the phonetic nicname
     */
    public function getPhoneticNickname();
    
    /**
     * @param string $nick the phonetic nickname
     */
    public function setPhoneticNickname($nick);
    
    /**
     * @return int the clients serverquery view power
     */
    public function getNeededServerQueryViewPower();
    
    /**
     * @return string|null the clients default token
     */
    public function getDefaultToken();
    
    /**
     * @param string $token the clients default token
     */
    public function setDefaultToken($token);
    
    /**
     * @return int the iconid of the client
     */
    public function getIconId();
    
    /**
     * @param int $id the clients icon id
     */
    public function setIconId($id);
    
    /**
     * @return boolean if the client is channelcommander
     */
    public function isChannelCommander();
    
    /**
     * @param boolean $is if the client is channelcommander
     */
    public function setIsChannelCommander($is);
    
    /**
     * @return string the client country identifyer
     */
    public function getCountry();
    
    /**
     * @param string the clients country
     */
    public function setCountry($country);
    
    /**
     * @return int the inherited channel id
     */
    public function getChannelGroupInheritedChannelId();
    
    /**
     * @param int $id the inherited channel id
     */
    public function setChannelGroupInheritedChannelId($id);
    
    /**
     * @return string the base64 hash of the clients uid
     */
    public function getClientUID();
    
    /**
     * @param string $uid the clients uid as base64
     */
    public function setClientUID($uid);
    
    /**
     * @return int the number of bytes sent to filetransfer
     */
    public function getFiletransferBandwidthSent();
    
    /**
     * @param int %bandwith the bandwith sent to filetransfer
     */
    public function setFiletransferBandwidthSent($bandwidth);
    
    /**
     * @return int the number of bytes received from the filetransfer
     */
    public function getFiletransferBandwidthReceived();
    
    /**
     * @param int $bandwith the number of bytes received from the filetransfer
     */
    public function setFileTransferBandwidthReceived($bandwidth);
    
    /**
     * @return int total number of packets sent
     */
    public function getPacketsSentTotal();
    
    /**
     * @param int $packets number of packets sent
     */
    public function setPacketsSentTotal($packets);
    
    /**
     * @return int total number of bytes sent
     */
    public function getBytesSentTotal();
    
    /**
     * @param int $bytes number of bytes sent total
     */
    public function setBytesSentTotal($bytes);
    
    /**
     * @return int total number of packets received
     */
    public function getPacketsReceivedTotal();
    
    /**
     * @param int $packets number of packets received
     */
    public function setPacketsReceivedTotal($packets);
    
    /**
     * @return int number of bytes received
     */
    public function getBytesReceivedTotal();
    
    /**
     * @param int $bytes number of bytes received 
     */
    public function setBytesReceivedTotal($bytes);
    
    /**
     * @return int total bandwith sent last second
     */
    public function getBandwidthSentLastSecondTotal();
    
    /**
     * @param int $bandwidth bandwith sent last second
     */
    public function setBandwidthSentLastSecondTotal($bandwidth);
    
    /**
     * @return int total bandwith sent last minute
     */
    public function getBandwidthSentlastMinuteTotal();
    
    /**
     * @param $bandwith sent last minute
     */
    public function setBandwidthSentLastMinuteTotal($bandwidth);
    
    /**
     * @return int bandwith sent received last second
     */
    public function getBandwidthReceivedLastSecondTotal();
    
    /**
     * @param int $bandwidth received last second
     */
    public function setBandwidthReceivedLastSecondTotal($bandwidth);
    
    /**
     * @return int $bandwith received last minute total
     */
    public function getBandwidthReceivedLastMinuteTotal();
    
    /**
     * @param int $bandwith bandwith received last minute
     */
    public function setBandwidthReceivedLastMinuteTotal($bandwidth);
    
    /**
     * @return \DateInterval time since connection to the server
     */
    public function getConnectedTime();
    
    /**
     * @param \DateInterval $time time since connection to the server
     */
    public function setConnectedTime(\DateInterval $time);
    
    /**
     * @return the clients ip
     */
    public function getClientIp();
    
    /**
     * @param string $ip the ip of the client
     */
    public function setClientIp($ip);
    
}

?>

