<?php
    
namespace GroCRM\API;

class Inventory extends AbstractAPI {
	
	public function types($id = null) {
		return $this->getOptionsRequest("inventory/types", $id);
	}
	
	public function create(array $fields) {
		return $this->postRequest("inventory", $fields);
	}
	
	public function getAll($page = 1, $per_page = 20, $search = "", $sort = "date", $order = "desc") {
		return $this->getAllRequest("inventory", $page, $per_page, $search, $sort, $order);        
    }
	
	public function get($id) {
		return $this->getRequest("inventory/$id");
	}
	
	public function update($id, array $fields) {
		return $this->patchRequest("inventory/$id", $fields);
	}
	
	public function delete($id) {
		return $this->deleteRequest("inventory/$id");
	}
}