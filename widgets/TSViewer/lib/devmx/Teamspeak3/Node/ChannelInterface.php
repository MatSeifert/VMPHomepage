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
interface ChannelInterface extends NodeInterface
{

    // speex narrowband (mono, 16bit, 8kHz)
    const CODEC_SPEEX_NARROWBAND = 0;
    
    // speex wideband (mono, 16bit, 16kHz)
    const CODEC_SPEEX_WIDEBAND = 1;
    
    // speex ultra-wideband (mono, 16bit, 32kHz)
    const CODEC_SPEEX_ULTRAWIDEBAND = 2;
    
    // celt mono (mono, 16bit, 48kHz)
    const CODEC_CELT_MONO = 3;
    
    /**
     * Get all clients of this 
     * @param callable $predicate the predicate is called with each client, 
     * if the predicate returns true, the client is added to the return array
     * @return array of devmx\Teamspeak3\Node\ClientInterface
     */
    public function getClients($predicate=NULL);
    
    public function findClients($predicate);
    
    /**
     * creates a channel below this channel
     * @param string|\devmx\Teamspeak3\Node\ChannelInterface 
     * if just a name is provided, channel with this name will be created, if additional data via the ChannelInterface is given, this data is apllied in the same command
     */
    public function createChannel($data);
    
     /**
     * creates a channel as a subchannel of this channel
     * @param string|\devmx\Teamspeak3\Node\ChannelInterface 
     * if just a name is provided, channel with this name will be created, if additional data via the ChannelInterface is given, this data is apllied in the same command
     */
    public function createSubChannel($data);
    
    /**
     * Moves the  to the given parent
     * @param int|ChannelInterface $toParent the parent of the  (0 for top)
     * @param int|ChannelInterface $below   the channel under which this channel is sorted in 
     */
    public function move($toParent=0, $below=NULL);
    
    public function moveUnder($channel);
    
    /**
     * Sends a message to the 
     */
    public function sendMessage($msg);
    
    /**
     * @since 1.0
     * @return  name 
     */
    public function getName();

    /**
     * @since 1.0
     * @param string $Name  name 
     */
    public function setName($Name);

    
    /**
     * @since 1.0
     * @return  Topic 
     */
    public function getTopic();

    /**
     * @since 1.0
     * @param string $Topic  topic 
     */
    public function setTopic($Topic);

    
    /**
     * @since 1.0
     * @return string  description 
     */
    public function getDescription();

    /**
     * @since 1.0
     * @param string $Description  description 
     */
    public function setDescription($Description);

    
    /**
     * @since 1.0
     * @return  password 
     */
    public function getPassword();

    /**
     * @since 1.0
     * @param string $Password  password 
     */
    public function setPassword($Password);

    
    /**
     * @since 1.0
     * @return bool If the  has a password 
     */
    public function hasPassword();

    /**
     * @since 1.0 
     * @param bool $hasPassword If the  has a password
     */
    public function setHasPassword($hasPassword);

    
    /**
     * @since 1.0
     * @return int  codec 
     */
    public function getCodec();

    /**
     * @since 1.0
     * @param int $Codec  codec 
     */
    public function setCodec($Codec);

    
    /**
     * @since 1.0
     * @return int  codec quality 
     */
    public function getCodecQuality();

    /**
     * @since 1.0
     * @param int $CodecQuality  codec quality 
     */
    public function setCodecQuality($CodecQuality);

    
    /**
     * @since 1.0
     * @return int Max clients in  
     */
    public function getMaxClients();

    /**
     * @since 1.0
     * @param int $maxClients Max clients in  
     */
    public function setMaxClients($maxClients);

    
    /**
     * @since 1.0
     * @return int Max clients in  family
     */
    public function getMaxFamilyClients();

    /**
     * @since 1.0
     * @param int $maxFamilyClients Max clients in  family 
     */
    public function setMaxFamilyClients($maxFamilyClients);

    
    /**
     * @since 1.0
     * @return int position of the  
     */
    public function getPosition();

    /**
     * @since 1.0
     * @param int $Position position of the  
     */
    public function setPosition($Position);

    
    /**
     * @since 1.0
     * @return bool If  is permanent 
     */
    public function isPermanent();

    /**
     * @since 1.0
     * @param bool $isPermanent If  is permanent 
     */
    public function setIsPermanent($isPermanent);

    
    /**
     * @since 1.0
     * @return bool If  is semi-permanent 
     */
    public function isSemiPermanent();

    /**
     * @since 1.0
     * @param bool $isSemiPermanent If  is semi-permanent 
     */
    public function setIsSemiPermanent($isSemiPermanent);

    
    /**
     * @since 1.0
     * @return bool If  is temporary 
     */
    public function isTemporary();

    /**
     * @since 1.0
     * @param bool $isTemporary If  is temporary 
     */
    public function setIsTemporary($isTemporary);

    
    /**
     * @since 1.0
     * @return bool If  is default one 
     */
    public function isDefault();

    /**
     * @since 1.0
     * @param bool $isDefault If  is default one 
     */
    public function setIsDefault($isDefault);

    
    /**
     * @since 1.0
     * @return bool If  has a max clients limit 
     */
    public function getHasMaxClientsLimit();

    /**
     * @since 1.0
     * @param bool $hasMaxClientsLimit If  has a max clients limit 
     */
    public function setHasMaxClientsLimit($hasMaxClientsLimit);

    
    /**
     * @since 1.0
     * @return bool If  has a max family clients limit 
     */
    public function getHasMaxFamilyClientsLimit();

    /**
     * @since 1.0
     * @param bool $hasMaxFamilyClientsLimit If  has a max family clients limit 
     */
    public function setHasMaxFamilyClientsLimit($hasMaxFamilyClientsLimit);

    
    /**
     * @since 1.0
     * @return bool If the  inherits the max family clients from its parent  
     */
    public function isInheritingMaxFamilyClients();

    /**
     * @since 1.0
     * @param bool $isInteritingMaxFamilyClients If the  inherits the max family clients from its parent  
     */
    public function setIsInheritingMaxFamilyClients($isInheritingMaxFamilyClients);

    
    /**
     * @since 1.0
     * @return bool If a specific talkpower is needed to join the  
     */
    public function getNeededTalkPower();

    /**
     * @since 1.0
     * @param bool $neededTalkPower If a specific talkpower is needed to join the   
     */
    public function setNeededTalkPower($neededTalkPower);

    
    /**
     * @since 1.0
     * @return string Phonetic name of the  
     */
    public function getPhoneticName();

    /**
     * @since 1.0
     * @param string $phoneticName Phonetic name of the  
     */
    public function setPhoneticName($phoneticName);

    
    /**
     * @since 1.0
     * @return string Filepath 
     */
    public function getFilepath();
    
    /**
     * @since 1.0
     * @param string $filepath Filepath 
     */
    public function setFilepath($filepath);

    
    /**
     * @since 1.0
     * @return bool If the  is silenced
     */
    public function isSilenced();

    /**
     * @since 1.0
     * @param bool $isSilenced If the  is silenced 
     */
    public function setIsSilenced($isSilenced);

    
    /**
     * @since 1.0
     * @return int Icon-Id 
     */
    public function getIconId();

    /**
     * @since 1.0
     * @param int $iconId Icon-Id 
     */
    public function setIconId($iconId);

    
    /**
     * @since 1.0
     * @return bool If the speech data of the  is encrypted 
     */
    public function isSpeechDataUnencrypted();

    /**
     * @since 1.0
     * @param bool $isSpeechDataEncrypted If the speech data of the  is encrypted
     */
    public function setIsSpeechDataUnencrypted($isSpeechDataEncrypted);

    
    /**
     * @since 1.0
     * @return int Parent -Id 
     */
    public function getParentId();

    /**
     * @since 1.0
     * @param int $ParentId Parent -Id 
     */
    public function setParentId($ParentId);

    
    /**
     * @since 1.0
     * @return int -Id 
     */
    public function getId();

    /**
     * @since 1.0
     * @param int $Id -Id 
     */
    public function setId($Id);
}

?>
