<?php
namespace devmx\Teamspeak3\Query\Node;

/**
 * 
 * @author drak3
 */
class Channel extends \devmx\Teamspeak3\Channel
{
    protected $query;
    protected $data;
    protected $vServer;
    
    public function __construct(\devmx\Teamspeak3\Query\ServerQuery $query, array $data, VirtualServer $vServer) {
        if(!isset($data['cid'])) {
            throw new \InvalidArgumentException("Cannot create Channel without cid");
        }
        $this->query = $query;
        $this->data = $data;
        $this->vServer = $vServer;
    }
}

?>
