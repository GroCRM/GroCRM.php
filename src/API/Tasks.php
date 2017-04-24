<?php
    
namespace GroCRM\API;

class Tasks extends AbstractAPI {
	
	public function statuses($id = null) {
		return $this->getOptionsRequest("tasks/statuses", $id);
	}
	
	public function priorities($id = null) {
		return $this->getOptionsRequest("tasks/priorities", $id);
	}
	
	public function scores($id = null) {
		return $this->getOptionsRequest("tasks/scores", $id);
	}
	
	public function create(array $fields) {
		return $this->postRequest("tasks", $fields);
	}
	
	public function getAll($page = 1, $per_page = 20, $search = "", $sort = "date", $order = "desc") {
		return $this->getAllRequest("tasks", $page, $per_page, $search, $sort, $order);        
    }
	
	public function get($id) {
		return $this->getRequest("tasks/$id");
	}
	
	public function update($id, array $fields) {
		return $this->patchRequest("tasks/$id", $fields);
	}
	
	public function delete($id) {
		return $this->deleteRequest("tasks/$id");
	}
}