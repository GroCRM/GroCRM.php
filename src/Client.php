<?php

namespace GroCRM;

use GuzzleHttp\HandlerStack;
use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Middleware;

use GroCRM\API\Company;
use GroCRM\API\Contacts;
use GroCRM\API\Deals;
use GroCRM\API\Inventory;
use GroCRM\API\Tasks;
use GroCRM\API\Users;
use GroCRM\API\RateLimit;
use GroCRM\API\Globals;

class Client {
    
    private $lastResponse;    
    
    private $guzzleClient;
    
    private $token;
        
    public function __construct($token) {
        
        $this->token = $token;
        
        $stack = HandlerStack::create();
        $stack->push(Middleware::mapResponse(function (ResponseInterface $response) {
	        $this->lastResponse = $response;
	        return $response;
        }));
        
        $this->guzzleClient = new GuzzleClient([
            'base_uri' => 'https://api.grocrm.com/v1/',
            'headers' => [
                'Authorization' => 'Token ' . $token
            ],
            'handler' => $stack
        ]);
        
    }   
    
    public function getHttpClient() {
        return $this->guzzleClient;
    }
    
    public function getLastResponse() {
	    return $this->lastResponse;
    }
    
    public function getRateLimit() {
	    $rateLimit = new RateLimit($this);
	    return $rateLimit->getLimit();
    }
        
    // API

    public function company() {
	    return new Company($this);
    }
       
    public function contacts() {
        return new Contacts($this);
    }
    
    public function deals() {
        return new Deals($this);
    }
    
    public function inventory() {
        return new Inventory($this);
    }
       
    public function tasks() {
        return new Tasks($this);
    }   
    
    public function users() {
        return new Users($this);
    }
    
    public function getCountries($id = null) {
	    $globals = new Globals($this);
	    return $globals->getCountries($id);
    }
    
    public function getTimezones($id = null) {
	    $globals = new Globals($this);
	    return $globals->getTimezones($id);
    }
    
    public function getCurrencies($id = null) {
	    $globals = new Globals($this);
	    return $globals->getCurrencies($id);
    }
}
