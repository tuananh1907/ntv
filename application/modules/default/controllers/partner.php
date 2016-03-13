<?php
//REQUIRE
require_once APPPATH . 'modules/default/controllers/parent.php';

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Partner extends Parent_Controller {

    private $data;

    function __construct() {
        //if i remove this parent::__construct(); the error is gone
        parent::__construct();
        $this->data = $this->get_data();
    }

    public function index() {
//        $post_module = 'about';
//        $language_id = LANGUAGE;
//        $meta = array();
//        $this->load->model('post_default_model');
//        $this->data['about_list'] = $this->post_default_model->get_posts($post_module,$language_id,$meta);
//        $this->data['post'] = $this->data['about_list'][0];


        //RUN VIEW
        $this->template->build('partner/index', $this->data);
    }


}