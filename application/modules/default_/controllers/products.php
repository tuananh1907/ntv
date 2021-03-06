<?php 
//REQUIRE
require_once APPPATH . 'modules/default/controllers/parent.php';

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Products extends Parent_Controller {

	 private $data;
	 
	 function __construct() {
        //if i remove this parent::__construct(); the error is gone
        parent::__construct();
        $this->data = $this->get_data();
        $this->data['breadcrumbs'] = $this->get_breadcrumbs();
        $this->load->helper('thumb');
	}
	
	public function category($lang, $alias_name) {
		$this->load->Model("alias_default_model");
		$this->load->Model("post_default_model");
		$this->load->Model("category_default_model");

		//GET ALIAS
		$alias = $this->alias_default_model->get_by_name($alias_name);
		$category_id = $alias['fid'];

		//GET CATEGORY
		$category = (array)$this->category_default_model->get_by_id($category_id);
		$this->data['category'] = $category;

		//SEO
		$this->data['seo_title'] = $category['category_seo_title'];
		$this->data['seo_keywords'] = $category['category_seo_keywords'];
		$this->data['seo_description'] = $category['category_seo_description'];

		$page = $this->post_default_model->get_page('product', LANGUAGE);
        $this->data['page'] = $page;

		//PAGINATION	
		$num_products = $this->post_default_model->count('product', LANGUAGE, $category_id);
		$pages = ceil($num_products/PAGINATION);
		$this->data['pages'] =  $pages;
		$current_page = (int)$this->input->get('p');
        $current_page = ($current_page == 0) ? 1 : $current_page;
        $start = PAGINATION * ($current_page - 1) ;
        $this->data['products']=$this->post_default_model->get_post_by_pagination('product', LANGUAGE, $start, PAGINATION,$category_id);
        $this->data['current_page'] = $current_page;

        //UPDATE BREADCRUMBS
        array_push( $this->data['breadcrumbs'], array('url'=>'', 'title'=>$page['post_title']) );
        array_push( $this->data['breadcrumbs'], array('url'=>'', 'title'=>$category['category_title']) );
		//RUN VIEW
	    $this->template->build('products/category', $this->data);
	    //CACHING
        //$this->output->cache(CACHE_TIME);

	}

	public function product($lang, $alias_name) {
		$this->load->Model("alias_default_model");
		$this->load->Model("post_default_model");
		$this->load->Model("category_default_model");

		$alias = $this->alias_default_model->get_by_name($alias_name);
		$post_id = $alias['fid'];
		
		$post = (array)$this->post_default_model->get_by_id($post_id);
		$this->data['product'] = $post;

		//GET RELATED POST
		$category_id = $post['category_id'];
		$this->data['related_products'] = $this->post_default_model->get_post_by_category('product', LANGUAGE, $category_id);
		
		//GET CATEGORY
		$category = (array)$this->category_default_model->get_by_id($category_id);

		//SEO
		$this->data['seo_title'] = $post['post_seo_title'];
		$this->data['seo_keywords'] = $post['post_seo_keywords'];
		$this->data['seo_description'] = $post['post_seo_description'];

		$page = $this->post_default_model->get_page('product', LANGUAGE);
        $this->data['page'] = $page;

		//UPDATE BREADCRUMBS
		array_push( $this->data['breadcrumbs'], array('url'=>'', 'title'=>$page['post_title']) );
		if( count($category) > 0 ) {
			array_push( $this->data['breadcrumbs'], array('url'=> short_url('productcat', array($category['alias_name']), true), 'title'=>$category['category_title']) );
		}
    	array_push( $this->data['breadcrumbs'], array('url'=>'', 'title'=>$post['post_title']) );
		
    	
		//RUN VIEW
	  	$this->template->build('products/product', $this->data);
	  	//CACHING
    	//$this->output->cache(CACHE_TIME);
	}
	
}