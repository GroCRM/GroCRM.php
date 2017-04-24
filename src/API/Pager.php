<?php
    
namespace GroCRM\API;

use GroCRM\Client;
use GroCRM\API\AbstractAPI;
use GuzzleHttp\Psr7\Response;

class Pager {
    
    private $client;
    
    private $lastResult;
    
    private $links;
    
	public function __construct(Client $client, array $data) {
		$this->client = $client;
		$this->lastResult = $data;
		$this->links = $this->getLinks();
	}
    
    public function getNext() {
        return $this->get("next");
    }
    
    public function getPrevious() {
        return $this->get("prev");
    }
    
    public function getFirst() {
        return $this->get("first");
    }
    
    public function getLast() {
        return $this->get("last");
    }

    
    public function hasNext() {
        return $this->hasKey("next");
    }
    
    public function hasPrevious() {
        return $this->hasKey("prev");
    }
    
    public function hasFirst() {
        return $this->hasKey("first");
    }
    
    public function hasLast() {
        return $this->hasKey("last");
    }
    
    private function get($key) {
        
        if (!$this->hasKey($key)) {
            return null;
        }
        
        $url = $this->links[$key];
        
        $response = $this->client->getHttpClient()->request("GET", $url);
        $body = $response->getBody();
        
        return json_decode($body, true);
    }
    
    private function getLinks() {
        
        if (!isset($this->lastResult["links"])) {
            return null;
        }
                
        return $this->lastResult["links"];
    }
    
    private function hasKey($key) {
        return !empty($this->links) && isset($this->links[$key]);
    }
}