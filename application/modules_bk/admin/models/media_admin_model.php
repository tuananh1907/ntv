<?php 
require_once APPPATH . 'models/media_model.php';
class Media_Admin_Model extends Media_Model {
 
    public function __construct() {
        parent::__construct();
    }
    
    
    /**
     * UPDATE BY WHERE
     * 
     */
    public function update($where, $data) {
        foreach ($where as $f => $fvalue) {
    		$this->db->where($f, $fvalue);
    	}
        return $this->db->update($this->get_table(), $data); 
    }
}