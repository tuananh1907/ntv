<?php 
require_once APPPATH . 'models/group_model.php';
class Group_Admin_Model extends Group_Model {
 
    public function __construct() {
        parent::__construct();
    }
    
    public function list_all_by_paging($select = array(), $filters = array(), $orders = array(), $from = 0, $to = 20, $keyword = '') {
    	if(count($select) > 0) {
    		 $this->db->select($select);
    	}
        
    	if(!empty($keyword)) {
    		 $this->db->like('group_name', $keyword);
    	}

    	$this->db->limit($to, $from);

    	foreach ($filters as $f => $fvalue) {
    		$this->db->where($f, $fvalue);
    	}

    	foreach ($orders as $key => $value) {
    		$this->db->order_by($key, $value);
    	}

    	$query = $this->db->get( $this->get_table() );

        return $query->result_array();
    }
    
    
    public function get_length( $filters = array() ) {
        foreach ($filters as $f => $fvalue) {
    		$this->db->where($f, $fvalue);
    	}
    	$this->db->from( $this->get_table() );
    	return $this->db->count_all_results();
    }
}