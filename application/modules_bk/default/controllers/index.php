<?php 
//REQUIRE
require_once APPPATH . 'modules/default/controllers/parent.php';

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Index extends Parent_Controller {

	 private $data;

	 function __construct() {
        //if i remove this parent::__construct(); the error is gone
        parent::__construct();
        $this->data = $this->get_data();

	}
	
	public function index() {
        $this->data['slider'] = $this->media_default_model->get_gallery('slider', LANGUAGE);

        $page = $this->post_default_model->get_page('index', LANGUAGE, array('_feature_title', '_feature'));
        $this->data['page'] = $page;
        
        //SEO
	$this->data['seo_title'] = $page['post_seo_title'];
	$this->data['seo_description'] = $page['post_seo_description'];
	$this->data['seo_keywords'] = $page['post_seo_keywords'];

        $num_products = $this->post_default_model->count('product', LANGUAGE);
        $pages = ceil($num_products / PAGINATION);
        $this->data['pages'] = $pages;
        $current_page = (int)$this->input->get('p');
        $current_page = ($current_page == 0) ? 1 : $current_page;
        $this->data['current_page'] = $current_page;
        $start = PAGINATION * ($current_page - 1) ;
        $this->data['products']=$this->post_default_model->get_post_by_pagination('product', LANGUAGE, $start, PAGINATION);
        
        //RUN VIEW
        $this->template->build( 'index/index', $this->data );

        //CACHING
        //$this->output->cache(5);
	}
	
	
}