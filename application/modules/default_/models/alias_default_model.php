<?php 
require_once APPPATH . 'models/alias_model.php';
class Alias_Default_Model extends Alias_Model {
 
    public function __construct() {
        parent::__construct();
    }

    public function get_alias_by_language_and_name($lang, $alias_name) {
        $alias = $this->get_by_name($alias_name);
        if( count($alias) > 0 ) {
            $this->db->from($this->get_table());
            $this->db->where( array('langmap_id' => $alias['langmap_id'], 'language_id'=> $lang) );
            $query = $this->db->get();
            return (array)$query->row();
        }else {
            return array();
        }
    } 
    
}