<?php
require_once APPPATH . 'models/tag_model.php';
class Tag_Default_Model extends Tag_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_tag($tag_module, $language_id) {
        $this->db->from($this->get_table());
        $this->db->where(array('module' => $tag_module, 'language_id' => $language_id));
        $query = $this->db->get();
        return  $query->result_array();
    }

}