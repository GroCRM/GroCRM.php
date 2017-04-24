<?php
    
namespace GroCRM\API;

class Contacts extends AbstractAPI {
    
    public function types($id = null) {
	    return $this->getOptionsRequest("contacts/types", $id);
    }
    
    public function create(array $fields) {
        return $this->postRequest("contacts", $fields);
    }
    
    public function getAll($page = 1, $per_page = 20, $search = null, $sort = "date", $order = "desc") {
		return $this->getAllRequest("contacts", $page, $per_page, $search, $sort, $order);        
    }
    
    public function get($id) {
	    return $this->getRequest("contacts/$id");
    }
     
    public function getAssociatedContacts($id, $page = 1, $per_page = 20, $search = null, $sort = "date", $order = "desc") {
	    return $this->getAllRequest("contacts/$id/associated_contacts", $page, $per_page, $search, $sort, $order); 
    }
    
    public function getAssociatedDeals($id, $page = 1, $per_page = 20, $search = null, $sort = "date", $order = "desc") {
	    return $this->getAllRequest("contacts/$id/associated_deals", $page, $per_page, $search, $sort, $order); 
    }
    
    public function getAssociatedTasks($id, $page = 1, $per_page = 20, $search = null, $sort = "date", $order = "desc") {
	    return $this->getAllRequest("contacts/$id/associated_tasks", $page, $per_page, $search, $sort, $order); 
    }
     
    public function update($id, array $fields) {
	    return $this->patchRequest("contacts/$id", $fields);
    }
    
    public function delete($id) {
	    return $this->deleteRequest("contacts/$id");
    } 
}