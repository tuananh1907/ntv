<?php 
//REQUIRE
require_once APPPATH . 'modules/default/controllers/parent.php';

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends Parent_Controller {

	 private $data;
	 
	 function __construct() {
        //if i remove this parent::__construct(); the error is gone
        parent::__construct();
        $this->data = $this->get_data();
        /*$this->data['breadcrumbs'] = $this->get_breadcrumbs();
        $this->load->helper('thumb');*/
	}

    public function index() {
        $category_module = 'productcat';
        $post_module = 'product';
        $language_id = LANGUAGE;
        $this->load->model('category_default_model');
        $this->data['categories'] = $this->category_default_model->get_category($category_module,$language_id );


        $this->load->model('post_default_model');
        $limit = 1;
        $count = $this->post_default_model->count($post_module, $language_id);
        $p = isset($_GET['p']) ? $_GET['p'] : 1;
        $offset = ($p-1)*$limit;
        $this->data['posts'] = $this->post_default_model->get_post_by_pagination($post_module,$language_id,$offset,$limit);
        $this->data['current_page'] = $p;
        $this->data['pages'] = ceil($count/$limit);
        //_pr($this->data['posts'],true);


        //RUN VIEW
        $this->template->build('product/index', $this->data);
    }

    public function category($lang, $alias_name) {

        $category_module = 'productcat';
        $post_module = 'product';
        $language_id = LANGUAGE;
        $this->load->model('category_default_model');
        $this->data['categories'] = $this->category_default_model->get_category($category_module,$language_id );
//        _pr($this->data['categories'],true);

        foreach ($this->data['categories'] as $cs) {
            if ( $cs['alias_name'] == $alias_name ) {
                $category_id = $cs['category_id'];
            }
        }

        $this->load->model('post_default_model');
        $limit = 1;
        $count = $this->post_default_model->count($post_module, $language_id, $category_id);
        $p = isset($_GET['p']) ? $_GET['p'] : 1;
        $offset = ($p-1)*$limit;
        $this->data['posts'] = $this->post_default_model->get_post_by_pagination($post_module,$language_id,$offset,$limit,$category_id);
        $this->data['current_page'] = $p;
        $this->data['pages'] = ceil($count/$limit);

















        //RUN VIEW
        $this->template->build('product/index', $this->data);


    }


        public function post($lang, $alias_name) {

            $category_module = 'productcat';
            $post_module = 'product';
            $language_id = LANGUAGE;
            $this->load->model('category_default_model');
            $this->data['categories'] = $this->category_default_model->get_category($category_module,$language_id );



            $this->load->model('alias_default_model');
            $alias = $this->alias_default_model->get_by_name($alias_name);
            $id = $alias['fid'];

            $this->load->model('post_default_model');
            $this->data['post'] = (array)$this->post_default_model->get_by_id($id);





//

            //RUN VIEW
            $this->template->build('product/product', $this->data);
        }
	
	/*public function category($lang, $alias_name) {
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
	}*/
	
}