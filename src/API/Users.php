<?php
    
namespace GroCRM\API;

class Users extends AbstractAPI {
	
	public function roles($id = null) {
		return $this->getOptionsRequest("users/roles", $id);
	}
		
	public function getAll($page = 1, $per_page = 20, $search = "", $sort = "date", $order = "desc") {
		return $this->getAllRequest("users", $page, $per_page, $search, $sort, $order);        
    }
	
	public function get($id) {
		return $this->getRequest("users/$id");
	}
	
	public function getAuthenticated() {
		return $this->getRequest("user");
	}
}