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
namespace devmx\Teamspeak3\Query;

/**
 *
 * @author drak3
 */
class ServerQuery implements \devmx\Teamspeak3\Query\Transport\TransportInterface
{
    
    /**
     * @varTransport\TransportInterface $transport 
     */
    protected $transport;
    
    protected $isLoggedIn = false;
    protected $loginName = '';
    protected $loginPass = '';
    protected $isOnVirtualServer = false;
    protected $virtualServerIdentifyer = Array();
    protected $registerCommands = Array();
    protected $channelID = 0;
    protected $virtualServerStatus = 'unknown';
    protected $virtualServerPort = 0;
    protected $virtualServerID = 0;
    protected $uniqueID = '';
    protected $nickname = '';
    protected $databaseID = 0;
    protected $uniqueVirtualServerID = '';
    protected $clientID = 0;

    public function __construct(Transport\TransportInterface $transport) {
        $this->transport = $transport;
    }
    
    /**
     *
     * @param string $name
     * @param array $args
     * @param array $options
     * @return \devmx\Teamspeak3\Query\CommandResponse
     */
    public function query($name, array $args=Array(), array $options=Array()) {
        return $this->sendCommand(new Command($name, $args, $options));
    }
    
    public function refreshWhoAmI() {
        $response = $this->transport->query("whoami");
        if(!$response->errorOccured()) {
            $this->loginName = $response['client_login_name'];
            $this->isLoggedIn = $this->loginName != '';
            if(!$this->isLoggedIn)
                $this->loginPass = '';
            $this->isOnVirtualServer =($response['virtualserver_port'] !== 0);
            if($this->isOnVirtualServer) {
                $this->virtualServerIdentifyer = Array('id'=>$response['virtualserver_id']);
            }
            $this->virtualServerID = $response['virtualserver_id'];
            $this->virtualServerPort = $response['virtualserver_port'];
            $this->uniqueVirtualServerID = $response['virtualserver_unique_identifyer'];
            $this->uniqueID = $response['client_unique_identifyer']; 
            $this->channelID = $response['client_channel_id'];
            $this->virtualServerStatus = $response['virtualserver_status'];
            $this->databaseID = $response['client_database_id'];
            $this->clientID = $response['client_id'];
            $this->nickname = $response['client_nickname'];
        }
        else {
            $response->toException();
        }
        return $this;
    }
    
    
    public function login($username, $pass) {
        $response = $this->transport->query("login", Array("client_login_name"=>$username, 'client_login_password'=>$pass));
        $response->toException();
        $this->isLoggedIn = TRUE;
        $this->loginName = $username;
        $this->loginPass = $pass;
        return $this;
    }
    
    public function logout() {
        $response = $this->transport->query('logout');
        $response->toException();
        $this->isLoggedIn = FALSE;
        $this->loginName = '';
        $this->loginPass = '';
        return $this;
    }
    
    public function useByPort($port,$virtual=TRUE) {
        $options = $virtual ? Array('virtual') : Array();
        $response = $this->transport->query("use", Array('port'=>$port), $options);
        $response->toException();
        $this->isOnVirtualServer = TRUE;
        $this->virtualServerIdentifyer = Array('port'=>$port);
        $this->virtualServerPort = $port;
        return $this;
    }
    
    public function useByID($id,$virtual=TRUE) {
        if($id < 1) {
            throw new \InvalidArgumentException("Invalid server ID, if you want to deselect the current server, please use deselect() instead");
        }
        $options = $virtual ? Array('virtual') : Array();
        $response = $this->transport->query("use", Array('sid'=>$id), $options);
        $response->toException();
        $this->isOnVirtualServer = TRUE;
        $this->virtualServerIdentifyer = Array('id'=>$id);
        $this->virtualServerID = $id;
        return $this;
    }
    
    protected function useVirtualServer($args, $virtual) {
       if(isset($args['id'])) {
            return $this->useByID($args['id'], $virtual); 
       }
       elseif(isset($args['port'])) {
            return $this->useByPort($args['port'], $virtual);
       }
    }
    
    public function deselect() {
        $response = $this->transport->query('use');
        $response->toException();
        $this->isOnVirtualServer = FALSE;
        $this->virtualServerIdentifyer = Array();
        return $this;
    }
    
    public function moveToChannel($cid) {
        if(!$this->isOnVirtualServer) {
            throw new \BadMethodCallException("cannot move to channel when not on virtual server");
        }
        $response = $this->transport->query('clientmove', Array('clid'=>$this->getClientID(), 'cid'=>$cid));
        $response->toException();
        $this->channelID = $cid;
    }
    
    public function registerForEvent($name, $cid=NULL) {
        $args = Array('event'=>$name);
        if($cid !== NULL) {
            $args['cid'] = $cid;
        }
        $command = new Command('servernotifyregister', $args);
        $response = $this->transport->sendCommand($command);
        if($response->errorOccured()) {
            throw new \RuntimeException("Cannot register for event $name");
        }
        else{
            $this->registerCommands[] = $command;
        }
        return $this;
    }
    
    public function unregisterEvents() {
        $response = $this->transport->query('servernotifyunregister');
        if(!$response->errorOccured()) {
            $this->registerCommands = Array();
        }
        else{
            throw new \RuntimeException("cannot unregister from events");
        }
        return $this;
    }
    
    public function quit() {
        $this->transport->disconnect();
    }
    
    public function __clone()
    {
        $this->transport = clone $transport;
        $this->recoverState();
    }

    public function __sleep()
    {
        $this->transport->disconnect();
        return array(
            'transport', 
            'isLoggedIn', 
            'loginName', 
            'loginPass', 
            'isOnVirtualServer', 
            'virtualServerIdentifyer', 
            'registerCommands', 
            'channelID', 
            'virtualServerStatus',
            'virtualServerID',
            'uniqueID',
            'nickname',
            'databaseID',
            'uniqueVirtualServerID',
            'clientID',
        );
    }
        
    public function __wakeup()
    {
            $this->recoverState();
    }
    
    protected  function recoverState() {
        if($this->isConnected()) {
            if($this->isLoggedIn) {
                $this->login($this->loginName, $this->loginPass);
            }
            if($this->isOnVirtualServer) {
                $this->useVirtualServer($this->virtualServerIdentifyer, true);
            }
            if($this->getChannelID() !== 0) {
                $this->moveToChannel($this->channelID);
            }
            foreach($this->registerCommands as $command) {
                $this->transport->sendCommand($command);
            }
        }        
    }
    
    public function isLoggedIn()
    {
        return $this->isLoggedIn;
    }

    public function getLoginName()
    {
        return $this->loginName;

    }

    public function getLoginPass()
    {
        return $this->loginPass;

    }

    public function isOnVirtualServer()
    {
        return $this->isOnVirtualServer;
    }
    
    public function getVirtualServerPort() {
        return $this->virtualServerPort;
    }
    
    public function getVirtualServerID() {
        return $this->virtualServerID;
    }

    public function getVirtualServerIdentifyer()
    {
        return $this->virtualServerIdentifyer;
    }

    public function getRegisterCommands()
    {
        return $this->registerCommands;
    }
    
    public function getChannelID()
    {
        return $this->channelID;
    }

    public function getVirtualServerStatus()
    {
        return $this->virtualServerStatus;

    }

    public function getUniqueID()
    {
        return $this->uniqueID;

    }

    public function getNickname()
    {
        return $this->nickname;

    }

    public function getDatabaseID()
    {
        return $this->databaseID;

    }

    public function getUniqueVirtualServerID()
    {
        return $this->uniqueVirtualServerID;
    }
    
    public function getClientID() {
        return $this->clientID;
    }
    
    public function hasRegisteredForEvents() {
        return $this->registerCommands != array();
    }

    
    public function connect()
    {
        $this->transport->connect();
    }

    public function disconnect()
    {
        $this->transport->disconnect();
    }

    public function getAllEvents()
    {
        if(!$this->hasRegisteredForEvents()) {
            throw new \LogicException("Cannot check for events when not registered for");
        }
        return $this->transport->getAllEvents();
    }

    public function isConnected()
    {
        return $this->transport->isConnected();
    }

    public function sendCommand( \devmx\Teamspeak3\Query\Command $command )
    {
        $args = $command->getParameters();
        if($command->getName() == 'use') {
            return $this->useVirtualServer($args, in_array('virtual', $command->getOptions()));
        }
        if($command->getName() == 'login') {
            if(isset($args['client_login_name']) && isset($args['client_login_password'])) {
                return $this->login($args['client_login_name'], $args['client_login_password']);
            }
        }
        if($command->getName() == 'logout') {
            return $this->logout();
        }
        if($command->getName() == 'servernotifyregister') {
            if(isset($args['event'])) {
                if(isset($args['id'])) {
                    return $this->registerForEvent($args['event'], $args['id']);
                }
                else {
                    return $this->registerForEvent($args['event']);
                }
            }
        }
        if($command->getName() == 'servernotifyunregister') {
            return $this->unregisterEvents();
        }
        if($command->getName() === 'whoami') {
            return $this->refreshWhoAmI();
        }
        return $this->transport->sendCommand($command);
    }


    public function waitForEvent()
    {
         if(!$this->hasRegisteredForEvents()) {
            throw new \LogicException("Cannot check for events when not registered for");
         }
         return $this->transport->waitForEvent();
    }
    
    public function getTransport() {
        return $this->transport;
    }

}

?>
