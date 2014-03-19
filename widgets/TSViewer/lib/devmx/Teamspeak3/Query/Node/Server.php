<?php


namespace devmx\Teamspeak3\Query\Node;

use devmx\Teamspeak3\Query;
use devmx\Teamspeak3\Node;
use devmx\Teamspeak3\Query\Command;

/**
 * 
 *
 * @author drak3
 */
class Server extends \devmx\Teamspeak3\Server
{
    //error code when trying to delete server which is not stopped
    const ERROR_SERVER_NOT_STOPPED = 1035;
    
    
    
    /**
     *
     * @var \devmx\Teamspeak3\Query\ServerQuery
     */
    protected $query;
    
    /**
     *
     * @var Array of \devmx\Teamspeak3\Query\Node\VirtualServer
     */
    protected $virtualServers = Array();
    
    /**
     *
     * @var boolean
     */
    protected $stopped = FALSE;
    
    /**
     *
     * @var Array of String 
     */
    protected $bufferedValues = Array();
    
    
    /**
     *
     * @var boolean 
     */
    protected $requestedServerlist = FALSE;
    
    protected $version;
    
    /**
     * To construct a Server just a valid query is needed, it can be connected, but it is not recomended
     * @param Query\ServerQuery $query 
     */
    public function __construct(  Query\ServerQuery $query) {
        $this->query = $query;
        $this->init();
    }
    
    /**
     * connect if necesary
     */
    protected function init() {
        if(!$this->query->isConnected()) {
            $this->query->connect();
        }
    }
    
    public function  login($name,$pass) {
        $this->query->login($name, $pass);
        return $this;
    }
    
    public function getVersion() {
        if(isset($this->data['_version'])) {
            return $this->data['_version'];
        }
        $response = $this->query->query('version');
        $response->toException();
        $build = $response['build'];
        $this->data['_version'] = \devmx\Teamspeak3\Version::fromString($response['version']." [Build: $build]");
        return $this->data['_version'];
    }
    
    public function getBoundIps()
    {
        if(isset($this->data['_bound_ips'])) {
            return $this->data['_bound_ips'];
        }
        $resp = $this->query->query('bindinglist');
        $resp->toException();
        $this->data['_bound_ips'] = $resp['ip'];
        return $this->data['_bound_ips'];
    }
    
    /**
     * Clears all data, so it gets reloaded
     * @return \devmx\Teamspeak3\Query\Node\Server returns itself for allowing fluid interfaces
     */
    public function refresh() {
        $this->refreshData();
        $this->refreshVirtualServers();
        return $this;
    }
    
    /**
     * Refreshs the data of the server, and all nodes currently listed
     * Note, if you get a node, e.g. by getVirtualServerByPort(),
     * store a reference to it, then do refresh() on the server object, refreshDataDeep() won't affect your reference.
     * @return \devmx\Teamspeak3\Query\Node\Server returns itself for allowing fluid interfaces
     */
    public function refreshDataDeep() {
        $this->refreshData();
        foreach($this->virtualServers as $server) {
            $server->refreshDataDeep();
        }
       return $this;
    }
    
    /**
     * Refreshs all data
     * @return \devmx\Teamspeak3\Query\Node\Server returns itself for allowing fluid interfaces
     */
    public function refreshData() {
        $this->data = Array();
        return $this;
    }
    
    /**
     * Refreshes all virtual server
     * @return \devmx\Teamspeak3\Query\Node\Server returns itself for allowing fluid interfaces
     */
    public function refreshVirtualServers() {
        $this->virtualServers = Array();
        $this->requestedServerlist = FALSE;
        return $this;
    }
    
    /**
     * Checks if we requested a serverlist
     * @return boolean
     */
    protected function requestedServerList() {
        return $this->requestedServerlist || $this->virtualServers == Array();
    }
    
    /**
     * Turns instance into buffered mode, everything you change will be buffered and applied at once when calling apply()
     * @return \devmx\Teamspeak3\Query\Node\Server returns itself for allowing fluid interfaces
     */
    public function editBuffered() {
        $this->isBuffering = TRUE;
        return $this;
    }
    
    /**
     * Stops buffering mode and applies all changes made
     * @return \devmx\Teamspeak3\Query\Node\Server returns itself to allow fluid interfaces
     */
    public function apply() {
        if($this->isBuffering) {
            $this->isBuffering = FALSE;
            $response = $this->query->query('instanceedit', $this->bufferedValues);
            $response->toException();
            $this->bufferedValues = Array();
        }
        return $this;
    }
    
    /**
     * Sets a property of the virtual server to a given value
     * It is strongly recommended (but not necessary) to access this method over the appropriate setter methods provided
     * You can also access this method over the ArrayAccess Interface, 
     * so e.g $server['some_property'] = 'some_value' is equal to $server->setValue('some_property','some_value');
     * @param string $name
     * @param string $value 
     * @return \devmx\Teamspeak3\Query\Node\Server returns itself to allow fluid interfaces
     */
    public function setValue($name, $value) {
        if(substr($name,0,1) === '_') {
            throw new \InvalidArgumentException('You cannot set internal values');
        }
        if($this->isBuffering) {
            $this->bufferedValues[$name] = $value;
        }
        else {
            $response = $this->query->query('instanceedit', Array($name => $value));
            $response->toException();
        }
        return $this;
    }
    
    /**
     * Gets a property of the virtual server
     * It is strongly recommended (but not necessary) to access this method over the appropriate getter methods provided
     * You can also access this method over the ArrayAccess Interface, 
     * so e.g $value = $server['some_propert'] is equal to $value = $server->setValue('some_property');
     * @param string $name the name of the property to get
     * @return mixed the value of the requested property 
     */
    public function getValue($name) {
        if($name === '_version') {
            return $this->getVersion();
        }
        if($name === '_bound_ips') {
            return $this->getBoundIps();
        }
        if(isset($this->data[$name])) {
            return $this->data[$name];
        }
        if(substr($name,0,strlen('serverinstance')) == 'serverinstance') {
            $response = $this->query->query('instanceinfo');
        }
        else{
            $response = $this->query->query('hostinfo');
        }
        $response->toException();
        if(!isset($response[$name])) {
                throw new \RuntimeException(sprintf('Value %s not found',$name));
        }
        $this->data = array_merge($this->data, $response->getItems());
        return $response[$name];
    }
    
    /**
     * Creates a new virtual server 
     * @param \devmx\Teamspeak3\VirtualServer|Array|string $data 
     * If a VirtualServer instance is given, its data will be used to build up the vServer
     * If an Array is given, the key/value pairs will be interpreted as propertyname/value, and the server is build upon that
     * If an String is given, it is interpreted as the name of the virtual server
     * @return \devmx\Teamspeak3\VirtualServer 
     */
    public function createVirtualServer($data) {
       if($data instanceof \devmx\Teamspeak3\Server) {
           $response = $this->query->query('servercreate', $data->getData());
       }
       elseif(is_array($data)) {
           $response = $this->query->query('servercreate', $data);
       }
       elseif(is_string($data)) {
           $response = $this->query->query('servercreate', Array('virtualserver_name' => $data));
       }
       else {
           throw new \InvalidArgumentException("Cannot create virtual server because not enough information is given");
       }
       $response->toException();
       $id = $response['sid'];
       $this->virtualServers[$id] = new VirtualServer($this->query, Array('sid' => $id));
       return $this->virtualServers[$id];
    }
    
    /**
     * Deletes a virtual server
     * @param Int|VirtualServer $identifyer To identify the Server, either its id, or a object refering it
     * @param Boolean $stopIfFails This indicates if it is retried after stopping the server, defaults to FALSE
     * @return @return \devmx\Teamspeak3\Query\Node\Server returns itself to allow fluid interfaces
     */
    public function deleteVirtualServer($identifyer, $stopIfFails=FALSE) {
        $id = $this->resolveID($identifyer);
        $response = $this->query->query('serverdelete', Array('sid'=>$id));
        if($response->getErrorID() == self::ERROR_SERVER_NOT_STOPPED && $stopIfFails) {
            $this->getVirtualServerByID($id)->stop();
            return $this->deleteVirtualServer($id, FALSE);
        }
        $response->toException();
        if(isset($this->virtualServers[$id])) {
            $this->virtualServers[$id]->shutdown();
            unset($this->virtualServers[$id]);
        }
        return $this;
    }
    
    /**
     * Gets a virtual server specified by its port
     * Note that this is based on the use command and NOT on the serverlist command, it's just checked if we can go to the server
     * If you want to use serverlist as base command, use getVirtualServers(), or findVirtualServer() instead
     * @param int $port the port of the wanted vServer
     * @return VirtualServer 
     */
    public function getVirtualServerByPort($port) {
        foreach($this->virtualServers as $server) {
            if($server->getPort() == $port) {
                return $server;
            }
        }
        //test if we can switch to the server
        $this->query->useByPort($port);
        $server = new VirtualServer($this->query, Array('port'=>$port));
        $this->virtualServers[$server->getID()] = $server;
        return $server;
    }
    
    /**
     * Gets a virtual server specified by its ID
     * Note that this is based on the use command and NOT on the serverlist command, it's just checked if we can go to the server
     * If you want to use serverlist as base command, use getVirtualServers(), or findVirtualServer() instead
     * @param int $id the ID of the wanted vServer
     * @return \devmx\Teamspeak3\Query\Node\VirtualServer 
     */
    public function getVirtualServerByID($id){
        foreach($this->virtualServers as $server) {
            if($server->getID() == $id) {
                return $server;
            }
        }
        //test if we can switch to the server
        $response = $this->query->useByID($id);
        if($response->errorOccured()) {
            throw new \RuntimeException(sprintf('Server with ID %s does not exist or cannot be accessed',$id));
        }
        $server = new VirtualServer($this->query, Array('sid'=>$id));
        $this->virtualServers[$server->getID()] = $server;
        return $server;
    }
    
    /**
     * Returns the first virtual server which matches the predicate
     * Note that this method is based on the querycommand serverlist, if you want to get a vServer by his port or his id,
     * you should consider to use getVirtualServerByPort() and getVirtualServerByID() respectively
     * @param callable $predicate a function which takes a \devmx\Teamspeak3\Query\Node\VirtualServer and returns a boolean, true if it matches, false if not
     * @param boolean $getServerList if this is set to true, a new serverlist is requested if needed, if you just want to search among currently stored servers, set this to false. Defaults to TRUE
     * @param boolean $getAllData if this is set to true, more data is gathered. It seems that this option slows down this method around 1ms per vServer if setted to true. Defaults to FALSE.
     * @return \devmx\Teamspeak3\Query\Node\VirtualServer
     */
    public function findVirtualServer($predicate,$getServerList=TRUE,$getAllData=FALSE) {
        if(!$this->requestedServerlist && $getServerList) {
            $this->getServerList($getAllData);
        }
        foreach($this->virtualServers as $server) {
            if($predicate($server)) {
                return $server;
            }
        }
    }
    
    /**
     * Returns all virtual servere
     * Note that this method is based on the querycommand serverlist, if you want to get a vServer by his port or his id,
     * you should consider to use getVirtualServerByPort() and getVirtualServerByID() respectively
     * @param callable $predicate a function which takes a \devmx\Teamspeak3\Query\Node\VirtualServer and returns a boolean, true if it matches, false if not. If this is provided, the vServerlist is filtered by just returning vServers for which the predicate returns true. Not used by defautl.
     * @param boolean $getServerList if this is set to true, a new serverlist is requested if needed, if you just want to get currently stored servers, set this to false. Defaults to TRUE
     * @param boolean $getAllData if this is set to true, more data is gathered. It seems that this option slows down this method around 1ms per vServer if setted to true. Defaults to FALSE.
     * @return \devmx\Teamspeak3\Query\Node\VirtualServer
     */
    public function getVirtualServers($predicate=NULL,$getAllData=FALSE, $getServerList=TRUE) {
        if(!$this->requestedServerlist && $getServerList) {
            $this->getServerList($getAllData);
        }
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
    
    /**
     * Fills the virtualServers array with the results of the serverlist command
     * @param boolean $getAllData 
     */
    protected function getServerList($getAllData) {
        $options = $getAllData ? Array('all','uid') : Array('short');
        $list = $this->query->query('serverlist',Array(),$options);
        $list->toException();
        foreach($list->getItems() as $serverData) {
            $this->virtualServers[$serverData['virtualserver_id']] = new VirtualServer($this->query, $serverData);
        }
        $this->requestedServerlist = TRUE;
    }

    /**
     * Stops the whole instance
     * Because misuse of this function has very bad consequences, there's a param which defaults to false and has to be set to true to stop the server
     * @param boolean $imSure must be set to true, defaults to false
     */
    public function stop($imSure=FALSE) {
        if($imSure) {
            $this->query->query('serverprocessstop');
            $this->query->quit();     
        } 
        else {
            throw new \LogicException('You have to call the stop method with TRUE as parameter');
        }
    }
    
    /**
     * Resolves the id
     * @param VirtualServerInterface|Int $identifyer
     * @return int the id of the virtual server
     */
    protected function resolveID($identifyer) {
        if($identifyer instanceof Node\VirtualServerInterface) {
            return $identifyer->getID();
        }
        elseif(is_int($identifyer)) {
            return $identifyer;
        }
        else {
            throw new \InvalidArgumentException("Cannot resolve server");
        }
    }
    
    public function addLogEntry($entry, $level=self::LOG_LEVEL_INFO, $instanceOnly=FALSE) {
        if($instanceOnly && $this->query->isOnVirtualServer()) {
            $this->query->deselect();
        }
        $this->query->query('logadd', Array('logmsg'=>$entry,'loglevel'=>$level))->toException();
    }
    
    /**
     * @todo implement appropriate log class to return
     * @param int $lines
     * @param int $startPosition
     * @param boolean $reverse
     * @return \devmx\Teamspeak3\Query\CommandResponse 
     */
    public function getLogEntries($lines,$startPosition,$reverse=FALSE) {
        $resp = $this->query->query('logview',Array('lines'=>$lines,'instance'=>TRUE, 'begin_pos'=>$startPosition, 'reverse'=>$reverse));
        $resp->toException();
        return $resp;
    }
    
    /**
     * Quits
     */
    public function quit() {
        $this->query->quit();
        $this->virtualServers = Array();
        $this->data = Array();
    }
    
    /**
     * Destructor
     */
    public function __destruct() {
        $this->quit();
    }
    
   
}

?>
