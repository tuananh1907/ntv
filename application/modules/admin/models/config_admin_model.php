<?php 
require_once APPPATH . 'models/config_model.php';
class Config_Admin_Model extends Config_Model {
 
    public function __construct() {
        parent::__construct();
    }
    
    public function get_by_key($key) {
      $this->db->from($this->get_table());
      $this->db->where( array('field_name' => $key) );
      $query = $this->db->get();
      return (array)$query->row();
    }
}