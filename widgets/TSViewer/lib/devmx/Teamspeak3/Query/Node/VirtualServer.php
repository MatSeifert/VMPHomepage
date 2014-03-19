<?php


namespace devmx\Teamspeak3\Query\Node;

/**
 * 
 *
 * @author drak3
 */
class VirtualServer extends \devmx\Teamspeak3\VirtualServer
{
    
    const MESSAGE_TARGET_SERVER = 3;
    /**
     *
     * @var \devmx\Teamspeak3\Query\ServerQuery 
     */
    protected $query;
    
    /**
     *
     * @var array 
     */
    protected $data;
    
    /**
     *
     * @var array of \devmx\Teamspeak3\Query\ServerQuery 
     */
    protected $channels;
    
    /**
     *
     * @var array of \devmx\Teamspeak3\Query\Node\Client 
     */
    protected $clients;
    
    /**
     *
     * @var array of \devmx\Teamspeak3\Query\Node\ServerGroup 
     */
    protected $serverGroups;
    
    /**
     *
     * @var array of \devmx\Teamspeak3\Query\Node\Channelgroup 
     */
    protected $channelGroups;
    
    /**
     *
     * @var boolean 
     */
    protected $requestedChannelList = FALSE;
    
    /**
     *
     * @var array of string 
     */
    protected $bufferedValues;
    
    /**
     *
     * @var boolean 
     */
    protected $requestedVirtualServerInfo = FALSE;
    
    /**
     *
     * @var boolean 
     */
    protected $clonedQuery = FALSE;
    
    /**
     * Constructor
     * @param \devmx\Teamspeak3\Query\ServerQuery $query
     * @param array $data 
     */
    public function __construct(\devmx\Teamspeak3\Query\ServerQuery $query, array $data) {
        $this->query = $query;
        if(!(isset($data['sid']) || isset($data['port']) || isset($data['virtualserver_id']))) {
            throw new \InvalidArgumentException("Identifyer needed");
        }
        if(isset($data['sid'])) {
            $data['virtualserver_id'] = $data['sid'];
            unset($data['sid']);
        }
        $this->data = $data;
    }
    
    /**
     * Sends a message to the server
     * @param string $msg 
     */
    public function sendMessage($msg) {
        $this->query('sendtextmessage', Array(
                                                        'targetmode'=>self::MESSAGE_TARGET_SERVER,
                                                        'target'=> $this->getID(), 
                                                        'msg'=> $msg))->toException();
    }
    
    /**
     * Sends a message to all clients
     * @param string $msg 
     */
    public function sendGlobalMessage($msg) {
        $this->query('gm', Array('msg'=>$msg))->toException();
    }
    
    /**
     * Returns all clients currently on the server
     * @param callable $predicate takes a channel object as argument, if it returns true, channel is added to the return array
     * @param boolean $getAllData if this is set to true, all available data which can be gained by the channellist command is requested
     * @param boolean $getChannelList if this is set to false, just currently loaded channels are returned
     * @return array of \devmx\Teamspeak3\Query\Node\Client
     */
    public function getChannels($predicate=NULL, $getAllData=FALSE, $getChannelList=TRUE) {
        if($getChannelList) {
            $this->getChannelList($getAllData);
        }
        if(  is_callable( $predicate) ) {
             return $this->filter($predicate,$this->channels);
        }
        return $this->getChannels;
    }
    
    /**
     *
     * @param type $getAllData
     * @param type $getChannelList
     * @return type 
     */
    public function getTopLevelChannels($getAllData=FALSE, $getChannelList=TRUE) {
        return $this->getChannels(function($channel) {
            return $channel->getParentID() === 0;
        });
    }
    
    /**
     * Filters an array
     * @param predicate $predicate
     * @param array $list
     * @return array 
     */
    protected function filter($predicate,$list) {
        $ret = Array();
        foreach($list as $item) {
            if($predicate($item)) {
                $ret[] = $item;
            }
        }
        return $ret;
    }
    
    /**
     * Gets information about channel on the server
     * @param boolean $getAllData 
     */
    protected function getChannelList($getAllData) {
        $options = Array();
        if($getAllData) {
            $options = Array('topic', 'flags', 'voice', 'limits', 'icon');
        }
        $channellist = $this->query('channellist',Array(),$options);
        foreach($channellist->getItems() as $channel) {
                $this->addChannel($channel);
        }
    }
    
    /**
     * Creates a channel with the given data
     * @param \devmx\Teamspeak3\Channel|string $data if a channel object is passed, a channel is created based on this object,
     * if a string is passed, this string is used as name of the new channel
     * @return \devmx\Teamspeak3\Query\Node\Channel 
     */
    public function createChannel( $data )
    {
        if($data instanceof \devmx\Teamspeak3\Channel) {
            return $this->createChannelWithData($data);
        }
        elseif(is_string($data)) {
            return $this->createSimpleChannel($data);
        }
        else {
            throw new \InvalidArgumentException('Cannot create channel with given data');
        }
    }
    
    protected function createSimpleChannel($name) {
        $response = $this->query('channelcreate', Array('channel_name' => $name, ));
        $response->toException();
        return $this->addChannel($response->getItems());
    }
    
    protected function createChannelWithData(\devmx\Teamspeak3\Channel $channel) {
        $data = $channel->getData();
        $response = $this->query->query('channelcreate',$data);
        $response->toException();
        return $this->addChannel($response->getItems());
    }
    
    protected function addChannel($data) {
        if(!isset($data['cid'])) {
            throw new \InvalidArgumentException("Cannot add channel without ID");
        }
        $this->channels[$data['cid']] = new Channel($this->query, $data, $this);
    }
    
    public function getChannelByID($id, $getAllData=FALSE, $getChannelList=TRUE) {
        if(isset($this->channels[$id])) {
            return $this->channels[$id];
        }
        elseif($getChannelList) {
            $channels = $this->getChannels(function($channel) use ($id) {
                return $channel->getID() == $id;
            }, $getAllData , $getChannelList);
            if($channels !== Array()) {
                return $channels[0];
            }
        }
        throw new \RuntimeException("There is no channel with ID $id");
    }
    
    
    public function getClients($predicate=NULL,$requestAllData=FALSE) {
        if(!$this->requestedClientList) {
            $this->getClientList($requestAllData); 
        }
        if(is_callable($predicate)) {
            return $this->filter($predicate, $this->clients);
        }
        return $this->clients;
    }
    
    public function getClientById( $id )
    {
        return $this->getClients(function($client) use ($id) {
            return $client->getID() == $id;
        });
    }
    
    public function getClientByDBID( $id )
    {
        return $this->getClients(function($client) use ($id) {
            return $client->getDBID() == $id;
        });
    }
    
    protected function getClientList($requestAllData) {
        $options = Array();
        if($requestAllData) {
            $options = Array('uid','away','voice','times','groups','info','icon','country');
        }
        $response = $this->query('clientlist', Array(), $options);
        $response->toException();
        foreach($response->getItems() as $client) {
            $this->clients[$client['cid']] = new Client($this->query, $client);
        }
    }
    
    /**
     * @todo create from class
     * @param ServerGroupInterface|String $identifyer 
     */
    public function createServerGroup( $identifyer , $type=\devmx\Teamspeak3\ServerGroup::TYPE_REGULAR)
    {
        if($identifyer instanceof \devmx\Teamspeak3\Node\ServerGroupInterface) {
            throw new \LogicException('currently this feature is not implemented');
            return $this->createServerGroupFromClass($identifyer,$type);
        }
        else {
            return $this->createServerGroupFromName($identifyer,$type);
        }
    }
    
    protected function createServerGroupFromName($name,$type) {
        $data = $this->query('servergroupadd', Array('name'=>$name, 'type'=>$type));
        $this->serverGroups[] = new ServerGroup($data['sgid']);
    }
    
    /**
     *
     * @param string $command
     * @param array $params
     * @param array $options
     * @return \devmx\Teamspeak3\Query\CommandResponse 
     */
    public function query($command, array $params=Array(), array $options = Array()) {
        $this->switchQueryToServer();
        return $this->query->query($command, $params, $options);
    }
    
    public function registerForEvents() {
        $this->switchQueryToServer();
        $this->query->registerForEvent('server');
        return $this;
    }
    
    public function registerForChatEvents() {
        $this->switchQueryToServer();
        $this->query->registerForEvent('textserver');
        return $this;
    }
    
    public function registerForAllEvents() {
        $this->registerForEvents();
        $this->registerForChatEvents();
        return $this;
    }
    
    public function waitForEvent() {
        return $this->query->waitForEvent();
    }
    
    public function getAllEvents() {
        return $this->query->getAllEvents();
    }
    
    public function start() {
        $this->query('serverstart', Array('sid'=>$this->getID()))->toException();
    }
    
    public function stop() {
        $this->query('serverstop', Array('sid'=>$this->getID()))->toException();
    }
    
    public function createQueryOnServer($force=FALSE) {
        if(!$this->clonedQuery || $force) {
            $this->query = clone $this->query;
            $this->switchQueryToServer();
            $this->clonedQuery = TRUE;
        }
    }
    
    public function switchQueryToServer($force=FALSE) {
        $changeNeeded = TRUE;
        if($this->query->isOnVirtualServer()) {
            $ident = $this->query->getVirtualServerIdentifyer();
            if(isset($ident['sid']) && isset($this->data['virtualserver_id']) && $this->data['virtualserver_id'] == $ident['sid']) {
                $changeNeeded = FALSE;
            }
            if(isset($ident['port']) && isset($this->data['port']) && $this->data['port'] == $ident['port']) {
                $changeNeeded = FALSE;
            }
            if(isset($this->data['port']) && $this->query->getVirtualServerPort() == $this->data['port']) {
                $changeNeeded = FALSE;
            }
            if(isset($this->data['virtualserver_id']) && $this->query->getVirtualServerID() == $this->data['virtualserver_id']) {
                $changeNeeded = FALSE;
            }
        }
        if(($changeNeeded  && !$this->clonedQuery) || $force) {
            if(isset($this->data['virtualserver_id'])) {
                $this->query->query('use', Array('sid'=>$this->data['virtualserver_id']), Array('virtual'))->toException();
            }
            elseif(isset($this->data['port'])) {
                $this->query->query('use', Array('port'=>$this->data['port']),Array('virtual'))->toException();
            }
            else {
                throw new \RuntimeException("cannot switch to virtual server");
            }
        }
    }
    
    public function editBuffered() {
        $this->editBuffered = TRUE;
    }
    
    public function apply() {
        $this->editBuffered = FALSE;
        $this->query('serveredit', $this->bufferedValues)->toException();
        $this->bufferedValues = Array();
    }
    
    public function getValue($name) {
        if(isset($this->data[$name])) {
            return $this->data[$name];
        }
        else {
            if($this->requestedVirtualServerInfo) {
                throw new \RuntimeException("Cannot get property $name");
            }
            else {
                $this->requestVirtualServerInfo();
                return $this->getValue($name);
            }
        }
    }
    
    protected function requestVirtualServerInfo() {
        $resp = $this->query('serverinfo');
        $resp->toException;
        $this->data = $resp->getItems();
        $this->requestedVirtualServerInfo = TRUE;
    }
    
    public function setValue($name, $value) {
        if($this->editBuffered) {
            $this->bufferedValues[$name] = $value;
        }
        else {
            $response = $this->query('serveredit',Array($name=>$value));
            $response->toException();
        }
    }
    
    public function createClient($c) {
        throw new \LogicException('Cannot create a client on a real server');
    }
    
    
       
}

?>
