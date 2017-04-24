<?php
    
namespace GroCRM\API;

use GroCRM\Client;

abstract class AbstractAPI {
    
    protected $client;
    
    public function __construct(Client $client) {
        
        $this->client = $client;
    } 
    
    protected function getRequest($path, array $query = []) {
        
        $response = $this->client->getHttpClient()->get($path, ['query' => $query]);
        $body = $response->getBody();
                
        return json_decode($body, true);
    }
    
    protected function getAllRequest($path, $page = 1, $per_page = 20, $search = null, $sort = "date", $order = "desc") {
	    $query = [
            "page" => $page,
            "per_page" => $per_page,
            "sort" => $sort,
            "order" => $order,
            "q" => $search,
        ];
        
        return $this->getRequest($path, $query);
    }
    
    protected function postRequest($path, array $fields = []) {
        
        $response = $this->client->getHttpClient()->post($path, ['json' => $fields]);
        $body = $response->getBody();
        
        return json_decode($body, true);
    }
    
    protected function patchRequest($path, array $fields) {
	    
	    $response = $this->client->getHttpClient()->patch($path, ['json' => $fields]);
	    $body = $response->getBody();
        
        return json_decode($body, true);
    }
    
    protected function deleteRequest($path) {
	    
	    $response = $this->client->getHttpClient()->delete($path);
	    $body = $response->getBody();
        
        return json_decode($body, true);
    }
    
    protected function getOptionsRequest($base_path, $id = null) {
		
		if (!is_null($id) && is_int($id)) {
		    $response = $this->client->getHttpClient()->get("$base_path/$id");
	    } else {
		    $response = $this->client->getHttpClient()->get($base_path);
	    }
	    
        $body = $response->getBody();
                
        return json_decode($body, true);
	}
}