<?php 
class Meta_Model extends CI_Model {

	private $table = 'meta';

    public function __construct() {
        parent::__construct();
        $this->load->database();  
    }
    
    public function get_table() {
        return $this->table;
    }
}