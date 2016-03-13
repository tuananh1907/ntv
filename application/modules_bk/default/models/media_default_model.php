<?php 
require_once APPPATH . 'models/media_model.php';
class Media_Default_Model extends Media_Model {
 
    public function __construct() {
        parent::__construct();
    }
    public function get_gallery($media_module, $language_id) {
    	$query = $this->db->get_where($this->get_table(), array('media_module' => $media_module, 'language_id' => $language_id));
    	$g = $query->result_array();
        if( count($g) > 0 ) {
            $l = $g[0]['media_file'];
            $b = json_decode(stripslashes($l), true);
            return $b;
        }
    	return array();        
    }   
    
}