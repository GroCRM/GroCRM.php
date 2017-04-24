<?php
    
namespace GroCRM\API;

class Globals extends AbstractAPI {
	
	public function getCountries($id = null) {
	    
	    return $this->getOptionsRequest("countries", $id);
    }
    
    public function getTimezones($id = null) {
        
        return $this->getOptionsRequest("timezones", $id);
    }
    
    public function getCurrencies($id = null) {
        
        return $this->getOptionsRequest("currencies", $id);
    }	
}