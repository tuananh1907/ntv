<?php
//REQUIRE
require_once APPPATH . 'modules/admin/controllers/base_admin_controller.php';

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ajax extends Base_Admin_Controller {
    
    
    /**
     * CONSTRUCT 
     * 
     */
    function __construct() {
        parent::__construct();

        //CHECK LOGGED IN
        $this->check_logged_in();

    }


    /**
     * create alias
     */
    public function alias() {
        $title = $this->input->get('title');
        echo alias($title);
    }

    public function checkalias() {
        $this->load->Model('alias_admin_model');
        $type = $this->input->get('type');
        $language = $this->input->get('language');
        $list = $this->input->get($type);
        $alias_name = $list[$language]['alias'];
        $alias = $this->alias_admin_model->get_by_name($alias_name);
        if( count($alias) > 0) {
            echo 'false'; die();
        }
        echo 'true'; die();
    }
}