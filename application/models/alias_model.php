<?php
class Alias_Model extends CI_Model {
    
    private $table = 'alias';
    
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
    
    public function delete($id) {
        if( empty($id) ) return false;
        $this->db->where('alias_id', $id ); 
        return $this->db->delete( $this->table );
    }


    public function get_by_name($alias_name) {
        $this->db->from($this->table);
        $this->db->where( array('alias_name' => $alias_name) );
        $query = $this->db->get();
        return (array)$query->row();
    }
    
}