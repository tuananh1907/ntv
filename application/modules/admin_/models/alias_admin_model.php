<?php 
require_once APPPATH . 'models/alias_model.php';
class Alias_Admin_Model extends Alias_Model {
 
    public function __construct() {
        parent::__construct();
    }
    
    public function insert( $fid, $data ) {
        $alias = $data['alias'];
        $row = $this->get_by_name($alias);
        if( count($row) > 0 && strcmp($alias, $old_alias) != 0 ) {
            $alias .= '-' . $fid . '-' . $data['langmap_id'];
        }
        $agrs = array(  
            'alias_name' => $alias,
            'alias_module' => $data['module'],
            'fid' => $fid,
            'language_id' => $data['language_id'],
            'langmap_id' => $data['langmap_id'] 
        );
        $this->db->insert( $this->get_table(), $agrs );
        return $this->db->insert_id();
    }
    
    public function update( $data ) {
        if( empty($data['alias']) ) return;
        $alias = $data['alias'];
        $old_alias = $data['old_alias'];
        $row = $this->get_by_name($alias);
        if( count($row) > 0 && strcmp($alias, $old_alias) != 0 ) {
            $alias .= '-' . $data['alias_id'];
        }
        $agrs = array(  
            'alias_name' =>  $alias
        );
        return $this->db->update( $this->get_table(), $agrs, array('alias_id' => $data['alias_id']) );
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
}