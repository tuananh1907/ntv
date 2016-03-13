<?php 
require_once APPPATH . 'models/category_model.php';
class Category_Default_Model extends Category_Model {
 
    public function __construct() {
        parent::__construct();
    }

    public function get_category($category_module, $language_id) {
        $this->db->select('category.*, alias.alias_name');
   		$this->db->from($this->get_table());
   		$this->db->join('alias', 'alias.fid = category.category_id and alias.alias_module = category.category_module');
   		$this->db->where(array('alias.alias_module' => $category_module,'category.category_module' => $category_module, 'category.language_id' => $language_id, 'category_status' => 1)); 
   		$query = $this->db->get();
   		return  $query->result_array();
    }

    public function get_by_id($id) {
        if( empty($id) ) return array();
        $this->db->select('category.*, alias_name');
        $this->db->from($this->get_table());
        $this->db->where('category_id', $id);
        $this->db->join('alias', 'alias.fid = category.category_id', 'left');
        $query = $this->db->get();
        return $query->row();
    }
    
}