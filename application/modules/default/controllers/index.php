<?php 
//REQUIRE
require_once APPPATH . 'modules/default/controllers/parent.php';

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Index extends Parent_Controller {

	 private $data;

	 function __construct() {
        //if i remove this parent::__construct(); the error is gone
        parent::__construct();
         $this->get_page('index');
        $this->data = $this->get_data();
	}
	
	public function index() {
        $post_module = 'project';
        $language_id = LANGUAGE;
        $meta = array();

        $this->load->model('post_default_model');
        $this->data['post_index'] = $this->post_default_model->get_posts($post_module,$language_id,$meta);


        if( isset($_POST['email']) ) {
            _pr($_POST, true);
        }



        //RUN VIEW
        $this->template->build( 'index/index', $this->data );


	}
	
	
}