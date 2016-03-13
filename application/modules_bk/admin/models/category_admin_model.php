<?php 
require_once APPPATH . 'models/category_model.php';
class Category_Admin_Model extends Category_Model {
 
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * INSERT NEW CATEGORY
     * 
     */
    public function insert( $data ) {    
        //GET DATA
        $title = stripslashes(strip_tags( $data['title'] ));
        $content = stripslashes( $data['content'] );
        $seo_title = stripslashes(strip_tags( $data['seo_title'] ));
        $seo_keywords = stripslashes(strip_tags( $data['seo_keywords'] ));
        $seo_description = stripslashes(strip_tags( $data['seo_description'] ));
        $level = '';
        $link = '/' . $data['alias'];
        
        //GET LEVEL
        if( $data['parent_id'] > 0 ) {
            $parent = $this->get_by_id($data['parent_id']);
            $level  = $parent->category_level . '--';
            //$link   = $parent->category_link . $link;
        }
        
        //PREPARE DATA
        $agrs = array(
            'category_title' => $title,         
            'category_content' => $content,       
            'category_order'  => intval( $data['order'] ), 
            'category_status' => intval( $data['status'] ), 
            'category_datecreated' => date( 'Y-m-d H:i:s' ),
            'category_module' => $data['module'],    
            'category_seo_title' => ( empty($seo_title) ) ? $title : $seo_title,
            'category_seo_keywords' => $seo_keywords,
            'category_seo_description' => $seo_description,
            'catparent_id' => intval( $data['parent_id'] ),
            'language_id' => $data['language_id'],            
            'category_level' => $level,          
            'langmap_id' => $data['langmap_id'],            
            'category_lock'  => (empty( $title )) ? 1 : 0,
            'category_link'  => $link
        );
        $this->db->insert( $this->get_table(), $agrs );
        
        return $this->db->insert_id();
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
    		 $this->db->like('category_title', $keyword);
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
     * GET CATEGORY BY LANGMAP ID
     * 
     */
    public function get_by_langmap_id( $langmap_id ) {
        if( empty($langmap_id) ) return array();
        $table  = $this->get_table();
        $this->db->join('alias', "alias.fid = $table.category_id");
        $this->db->where('alias.langmap_id', $langmap_id);
        $query = $this->db->get($table);
        return $query->result_array();
    }
    
    
    
    /**
     * UPDATE ALL ROWS WITH A SAME LANGMAP ID
     * 
     */
    public function update_by_langmap_id( $data, $langmap_id ) {
        if( empty($data) || empty($langmap_id) ) return 0;
        $this->db->where('langmap_id', $langmap_id ); 
        $r =  $this->db->update( $this->get_table(), $data );
        return $r;
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
    
    
    
    /**
     * INSERT NEW CATEGORY
     * 
     */
    public function update( $data ) {
        //GET DATA
        $title = stripslashes(strip_tags( $data['title'] ));
        $content = stripslashes( $data['content'] );
        $seo_title = stripslashes(strip_tags( $data['seo_title'] ));
        $seo_keywords = stripslashes(strip_tags( $data['seo_keywords'] ));
        $seo_description = stripslashes(strip_tags( $data['seo_description'] ));
        $level = '';
        $link = '/' . $data['alias'];
        
        //GET LEVEL
        if( $data['parent_id'] > 0 ) {
            $parent = $this->get_by_id($data['parent_id']);
            $level  = $parent->category_level . '--';
            //$link   = $parent->category_link . $link;
        }
        
        //PREPARE DATA
        $agrs = array(
            'category_title' => $title,         
            'category_content' => $content,       
            'category_order'  => intval( $data['order'] ), 
            'category_status' => intval( $data['status'] ), 
            'category_datecreated' => date( 'Y-m-d H:i:s' ),   
            'category_seo_title' => ( empty($seo_title) ) ? $title : $seo_title,
            'category_seo_keywords' => $seo_keywords,
            'category_seo_description' => $seo_description,
            'catparent_id' => intval( $data['parent_id'] ),           
            'category_level' => $level,               
            'category_lock'  => (empty( $title )) ? 1 : 0,
            'category_link'  => $link
        );
        $r = $this->db->update( $this->get_table(), $agrs,  array('category_id' => $data['id']) );
        
        
        
        return $r;
    }
    
    
}