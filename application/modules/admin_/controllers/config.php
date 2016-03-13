<?php
//REQUIRE
require_once APPPATH . 'modules/admin/controllers/base_admin_controller.php';

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Config extends Base_Admin_Controller {
    
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
        
        //SET TITLE FOR VIEW
        $this->template->title( ( !empty($this->module->module_name) ) ? $this->module->module_name : 'Config' );
    }
    
    
    
    /**
     * INDEX ACTION 
     * 
     */
    public function index () {
        $this->page_has_permission('config', VIEW);
        $this->load->Model('config_admin_model');
       
        if( isset($_POST['add']) )  {
            $config = $this->input->post('config');
            foreach($config as $key => $value) {
                $agrs = array(
                    'field_name' => $key,
                    'field_value' => $value
                );
                $this->config_admin_model->upsert($agrs);
            }
            //BACK TO INDEX
            redirect( '/admin/config' );
        } 
        
        //RUN VIEW
        $this->template->build( $this->class_view, $this->data);
    }
    
}