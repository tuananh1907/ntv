<?php 
class Language_Model extends CI_Model {

	private $table = 'language';

    public function __construct() {
        parent::__construct();
        $this->load->database();  
    }
    
    public function get_table() {
        return $this->table;
    }

    public function list_all() {
        $this->db->order_by('language_default', 'DESC');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
    
    public function get_by_id($id) {
        if( empty($id) ) return array();
        $this->db->where('language_id', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function insert($data) {
        if( empty($data) ) return 0;
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($data) {
        if(empty($data) || empty($data['language_id'])) return 0;
        $this->db->where('language_id', $data['language_id']); 
        return $this->db->update($this->table, $data);
    }

    public function upsert($data) {
        if( empty($data) ) return;
        $result = $this->db->get_where( $this->table, array('language_id' => $data['language_id']) )
                           ->result();
        if( count($result) > 0 ) {
            return $this->update($data);
        }else {
            $this->insert($data);
            return $this->db->insert_id();
        }
    }
    
    public function default_language () {
        $this->db->select('language_id');
        $this->db->where('language_default', 1);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function delete() {
    	
    }
}