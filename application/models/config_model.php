<?php
class Config_Model extends CI_Model {
    
    private $table = 'config';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get_table() {
        return $this->table;
    }
    
    public function list_all() {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
    
    public function insert($data) {
        if( empty($data) ) return 0;
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($data) {
        if( empty($data) || empty($data['field_name']) ) return 0;
        $this->db->where('field_name', $data['field_name']); 
        return $this->db->update($this->table, $data);
    }

    public function upsert($data) {
        if( empty($data) ) return;
        $result = ( !empty($data['field_name']) ) ? $this->db->get_where( $this->table, array('field_name' => $data['field_name']) )
                           ->result() : array();
        if( count($result) > 0 ) {
            return $this->update($data);
        }else {
            $this->insert($data);
            return $this->db->insert_id();
        }
    }
    
}