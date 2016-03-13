<?php
require_once APPPATH . 'models/post_model.php';
class Post_Default_Model extends Post_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_meta( $fid, $module, $meta = array() ) {
        foreach ($meta as $m) {
            $this->db->select('MAX(CASE WHEN meta_key = \'' . $m . '\' THEN meta_value END) AS \'' . $m . '\'');
        }
        $this->db->from('meta');
        $this->db->where(array('fid' => $fid, 'meta_module' => $module ));
        $query = $this->db->get();
        return (array)$query->row();
    }

    public function get_post($post_module, $language_id, $meta = array()) {
        $this->db->select('post.*, alias.alias_name');
        $this->db->from($this->get_table());
        $this->db->join('alias', 'alias.fid = post.post_id', 'left');
        $this->db->where(array('alias.alias_module' => $post_module, 'post_module' => $post_module, 'post.language_id' => $language_id, 'post_status' => 1, 'post_type' => 'post', 'post_lock' => 0));
        $query = $this->db->get();
        $list =  $query->result_array();

        foreach ($list as $key => $l) {
            $list[$key]['meta'] = $this->get_meta($l['post_id'], $l['post_module'], $meta);
        }
        return $list;
    }
    
    public function get_post_by_category($post_module, $language_id, $category_id, $meta = array()) {
        $this->db->select('post.*, alias.alias_name');
        $this->db->from($this->get_table());
        $this->db->join('alias', 'alias.fid = post.post_id', 'left');
        $this->db->where(array('alias.alias_module' => $post_module, 'post_module' => $post_module, 'post.language_id' => $language_id, 'post.category_id' => $category_id, 'post_status' => 1, 'post_type' => 'post', 'post_lock' => 0));
        $this->db->order_by('post_order asc, post_id desc'); 
        $query = $this->db->get();
        $list =  $query->result_array();
        foreach ($list as $key => $l) {
            $list[$key]['meta'] = $this->get_meta($l['post_id'], $l['post_module'], $meta);
        }
        return $list;
    }


    public function get_pages($language_id = '')
    {
        $this->db->select('*');
        $this->db->from($this->get_table());
        $this->db->where(array('post_type' => 'page'));
        if (!empty($language_id)) {
            $this->db->where('language_id', $language_id);
        }
        $this->db->order_by('post_order', 'asc');
        $query = $this->db->get();
        return $query->result_array(); //$query->row()
    }

    public function get_page($post_module, $language_id, $meta = array())
    {
        $this->db->select('post.*');
        foreach ($meta as $m) {
            $this->db->select('MAX(CASE WHEN meta_key = \'' . $m . '\' THEN meta_value END) AS \'' . $m . '\'');
        }
        $this->db->from($this->get_table());
        $this->db->join('meta', 'meta.fid = post.post_id', 'left');
        $this->db->where(array('post_module' => $post_module, 'language_id' => $language_id, 'post_type' => 'page'));
        $query = $this->db->get();
        return (array)$query->row();

    }

    public function count($post_module, $language_id, $category_id = 0)
    {
        $this->db->select('post_title');
        $this->db->from($this->get_table());
        $this->db->where(array('post_module' => $post_module, 'language_id' => $language_id, 'post_lock' => 0, 'post_status' => 1, 'post_type' => 'post'));
        if($category_id != 0) {
            $this->db->where('category_id', $category_id);
        }
        $query = $this->db->get();
        $count = $query->num_rows();
        return $count;
    }

    public function get_post_by_pagination($post_module, $language_id, $start, $offset, $category_id = 0)
    {
        $this->db->select('*');
        $this->db->from($this->get_table());
        $this->db->join('alias', 'alias.fid = post.post_id');
        $this->db->where(array('post_module' => $post_module, 'post.language_id' => $language_id, 'post_lock' => 0, 'post_status' => 1, 'post_type' => 'post'));
        if($category_id != 0) {
            $this->db->where('category_id', $category_id);
        }
        $this->db->limit($offset, $start);
        $this->db->order_by('post_id', 'desc');
        $query = $this->db->get();
        return $query->result_array();

    }

}