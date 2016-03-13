<?php
//REQUIRE
require_once APPPATH . 'modules/admin/controllers/base_admin_controller.php';

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Index extends Base_Admin_Controller {
    
    private $data;
    private $class_view;
    private $params;
    
    function __construct() {
        //if i remove this parent::__construct(); the error is gone
        parent::__construct();

        //CHECK LOGGED IN
        $this->check_logged_in();

        $this->data = $this->get_data();

        $this->params = array();
         
        //GET VIEW
        $this->class_view = $this->router->fetch_class() . "/" . $this->router->fetch_method();
        
        
        $this->template->title('Administrator Board'); 
    }

    public function index() {
        $this->template->build($this->class_view, $this->data);
    }
    
}