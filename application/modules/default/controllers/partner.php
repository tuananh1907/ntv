<?php
//REQUIRE
require_once APPPATH . 'modules/default/controllers/parent.php';

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Partner extends Parent_Controller {

    private $data;

    function __construct() {
        //if i remove this parent::__construct(); the error is gone
        parent::__construct();
        $this->get_page('partner');
        $this->data = $this->get_data();
    }

    public function index() {
        $media_module = 'partner';
        $language_id = LANGUAGE;
        $meta = array();
        $this->load->model('media_default_model');
        $this->data['partner'] = $this->media_default_model->get_gallery($media_module,$language_id,$meta);
//        _pr($this->data['partner'],true);


        //RUN VIEW
        $this->template->build('partner/index', $this->data);
    }


}