<?php
    
namespace GroCRM\API;

class Deals extends AbstractAPI {
	
	public function sources($id = null) {
		return $this->getOptionsRequest("deals/sources", $id);
	}
	
	public function stages($id = null) {
		return $this->getOptionsRequest("deals/stages", $id);
	}
	
	public function scores($id = null) {
		return $this->getOptionsRequest("deals/scores", $id);
	}
	
	public function create(array $fields) {
		return $this->postRequest("deals", $fields);
	}
	
	public function getAll($page = 1, $per_page = 20, $search = null, $sort = "date", $order = "desc") {
		return $this->getAllRequest("deals", $page, $per_page, $search, $sort, $order);        
    }
	
	public function get($id) {
		return $this->getRequest("deals/$id");
	}
	
	public function update($id, array $fields) {
		return $this->patchRequest("deals/$id", $fields);
	}
	
	public function delete($id) {
		return $this->deleteRequest("deals/$id");
	}
}