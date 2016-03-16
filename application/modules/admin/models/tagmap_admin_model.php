<?php
require_once APPPATH . 'models/tagmap_model.php';
class Tagmap_Admin_Model extends Tagmap_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert_batch($data) {
        if( empty($data) ) return 0;
        return $this->db->insert_batch( $this->get_table(), $data );
    }

    public function get_tagmap_by_fid($fid, $tag_module, $fid_module) {
    	$table = $this->get_table();
        $this->db->select('*');
        $this->db->where(array('fid' => $fid, 'tag_module' => $tag_module, 'fid_module' => $fid_module) );
        $query = $this->db->get($table);
        return $query->result_array();
    } 

    public function update($data, $filters = array()) {
    	foreach ($filters as $f => $fvalue) {
    		$this->db->where($f, $fvalue);
    	}
    	return $this->db->update($this->get_table(), $data);
    }

}