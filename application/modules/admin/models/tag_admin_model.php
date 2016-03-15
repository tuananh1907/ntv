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

    public function get_length( $filters = array() ) {
        foreach ($filters as $f => $fvalue) {
            $this->db->where($f, $fvalue);
        }
        $this->db->from( $this->get_table() );
        return $this->db->count_all_results();
    }

    /**
     * GET ALL CATEGORY BY PAGINATION
     *
     */
    public function list_all_by_paging($select = array(), $filters = array(), $orders = array(), $from = 0, $to = 20, $keyword = '') {
        if(count($select) > 0) {
            $this->db->select($select);
        }

        if(!empty($keyword)) {
            $this->db->like('title', $keyword);
        }

        $this->db->limit($to, $from);

        foreach ($filters as $f => $fvalue) {
            $this->db->where($f, $fvalue);
        }

        foreach ($orders as $key => $value) {
            $this->db->order_by($key, $value);
        }

        $query = $this->db->get( $this->get_table() );

        return $query->result_array();
    }


    /**
     * DELETE BY LANGMAP_ID
     *
     */
    public function delete_by_langmap_id( $langmap_id ) {
        if( empty($langmap_id) ) return 0;
        $this->db->where('langmap_id', $langmap_id );
        return $this->db->delete( $this->get_table() );
    }


    public function get_tag($tag_module, $language_id) {
        $this->db->from($this->get_table());
        $this->db->where(array('module' => $tag_module, 'language_id' => $language_id));
        $query = $this->db->get();
        return  $query->result_array();
    }

}