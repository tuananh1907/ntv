<?php 
require_once APPPATH . 'models/post_model.php';
class Post_Admin_Model extends Post_Model {
 
    public function __construct() {
        parent::__construct();
    }
    
    
    /**
     * INSERT NEW POST
     * 
     */
    public function insert( $data ) {
        
        //GET DATA
        $title = stripslashes(strip_tags( $data['title'] ));
        $content = stripslashes( $data['content'] );
        $description = stripslashes( $data['description'] );
        $seo_title = stripslashes(strip_tags( $data['seo_title'] ));
        $seo_keywords = stripslashes(strip_tags( $data['seo_keywords'] ));
        $seo_description = stripslashes(strip_tags( $data['seo_description'] ));
        $link = '/' . $data['alias'];
        
        //PREPARE DATA
        $agrs = array(
            'post_title' => $title,         
            'post_description' => $description,    
            'post_content' => $content, 
            'post_order'  => intval( $data['order'] ), 
            'post_status' => intval( $data['status'] ), 
            'post_highlight' => intval( $data['highlight'] ), 
            'post_datecreated' => date( 'Y-m-d H:i:s' ),
            'post_module' => $data['module'],    
            'post_seo_title' => ( empty($seo_title) ) ? $title : $seo_title,
            'post_seo_keywords' => $seo_keywords,
            'post_seo_description' => $seo_description,
            'category_id' => intval( $data['category_id'] ),
            'language_id' => $data['language_id'],            
            'post_featured_image' => $data['featured_image'],       
            'langmap_id' => $data['langmap_id'],            
            'post_lock'  => (empty( $title )) ? 1 : 0,
            'post_link'  => $link,
            'post_type' => $data['type']
        );
        
        $this->db->insert( $this->get_table(), $agrs );
        $rst =  $this->db->insert_id();
        $this->sync($agrs);
        return $rst;
    }
    
    public function get_length( $filters = array() ) {
        foreach ($filters as $f => $fvalue) {
    		$this->db->where($f, $fvalue);
    	}
    	$this->db->from( $this->get_table() );
    	
    	return $this->db->count_all_results();
    }
    
    /**
     * GET ALL POST BY PAGINATION
     * 
     */
    public function list_all_by_paging($select = array(), $filters = array(), $orders = array(), $from = 0, $to = 20, $keyword = '') {
    	if(count($select) > 0) {
    		 $this->db->select($select);
    	}

        $this->db->join('category', 'category.category_id = post.category_id', 'left');
        
    	if(!empty($keyword)) {
    		 $this->db->like('post_title', $keyword);
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
     * GET POST BY LANGMAP ID
     * 
     */
    public function get_post_by_langmap_id( $langmap_id ) {
        if( empty($langmap_id) ) return array();
        $table  = $this->get_table();
        $this->db->select('post.*, alias.*');
        $this->db->join('alias', "alias.fid = $table.post_id", 'left');
        $this->db->where(array('alias.langmap_id' => $langmap_id, 'post.post_type'=>'post'));
        $query = $this->db->get($table);
        return $query->result_array();
    }


    /**
     * GET PAGE BY LANGMAP ID
     * 
     */
    public function get_page_by_langmap_id( $langmap_id ) {
        if( empty($langmap_id) ) return array();
        $table  = $this->get_table();
        $this->db->select('post.*');
        $this->db->where(array('post.langmap_id' => $langmap_id, 'post.post_type'=>'page'));
        $query = $this->db->get($table);
        return $query->result_array();
    }
    

    public function get_by_langmap_id( $langmap_id ) {
        if( empty($langmap_id) ) return array();
        $table  = $this->get_table();
        $this->db->select('post.*');
        $this->db->where(array('post.langmap_id' => $langmap_id));
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
        $rst = $this->db->update( $this->get_table(), $data );
        return $rst;
    }
    
    
    /**
     * DELETE BY LANGMAP_ID
     * 
     */
    public function delete_by_langmap_id( $langmap_id ) {
        if( empty($langmap_id) ) return 0;
        $this->db->where('langmap_id', $langmap_id ); 
        $rst = $this->db->delete( $this->get_table() );
        return $rst;
    }
    
    
    /**
     * UPDATE POST
     * 
     */
    public function update( $data ) {
        
        //GET DATA
        $title = stripslashes(strip_tags( $data['title'] ));
        $content = stripslashes( $data['content'] );
        $description = stripslashes( $data['description'] );
        $seo_title = stripslashes(strip_tags( $data['seo_title'] ));
        $seo_keywords = stripslashes(strip_tags( $data['seo_keywords'] ));
        $seo_description = stripslashes(strip_tags( $data['seo_description'] ));
        $link = '/' . $data['alias'];
        
        //PREPARE DATA
        $agrs = array(
            'post_title' => $title,         
            'post_description' => $description,    
            'post_content' => $content, 
            'post_order'  => intval( $data['order'] ), 
            'post_status' => intval( $data['status'] ), 
            'post_highlight' => intval( $data['highlight'] ), 
            'post_seo_title' => ( empty($seo_title) ) ? $title : $seo_title,
            'post_seo_keywords' => $seo_keywords,
            'post_seo_description' => $seo_description,
            'category_id' => intval( $data['category_id'] ),     
            'post_featured_image' => $data['featured_image'],       
            'post_lock'  => (empty( $title )) ? 1 : 0,
            'post_link'  => $link,
            'post_module' => $data['module'],
            'language_id' => $data['language_id'],
            'post_type' => $data['type']
        );
        
        $rst =  $this->db->update( $this->get_table(), $agrs,  array('post_id' => $data['id']) );
        $this->sync($agrs);
        return $rst;
    }


    public function list_all( $select = array(), $filters = array(), $orders = array(), $keyword = '' ) {
        if(count($select) > 0) {
             $this->db->select($select);
        }
        
        if(!empty($keyword)) {
             $this->db->like('category_title', $keyword);
        }

        foreach ($filters as $f => $fvalue) {
            $this->db->where($f, $fvalue);
        }

        foreach ($orders as $key => $value) {
            $this->db->order_by($key, $value);
        }
        
        $query = $this->db->get( $this->get_table() );

        return $query->result_array();
    }
    
    public function update_order($data, $post_id) {
        return $this->db->update( $this->get_table(), $data,  array('post_id' => $post_id) );
    }

    public function sync($post) {
        $category_id = (int)$post['category_id'];
        $filters = array(
            'category_id' => $category_id
        );

        if( isset($post['language_id']) ) {
            $filters['language_id'] = $post['language_id'];
        }
        if( isset($post['post_module']) && isset($post['post_type']) && $post['post_type'] = 'post' ) {
            $filters['post_module'] = $post['post_module'];
        }
        if( isset($post['post_type']) ) {
            $filters['post_type'] = $post['post_type'];
        }

        $orders = array(
            'post_order' => 'asc'
        );

        $list = $this->list_all(array(), $filters, $orders);
        foreach ($list as $key => $l) {
            $order = $key + 1;
            $data = array('post_order' => $order );
            $this->update_order($data, $l['post_id']);
        }
    }

}