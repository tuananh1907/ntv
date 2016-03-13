<?php 
//REQUIRE
require_once APPPATH . 'modules/default/controllers/parent.php';

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Equipment extends Parent_Controller {
	private $data;
	 function __construct() {
        //if i remove this parent::__construct(); the error is gone
        parent::__construct();
        $this->data = $this->get_data();
        $this->data['breadcrumbs'] = $this->update_breadcrumbs('equipment');
	}
	
	public function index() {
		
		$page = $this->post_default_model->get_page('equipment', LANGUAGE);
		$this->data['page'] = $page;
		
		//SEO
		$this->data['seo_title'] = $page['post_seo_title'];
		$this->data['seo_description'] = $page['post_seo_description'];
		$this->data['seo_keywords'] = $page['post_seo_keywords'];
	    
	    //RUN VIEW
        $this->template->build( 'equipment/index', $this->data );
                
                //CACHING
        //$this->output->cache(CACHE_TIME);
	}
}
