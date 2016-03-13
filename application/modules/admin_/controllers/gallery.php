<?php
//REQUIRE
require_once APPPATH . 'modules/admin/controllers/base_admin_controller.php';

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery extends Base_Admin_Controller {
    
    private $module;
    private $languages;
    private $class_view;
    private $url;
    private $data;
    
    
    
    /**
     * CONSTRUCT 
     * 
     */
    function __construct(){
        
        parent::__construct();

        //CHECK LOGGED IN
        $this->check_logged_in();
        
        $this->data = $this->get_data();
        
        $this->module = array();
        
        //GET VIEW
        $this->class_view = $this->router->fetch_class() . "/" . $this->router->fetch_method();
        
        //GET CURRENT URL
        $this->url = $this->module_url();
        
        //GET LANGUAGES
        $this->languages = $this->languages();
        
        //GET MODULE
        $this->module = $this->module();

        $this->data['languages'] = $this->languages;
        
        //LOAD MODEL
        $this->load_model();
        
        //SET TITLE FOR VIEW
        $this->template->title( ( !empty($this->module->module_name) ) ? $this->module->module_name : 'Gallery' );
    }
    
    
    
    /**
     * INDEX ACTION 
     * 
     */
    public function index () {
        //PERMISSION
        $this->page_has_permission($this->module_code(), VIEW);

        $g = $this->media_admin_model->list_all(array(), array('media_module' => $this->module_code()));
        if( isset($_POST['galleries']) )  {
            if( empty($g) ) {
                $this->insert();
            }else {
                $this->update();
            }
        } 
        foreach($this->languages as $l) {
            $this->data['list'][$l] = get_list_by_language_id($l, $g);
        }
        //RUN VIEW
        $this->template->build( $this->class_view, $this->data);
    }
    
    
    private function insert() {
        //ADD NEW LANG MAP
        $langmap_id = (int)$this->langmap_admin_model->insert( array('langmap_module' => $this->module_code() ) );
        
        //GET DATA FROM POST
        $galleries = $this->input->post('galleries');
        foreach($this->languages as $l) {
            $gallery = $galleries[$l];
            $data['media_module'] = $this->module_code();
            $data['media_title'] = 'Gallery ' . $data['media_module'];
            $data['langmap_id'] =  (int)$langmap_id;
            $data['language_id'] = $l;
            $data['media_file'] = addslashes( $gallery['photos'] );
            $this->media_admin_model->insert($data);
        }
        //NOTICE
        $this->session->set_flashdata( 'notice', array('status'=>'success', 'message'=> $this->lang->line('txt_insertsuccess') ) );
        //BACK TO INDEX
        redirect( '/admin/gallery?mod=' . $this->module_code() );
    }
    
    
    
    private function update() {
        //GET DATA FROM POST
        $galleries = $this->input->post('galleries');
        foreach($this->languages as $l) {
            $gallery = $galleries[$l];
            $module = $this->module_code();
            $data['media_file'] = addslashes( $gallery['photos'] );
            $this->media_admin_model->update(array('language_id'=> $l, 'media_module' => $module), $data);
        }
        //NOTICE
        $this->session->set_flashdata( 'notice', array('status'=>'success', 'message'=> $this->lang->line('txt_updateinfor') ) );
        //BACK TO INDEX
        redirect( '/admin/gallery?mod=' . $this->module_code() );
    }
    
    
    /** 
     * LOAD ALL MODEL
     * 
     */
    private function load_model() {
        $this->load->Model("langmap_admin_model");
        $this->load->Model("media_admin_model");
    }
    
}