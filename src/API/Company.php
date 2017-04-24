<?php
    
namespace GroCRM\API;

class Company extends AbstractAPI {
	
	public function get() {
		return $this->getRequest("company");
	}
	
	public function update(array $fields) {
		return $this->patchRequest("company", $fields);
	}
}