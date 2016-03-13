<?php
//REQUIRE
require_once APPPATH . 'modules/admin/controllers/base_admin_controller.php';
require_once APPPATH . "modules/admin/controllers/inputs/category_inputs.php";

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category extends Base_Admin_Controller {
    
    private $module;
    private $languages;
    private $class_view;
    private $url;
    private $params;
    private $data;
    
    
    
    /**
     * CONSTRUCT 
     * 
     */
    function __construct() {
        
        parent::__construct();

        //CHECK LOGGED IN
        $this->check_logged_in();

        $this->data = $this->get_data();
        
        $this->module = array();
        
        //GET VIEW
        $this->class_view = $this->router->fetch_class() . "/" . $this->router->fetch_method();
        
        //GET CURENT URL
        $this->url = $this->module_url();
        
        //GET LANGUAGES
        $this->languages = $this->languages();
        
        //GET PARAMS
        $this->params = $this->request_params( new Category_inputs );
        
        //ADD PARAMS TO VIEW
        $this->data['params'] = $this->params;
        
        //GET MODULE
        $this->module = $this->module();
        
        //LOAD MODEL
        $this->load_model();
        
        //SET TITLE FOR VIEW
        $this->template->title( ( !empty($this->module->module_name) ) ? $this->module->module_name : 'Category' );
    }
    
    
    
    /**
     * INDEX ACTION 
     * 
     */
    public function index () {
        //PERMISSION
        $this->page_has_permission($this->module_code(), VIEW);

        //SELECT
        $select = array('category_id', 'category_title', 'category_order', 'category_status', 'language_id', 'catparent_id', 'category_level');
        //FILTER
        $filters = array('catparent_id' => (int)$this->params['pid']);
        $filters['language_id'] =  DEFAULT_LANGUAGE;
        if( (int)$this->params['show'] != -1 ) {
            $filters['category_status'] = (int)$this->params['show'];
        }
        $filters['category_module'] = $this->module_code();
        //ORDER
        $orders = array('category_order' => 'asc');
        
        //PAGINATION
        $page = (int)$this->params['page'];
        $range = (int)$this->params['range'];
        $from = ($page - 1) * $range;
        
        //DATA TO VIEW
        $this->data['list'] = $this->category_admin_model->list_all_by_paging( $select, $filters, $orders, $from, $range, $keyword = $this->params['keyword'] );
        $this->data['list_length'] = $this->category_admin_model->get_length( $filters );
        
        //GET LIST SORT
        $filters = array( 'category_status' => 1,  'category_module' => $this->module_code() );
        $rs = $this->category_admin_model->list_all( $select, $filters, $orders );
        $this->data['list_sort'] = get_list_by_language_id(DEFAULT_LANGUAGE, $rs);
        
        //RUN VIEW
        $this->template->build( $this->class_view, $this->data);
    }
    
    
    
    /**
     * ADD ACTION 
     * 
     */
    public function add() {
        //PERMISSION
        $this->page_has_permission($this->module_code(), ADD);

        //IF SUBMITED
        if ( isset($_POST['add']) ) {
            //ADD NEW LANG MAP
            $langmap_id = (int)$this->langmap_admin_model->insert( array('langmap_module' => $this->module_code() ) );
        
            //GET DATA FROM POST
            $categories = $this->input->post('category');
            $status = $this->input->post('status');
            $order = $this->input->post('order');
            
            foreach($this->languages as $l) {
                $category = $categories[$l];
                $category['status'] = $status;
                $category['order'] = $order;
                $category['language_id'] = $l;
                $category['langmap_id'] = $langmap_id;
                $category['module'] = $this->module_code();
                $category['alias'] = ( !empty( $category['alias'] ) ) ? $category['alias'] : 'cat-' . uniqid();
                
                //INSERT CATEGORY
                $category_id = $this->category_admin_model->insert( $category );
                
                //INSERT ALIAS
                $this->alias_admin_model->insert($category_id, $category);
            }
            
            //NOTICE
            $this->session->set_flashdata( 'notice', array('status'=>'success', 'message' => $this->lang->line('txt_insertsuccess') ) );
        
            //BACK TO INDEX
            redirect( url_add_params($this->params, '/admin/category') );
        } else {
            $this->data['languages'] = $this->languages;
            $this->data['list'] = array();
            
            //GET LIST
            $this->get_list_parent_category();
            
            //RUN VIEW
            $this->template->build( $this->class_view, $this->data);
        }
    }
    
    
    
    /**
     * EDIT ACTION
     * 
     */
    public function edit() {
        //PERMISSION
        $this->page_has_permission($this->module_code(), EDIT);

        $this->data['categories'] = array();
        $this->data['languages'] = $this->languages;
        
        //IF SUBMITED
        if ( isset($_POST['update']) ) {
            //GET DATA FROM POST
            $categories = $this->input->post('category');
            $status = $this->input->post('status');
            $order = $this->input->post('order');
            
            foreach($this->languages as $l) {
                $category = $categories[$l];
                $category['status'] = $status;
                $category['order'] = $order;
                $category['alias'] = ( !empty( $category['alias'] ) ) ? $category['alias'] : 'cat-' . uniqid();
                $category['language_id'] = $l;
                $category['module'] = $this->module_code();
                //UPDATE CATEGORY
                $this->category_admin_model->update( $category );
                
                //UPDATE ALIAS
                $this->alias_admin_model->update( $category );
            }
            
            //NOTICE
            $this->session->set_flashdata( 'notice', array('status'=>'success', 'message' => $this->lang->line('txt_updateinfor') ) );
            
            //BACK TO INDEX
            redirect( url_add_params($this->params, '/admin/category') );
        }else{
            //GET CATEGORIES TO SHOW
            $id = $this->input->get('id');
            $category   = $this->category_admin_model->get_by_id($id);
            $langmap_id = $category->langmap_id;
            $rs = $this->category_admin_model->get_by_langmap_id($langmap_id);
            foreach($this->languages as $l) {
                $this->data['categories'][$l] = get_list_by_language_id($l, $rs, true);
            }
            
            //GET LIST
            $this->get_list_parent_category();
            
            //RUN VIEW
            $this->template->build( $this->class_view, $this->data);
        }
    }
    
    
    
    /**
     * UPDATE STATUS
     * 
     */
    public function status() {
        //PERMISSION
        $this->page_has_permission($this->module_code(), EDIT);

        //GET DATA
        $status = (int)$this->input->get('status');
        $id = (int)$this->input->get('id');
        
        //GET LANGMAP ID
        $category = $this->category_admin_model->get_by_id($id);
        $langmap_id = $category->langmap_id;
        
        //UPDATE DATA
        $args = array('category_status' => $status);
        $result = $this->category_admin_model->update_by_langmap_id( $args, $langmap_id );
        
        //RESPONSE
        echo json_encode( array('STATUS' => $result) );
    }
    
    
    
    /**
     * UPDATE
     * 
     */
    public function update() {
        //PERMISSION
        $this->page_has_permission($this->module_code(), EDIT);

        $type = $this->input->post('type');
        $sorts = array();
        $ids = array();
        if( $type == 'update' ) {
            $sorts = $this->input->post('sorts');
            if( count($sorts) > 0 ) {
                foreach($sorts as $id => $value) {
                    //GET LANGMAP ID
                    $category = $this->category_admin_model->get_by_id($id);
                    $langmap_id = $category->langmap_id;
                    
                    //UPDATE DATA
                    $args = array('category_order' => intval($value));
                    $this->category_admin_model->update_by_langmap_id( $args, $langmap_id );
                }
            }
        } elseif ( $type == 'delete' ) {
            $ids = $this->input->post('ids');
            if( count($ids) > 0 ) {
                foreach($ids as $id) {
                    $this->remove($id);
                }
            }
        }
        
        //NOTICE
        $this->session->set_flashdata( 'notice', array('status'=>'success', 'message' => $this->lang->line('txt_updateinfor') ) );
       
        //BACK TO INDEX
        redirect( url_add_params($this->params, '/admin/category') );
    }
    
    
    
    /**
     * DELETE
     * 
     */
    public function delete() {
        //PERMISSION
        $this->page_has_permission($this->module_code(), DELETE);

        $id = (int)$this->input->get('id');
        $this->remove($id);

        //NOTICE
        $this->session->set_flashdata( 'notice', array('status'=>'success', 'message'=>$this->lang->line('txt_deletesuccess') ) );
        
        //BACK TO INDEX
        redirect( url_add_params($this->params, '/admin/category') );
    }
    
    
    
    /**
     * REMOVE BY ID 
     * 
     */
    private function remove($id) {
        //GET LANGMAP ID
        $category = $this->category_admin_model->get_by_id($id);
        $langmap_id = $category->langmap_id;
        
        $categories = $this->category_admin_model->get_by_langmap_id($langmap_id);
        
        //DELETE DATA
        $this->category_admin_model->delete_by_langmap_id( $langmap_id );
        
        //DELETE ALIAS
        $this->alias_admin_model->delete_by_langmap_id($langmap_id);
        
        //DELETE META
        $this->meta_admin_model->delete_by_langmap_id($langmap_id);
        
        //DELETE LANGMAP
        $this->langmap_admin_model->delete($langmap_id);
    }
    
    
    
    /** 
     * LOAD ALL MODEL
     * 
     */
    private function load_model() {
        $this->load->Model("category_admin_model");
        $this->load->Model("langmap_admin_model");
        $this->load->Model("alias_admin_model");
        $this->load->Model("meta_admin_model");
    }
    
    
    
    /**
     * GET LIST PARENT CATEGORY  
     * 
     */
    private function get_list_parent_category() {
        $rs = $this->category_admin_model->list_all( 
                                                    $select = array( 'category_id', 'category_title', 'catparent_id', 'category_level', 'language_id'),
                                                    $filters = array( 'category_status' => 1,  'category_module' => $this->module_code() ),
                                                    $orders = array() 
                                                    );
        foreach($this->languages as $l) {
            $this->data['list'][$l] = get_list_by_language_id($l, $rs);
        }
    }
    
}