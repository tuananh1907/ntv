<?php
//REQUIRE
require_once APPPATH . 'modules/default/controllers/parent.php';

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Library extends Parent_Controller {

    private $data;

    function __construct() {
        //if i remove this parent::__construct(); the error is gone
        parent::__construct();
        $this->data = $this->get_data();
    }

    public function index() {
        $post_module = 'photo';
        $language_id = LANGUAGE;
        $meta = array();
        $this->load->model('post_default_model');
        $this->data['lib_photo'] = $this->post_default_model->get_posts($post_module,$language_id,$meta);

//        _pr($this->data['lib_photo'],true);



        //RUN VIEW
        $this->template->build('library/index', $this->data);

    }

    public function video() {
        $media_module = 'video';
        $language_id = LANGUAGE;
        $this->load->model('media_default_model');
        $this->data['lib_video'] = $this->media_default_model->get_gallery($media_module,$language_id);

//        _pr($this->data['lib_video'],true);





        //RUN VIEW
        $this->template->build('library/video', $this->data);
    }

    public function pdf() {



        //RUN VIEW
        $this->template->build('library/pdf', $this->data);
    }


}