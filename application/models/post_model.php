<?php
class Post_Model extends CI_Model {
    
    private $table = 'post';
    
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
        $this->db->where('post_id', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }
    
}