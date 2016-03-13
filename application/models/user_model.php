<?php
class User_Model extends CI_Model {
    
    private $table = 'user';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get_table() {
        return $this->table;
    }
    
    public function insert($data) {
        if( empty($data) ) return 0;
        $this->db->insert( $this->table, $data );
        return $this->db->insert_id();
    }
    
    public function get_by_id($id) {
        if( empty($id) ) return array();
        $this->db->where('user_id', $id);
        $query = $this->db->get($this->table);
        return (array)$query->row();
    }
    
    public function update($id, $data) {
        if( empty($id)) return false;
        $this->db->where('user_id', $id);
        return $this->db->update($this->table, $data);
    }
    
    public function delete($id) {
        if ( empty($id)) return false; 
        return $this->db->delete($this->table, array('user_id' => $id)); 
    } 
    
}