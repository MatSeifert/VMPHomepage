<?php
namespace devmx\Teamspeak3;

/**
 * Channeldata
 * @author drak3
 */
class Channel implements devmx\Teamspeak3\Node\ChannelInterface
{
    
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
    public function getName() {
        return $this['channel_name'];
    }

    /**
     * @since 1.0
     * @param string $Name  name 
     */
    public function setName($name) {
        $this['channel_name'] = $name;
        return $this;
    }

    
    /**
     * @since 1.0
     * @return  Topic 
     */
    public function getTopic() {
        return $this['channel_topic'];
    }

    /**
     * @since 1.0
     * @param string $Topic  topic 
     */
    public function setTopic($topic) {
        $this['channel_topic'] = $topic;
        return $this;
    }

    
    /**
     * @since 1.0
     * @return string  description 
     */
    public function getDescription() {
        return $this['channel_description'];
    }

    /**
     * @since 1.0
     * @param string $Description  description 
     */
    public function setDescription($description) {
        $this['channel_description'] = $description;
        return $this;
    }

    
    /**
     * @since 1.0
     * @return  password 
     */
    public function getPassword() {
        return $this['channel_password'];
    }

    /**
     * @since 1.0
     * @param string $Password  password 
     */
    public function setPassword($password) {
        $this['channel_password'] = $password;
        return $this;
    }

    
    /**
     * @since 1.0
     * @return bool If the  has a password 
     */
    public function hasPassword() {
        return $this['channel_flag_password'] == 1;
    }

    /**
     * @since 1.0 
     * @param bool $hasPassword If the  has a password
     */
    public function setHasPassword($hasPassword) {
        $this['channel_flag_password'] = $hasPassword;
        return $this;
    }

    
    /**
     * @since 1.0
     * @return int  codec 
     */
    public function getCodec() {
        return $this['channel_codec'];
    }

    /**
     * @since 1.0
     * @param int $Codec  codec 
     */
    public function setCodec($codec) {
        $this['channel_codec'] = $coded;
        return $this;
    }

    
    /**
     * @since 1.0
     * @return int  codec quality 
     */
    public function getCodecQuality() {
        return $this['channel_codec_quality'];
    }

    /**
     * @since 1.0
     * @param int $CodecQuality  codec quality 
     */
    public function setCodecQuality($codecQuality) {
        $this['channel_codec_quality'] = $codecQuality;
        return $this;
    }

    
    /**
     * @since 1.0
     * @return int Max clients in  
     */
    public function getMaxClients() {
        return $this['channel_maxclients'];
    }

    /**
     * @since 1.0
     * @param int $maxClients Max clients in  
     */
    public function setMaxClients($maxClients) {
        $this['channel_maxclients'] = $maxClients;
        return $this;
    }

    
    /**
     * @since 1.0
     * @return int Max clients in  family
     */
    public function getMaxFamilyClients() {
        return $this['channel_maxfamilyclients'];
    }

    /**
     * @since 1.0
     * @param int $maxFamilyClients Max clients in  family 
     */
    public function setMaxFamilyClients($maxFamilyClients) {
        $this['channel_maxfamilyclients'] = $maxFamilyClients;
        return $this;
    }

    
    /**
     * @since 1.0
     * @return int position of the  
     */
    public function getPosition() {
        return $this['channel_order'];
    }

    /**
     * @since 1.0
     * @param int $Position position of the  
     */
    public function setPosition($position) {
        $this['channel_order'] = $position;
        return $this;
    }

    
    /**
     * @since 1.0
     * @return bool If  is permanent 
     */
    public function isPermanent() {
        return $this['channel_flag_permanent'] == 1;
    }

    /**
     * @since 1.0
     * @param bool $isPermanent If  is permanent 
     */
    public function setIsPermanent($isPermanent) {
        $this['channel_flag_permanent'] = $isPermanent;
        return $this;
    }

    
    /**
     * @since 1.0
     * @return bool If  is semi-permanent 
     */
    public function isSemiPermanent() {
        return $this['channel_flag_semi_permanent'] == 1;
    }

    /**
     * @since 1.0
     * @param bool $isSemiPermanent If  is semi-permanent 
     */
    public function setIsSemiPermanent($isSemiPermanent) {
        $this['channel_flag_semi_permanent'] == 1;
        return $this;
    }

    
    /**
     * @since 1.0
     * @return bool If  is temporary 
     */
    public function isTemporary() {
        return $this['channel_flag_temporary'] == 1;
    }

    /**
     * @since 1.0
     * @param bool $isTemporary If  is temporary 
     */
    public function setIsTemporary($isTemporary) {
        $this['channel_flag_temporary'] == $isTemporary;
    }

    
    /**
     * @since 1.0
     * @return bool If  is default one 
     */
    public function isDefault() {
        return $this['channel_flag_default'] == 1;
    }

    /**
     * @since 1.0
     * @param bool $isDefault If  is default one 
     */
    public function setIsDefault($isDefault) {
        $this['channel_flag_default'] = $isDefault;
        return $this;
    }

    
    /**
     * @since 1.0
     * @return bool If  has a max clients limit 
     */
    public function hasMaxClientsLimit() {
        return $this['channel_flag_maxclients_unlimited'] == 0;
    }

    /**
     * @since 1.0
     * @param bool $hasMaxClientsLimit If  has a max clients limit 
     */
    public function setHasMaxClientsLimit($hasMaxClientsLimit) {
        $this['channel_flag_maxclients_unlimited'] = !$hasMaxClientsLimit;
        return $this;
    }

    
    /**
     * @since 1.0
     * @return bool If  has a max family clients limit 
     */
    public function hasMaxFamilyClientsLimit() {
        return $this['channel_flag_maxfamilyclients_unlimited'] == 0;
    }

    /**
     * @since 1.0
     * @param bool $hasMaxFamilyClientsLimit If  has a max family clients limit 
     */
    public function setHasMaxFamilyClientsLimit($hasMaxFamilyClientsLimit) {
        $this['channel_flag_maxfamilyclients_unlimited'] = !$hasMaxFamilyClientsLimit;
        return $this;
    }

    
    /**
     * @since 1.0
     * @return bool If the  inherits the max family clients from its parent  
     */
    public function isInheritingMaxFamilyClients() {
        return $this['channel_flag_maxfamilyclients_inherited'] == 1;
    }

    /**
     * @since 1.0
     * @param bool $isInteritingMaxFamilyClients If the  inherits the max family clients from its parent  
     */
    public function setIsInheritingMaxFamilyClients($isInheritingMaxFamilyClients) {
            $this['channel_flag_maxfamilyclients_inherited'] = $isInheritingMaxFamilyClients;
            return $this;
    }

    
    /**
     * @since 1.0
     * @return bool If a specific talkpower is needed to join the  
     */
    public function getNeededTalkPower() {
        return $this['channel_needed_talk_power'];
    }

    /**
     * @since 1.0
     * @param bool $neededTalkPower If a specific talkpower is needed to join the   
     */
    public function setNeededTalkPower($neededTalkPower) {
        $this['channel_needed_talk_power'] = $neededTalkPower;
        return $this;
    }

    
    /**
     * @since 1.0
     * @return string Phonetic name of the  
     */
    public function getPhoneticName() {
        return $this['channel_name_phonetic'];
    }

    /**
     * @since 1.0
     * @param string $phoneticName Phonetic name of the  
     */
    public function setPhoneticName($phoneticName) {
        $this['channel_name_phonetic'] = $phoneticName;
    }

    
    /**
     * @since 1.0
     * @return string Filepath 
     */
    public function getFilepath() {
        return $this['channel_filepath'];
    }
    
    /**
     * @since 1.0
     * @param string $filepath Filepath 
     */
    public function setFilepath($filepath) {
        $this['channel_filepath'] = $filepath;
        return $this;
    }

    
    /**
     * @since 1.0
     * @return bool If the  is silenced
     */
    public function isSilenced() {
        return $this['channel_forced_silence'];
    }

    /**
     * @since 1.0
     * @param bool $isSilenced If the  is silenced 
     */
    public function setIsSilenced($isSilenced) {
        $this['channel_forced_silence'] = $isSilenced;
    }

    
    /**
     * @since 1.0
     * @return int Icon-Id 
     */
    public function getIconId() {
        return $this['channel_icon_id'];
    }

    /**
     * @since 1.0
     * @param int $iconId Icon-Id 
     */
    public function setIconId($iconId) {
        $this['channel_icon id'] = $iconId;
    }

    
    /**
     * @since 1.0
     * @return bool If the speech data of the  is unencrypted 
     */
    public function isSpeechDataUnencrypted() {
        return $this['channel_codec_is_unencrypted'];
    }

    /**
     * @since 1.0
     * @param bool $isSpeechDataEncrypted If the speech data of the  is encrypted
     */
    public function setIsSpeechDataUnencrypted($isSpeechDataUnencrypted) {
        $this['channel_codec_is_unencrypted'] = $isSpeechDataUnencrypted;
        return $this;
    }

    
    /**
     * @since 1.0
     * @return int Parent -Id 
     */
    public function getParentId() {
        return $this['cpid'];
    }

    /**
     * @since 1.0
     * @param int $ParentId Parent -Id 
     */
    public function setParentId($parentId) {
        $this['cpid'] = $parentId;
    }

    
    /**
     * @since 1.0
     * @return int -Id 
     */
    public function getId() {
        return $this['cid'];
    }

    /**
     * @since 1.0
     * @param int $Id -Id 
     */
    public function setId($Id) {
        $this['cid'] = $Id;
    }
    
    public function getData() {
        return $this->data;
    }
    
}

?>
