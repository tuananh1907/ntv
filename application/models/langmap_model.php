<?php
class Langmap_Model extends CI_Model {
    
    private $table = 'langmap';
    
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
    
    
    public function delete( $id ) {
        if( empty($id) ) return 0;
        $this->db->where('langmap_id', $id ); 
        return $this->db->delete( $this->get_table() );
    }
}