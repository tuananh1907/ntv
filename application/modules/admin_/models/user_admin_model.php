<?php
require_once APPPATH . 'models/user_model.php';
class User_Admin_Model extends User_Model {
 
    public function __construct() {
        parent::__construct();
    }
    
    public function list_all() {
        $query = $this->db->get($this->get_table());
        return $query->result_array();
    }
    
    public function login($username, $password) {
        $query = $this->db->get_where($this->get_table(), array('username' => $username, 'password' => $password, 'active'=> 1, 'user_builtin'=>1));
        $rs = (array)$query->row();
        return ( empty($rs) ) ? false : $rs;
    }

    public function validate ($old_password, $user_id) {
        $query = $this->db->get_where($this->get_table(), array('user_id' => $user_id, 'password' => $old_password));
        return $query->result_array();
    }
    
    public function list_all_by_paging($select = array(), $filters = array(), $orders = array(), $from = 0, $to = 20, $keyword = '') {
    	if(count($select) > 0) {
    		 $this->db->select($select);
    	}
        
    	if(!empty($keyword)) {
    		 $this->db->like('username', $keyword);
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