<?php
//REQUIRE
require_once APPPATH . 'modules/default/controllers/parent.php';

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Career extends Parent_Controller {
    private $data;

    function __construct() {
        //if i remove this parent::__construct(); the error is gone
        parent::__construct();
        $this->data = $this->get_data();
        $this->data['breadcrumbs'] = $this->update_breadcrumbs('career');
    }

    public function index() {
        $this->load->Model("post_default_model");
        $this->load->Model("meta_default_model");
        $this->data['career'] = $this->post_default_model->get_post('career', LANGUAGE, array('_quantity', '_deadline') );
        
        $page = $this->post_default_model->get_page('career', LANGUAGE);
        $this->data['page'] = $page;
        
        //SEO
        $this->data['seo_title'] = $page['post_seo_title'];
        $this->data['seo_description'] = $page['post_seo_description'];
        $this->data['seo_keywords'] = $page['post_seo_keywords'];
        
        //RUN VIEW
        $this->template->build('career/index', $this->data);

        //CACHING
       //$this->output->cache(CACHE_TIME);
    }

}
