<?php 
class Module_Model extends CI_Model {

	private $table = 'module';

    public function __construct() {
        parent::__construct();
        $this->load->database();  
    }
    
    public function get_table() {
        return $this->table;
    }

    public function list_all( $select = array(), $filters = array(), $orders = array(), $keyword = '' ) {
        if(count($select) > 0) {
    		 $this->db->select($select);
    	}
    	
    	if(!empty($keyword)) {
    		 $this->db->like('module_name', $keyword);
    	}

    	foreach ($filters as $f => $fvalue) {
    		$this->db->where($f, $fvalue);
    	}

    	foreach ($orders as $key => $value) {
    		$this->db->order_by($key, $value);
    	}
    	
    	$query = $this->db->get( $this->get_table() );

        return $query->result_array();
    }

    public function get_by_id($id) {
        $this->db->where('module_id', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }
    
    public function get_by_code($code) {
        if( strlen($code) == 0 ) return array();
        $this->db->where('module_code', $code);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function insert($data) {
        if( empty($data) ) return 0;
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($data) {
        if( empty($data) || empty($data['module_id']) ) return 0;
        $this->db->where('module_id', $data['module_id']); 
        return $this->db->update($this->table, $data);
    }

    public function upsert($data) {
        if( empty($data) ) return;
        $result = ( !empty($data['module_id']) ) ? $this->db->get_where( $this->table, array('module_id' => $data['module_id']) )
                           ->result() : array();
        if( count($result) > 0 ) {
            return $this->update($data);
        }else {
            $this->insert($data);
            return $this->db->insert_id();
        }
    }
    
    public function update_rows($data, $key = 'module_id') {
        return $this->db->update_batch($this->table, $data, $key);
    }

    public function delete() {
    	
    }
}