<?php
//REQUIRE
require_once APPPATH . 'modules/default/controllers/parent.php';

if (!defined('BASEPATH')) exit('No direct script access allowed');
class About extends Parent_Controller {

    private $data;

    function __construct() {
        //if i remove this parent::__construct(); the error is gone
        parent::__construct();

        $this->get_page('about');
        $this->data = $this->get_data();

    }

    public function index() {
        $post_module = 'about';
        $language_id = LANGUAGE;
        $meta = array();
        $this->load->model('post_default_model');
        $this->data['about_list'] = $this->post_default_model->get_posts($post_module,$language_id,$meta);
        $this->data['post'] = $this->data['about_list'][0];

        //SEO
        $this->data['seo_title'] = $this->data['post']['post_seo_title'];
        $this->data['seo_description'] = $this->data['post']['post_seo_description'];
        $this->data['seo_keywords'] = $this->data['post']['post_seo_keywords'];


        //RUN VIEW
        $this->template->build('about/index', $this->data);
    }
    public function post($lang, $alias_name) {
        $post_module = 'about';
        $language_id = LANGUAGE;
        $meta = array();
        $this->load->model('post_default_model');
        $this->data['about_list'] = $this->post_default_model->get_posts($post_module,$language_id,$meta);
        $this->data['post'] = array();

        foreach ($this->data['about_list'] as $ab) {
            if ( $ab['alias_name'] == $alias_name ) {
                $this->data['post'] = $ab;
            }
        }

        //SEO
        $this->data['seo_title'] = $this->data['post']['post_seo_title'];
        $this->data['seo_description'] = $this->data['post']['post_seo_description'];
        $this->data['seo_keywords'] = $this->data['post']['post_seo_keywords'];


//        _pr($this->data['about_list'], true);

        //RUN VIEW
        $this->template->build('about/index', $this->data);
    }

}