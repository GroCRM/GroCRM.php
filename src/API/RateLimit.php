<?php
    
namespace GroCRM\API;

class RateLimit extends AbstractAPI {
	
	public function getLimit() {
		
		if (is_null($this->client->getLastResponse())) {
			return null;
		}
	
		$lastResponse = $this->client->getLastResponse();
		
		$limit = $lastResponse->getHeaderLine("X-RateLimit-Limit");
		$remaining = $lastResponse->getHeaderLine("X-RateLimit-Remaining");
		$reset = $lastResponse->getHeaderLine("X-RateLimit-Reset");
		
		$resetDate = \DateTime::createFromFormat('U', $reset, new \DateTimeZone("UTC"));
		
		return [
			"limit" => (int) $limit,
			"remaining" => (int) $remaining,
			"reset" => $resetDate
		];

	}
}