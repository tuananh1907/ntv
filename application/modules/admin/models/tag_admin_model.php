<?php
require_once APPPATH . 'models/tag_model.php';
class Tag_Admin_Model extends Tag_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * GET TAG BY LANGMAP ID
     */

    public function get_tag_by_langmap_id($langmap_id) {
        if(empty($langmap_id)) return array();
        $table = $this->get_table();
        $this->db->select('*');
        $this->db->where(array('langmap_id' => $langmap_id) );
        $query = $this->db->get($table);
        return $query->result_array();
    }
}