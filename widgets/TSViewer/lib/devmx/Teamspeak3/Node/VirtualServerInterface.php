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
interface VirtualServerInterface
{
    const HOST_MESSAGE_MODE_LOG         = 1;
    const HOST_MESSAGE_MODE_MODAL       = 2;
    const HOST_MESSAGE_MODE_MODALQUIT   = 3; 
    
    const CODEC_CRYPT_INDIVIDUAL    = 0; //configure per channel
    const CODEC_CRYPT_DISABLED      = 1;  //globally disabled
    const CODEC_CRYPT_ENABLED       = 2;  //globally enabled

    
    public function createChannel($channelData);
    public function getChannelByID($id);
    public function findChannelsByName($name);
    public function findChannels($predicate); 
    
    public function getClients($predicate=NULL);
    public function getClientById($id);
    public function getClientByDBID($id);
    public function findClients($predicate);
    public function createClient($data);
    
    public function sendMessage($msg);
    
    public function addToken($token);
    public function getTokens();
    
    public function getName();
    public function setName($name);
    public function getWelcomeMessage();
    public function setWelcomeMessage();
    public function getMaximumClients();
    public function setMaximumClients();
    public function hasPassword();
    public function getPassword();
    public function setPassword($pass);
    public function getNumberOfClients();
    public function getNumberOfQueryClients();
    public function getNumberOfChannels();
    public function getDateOfCreation();
    public function setDateOfCreation(\DateTime $creation);
    public function getUptime();
    public function setUptime(\DateInterval $uptime);
    public function getHostMessage();
    public function setHostMessage($msg);
    public function getHostMessageMode();
    public function setHostMessageMode($mode);
    public function getDefaultChannelGroup();
    public function setDefaultChannelGroup($group);
    public function getDefaultServerGroup();
    public function setDefaultServerGroup($group);
    public function getDefaultChannelAdminGroup();
    public function setDefaultChannelAdminGroup($group);
    public function getPlatform();
    public function setPlatform($platform);
    public function getVersion();
    public function setVersion(\devmx\Teamspeak3\Version $version);
    public function getMaximumDownloadBandwidth();
    public function setMaximumDownloadBandwidth();
    public function getMaximumUploadBandwidth();
    public function setMaximumUploadBandwidth();
    public function getHostBannerURL();
    public function setHostBannerURL($url);
    public function getHostBannerGFXURL();
    public function setHostBannerGFXURL($url);
    public function getHostBannerReloadInterval();
    public function setHostBannerReloadInterval(\DateInterval $interval);
    public function getComplainLimit();
    public function setComplainLimit($limit);
    public function getAutoBanTime();
    public function setAutoBanTime(\DateInterval $time);
    public function getComplainRemoveTime();
    public function setComplainRemoveTime(\DateInterval $time);
    public function getNumberOfClientsInChannelBeforeForcedSilence();
    public function setNumberOfClientsInChannelBeforeForcedSilence();
    public function getPrioritySpeakerDimmModificator();
    public function setPrioritySpeakerDimmModificatior($mod);
    public function getAntiFloodPointsReducedByTick();
    public function setAntiFloodPointsReducedByTick($points);
    public function getAntiFloodPointsNeededForWarning();
    public function setAntiFloodPointsNeededForWarning($points);
    public function getAntiFloodPointsNeededForBan();
    public function setAntiFloodPointsNeededForBan($points);
    public function getAutomaticBanTime();
    public function setAutomaticBanTime(\DateInterval $time);
    public function getClientConnections();
    public function setClientConnections($cons);
    public function getQueryClientConnections();
    public function setQueryClientConnections($cons);
    public function getHostButtonTooltipText();
    public function setHostButtonTooltipText($text);
    public function getHostButtonGFXURL();
    public function setHostButtonGFXURL($url);
    public function getHostButtonURL();
    public function setHostButtonURL($url);
    public function getDownloadQuota();
    public function setDownloadQuota($quota);
    public function getUploadQuota();
    public function setUploadQuota();
    public function getBytesUploadedThisMonth();
    public function setBytesUploadedThisMonth($bytes);
    public function getBytesDownloadedThisMonth();
    public function setBytesDownloadedThisMonth($bytes);
    public function getBytesDownloaded();
    public function setBytesDownloaded($bytes);
    public function getBytesUploaded($bytes);
    public function setBytesUploaded($bytes);
    public function getUniqueID();
    public function setUniqueID($id);
    public function getID();
    public function setID($id);
    public function getMachineID();
    public function setMachineID($id);
    public function getPort();
    public function setPort($port);
    public function isAutostarting();
    public function setIsAutostarting();
    public function getFileTransferBandwidthSent();
    public function setFileTransferBandwidthSent($bandwidth);
    public function getFileTransferBandwidthReceived();
    public function setFileTransferBandwidthReceived($bandwidth);
    public function getPacketsSent();
    public function setPacketsSent($packets);
    public function getBytesSent();
    public function setBytesSent($bytes);
    public function getBandwidthSentLastSecond();
    public function setBandwidthSentLastSecond($bandwidth);
    public function getBandwidthReceivedLastSecond();
    public function setBandwidthReceivedLastSecond($bandwidth);
    public function getBandwidthSentLastMinute();
    public function setBandwidthSentLastMinute($bandwidth);
    public function getBandwidthReceivedLastMinute();
    public function setBandwidthReceivedLastMinute($bandwidth);
    public function getStatus();
    public function setStatus($status);
    public function logsClientEvents();
    public function setLogsClientEvents($logs);
    public function logsQueryEvents();
    public function setLogsQueryEvents($logs);
    public function logsChannelEvents();
    public function setLogsChannelEvents();
    public function logsPermissionEvents();
    public function setLogsPermissionEvents($logs);
    public function logsServerEvents();
    public function setLogsServerEvents($logs);
    public function logsFileTransferEvents();
    public function setLogsFileTransferEvents();
    public function getMinimalClientVersion();
    public function setMinimalClientVersion(Version $version);
    public function getNeededSecurityLevel();
    public function setNeededSecurityLevel($level);
    public function getPhoneticName();
    public function setPhoneticName($name);
    public function getIconID();
    public function setIconID();
    public function getSpeechPacketLoss();
    public function setSpeechPacketLoss($loss);
    public function getKeepalivePacketLoss();
    public function setKeepalivePacketLoss($loss);
    public function getControlPacketLoss();
    public function setControlPacketLoss($loss);
    public function getAverageClientPing();
    public function setAverageClientPing($ping);
    public function getIp();
    public function setIp();
    public function hasWebListEnabled();
    public function setHasWebListEnabled($has);
    public function getCodecEncryptionMode();
    public function setCodecEncryptionMode();
    public function getFileBase();
    public function setFileBase($base);
    
}

?>
