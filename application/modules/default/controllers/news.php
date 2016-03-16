<?php 
//REQUIRE
require_once APPPATH . 'modules/default/controllers/parent.php';

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News extends Parent_Controller {
	private $data;

	 function __construct() {
        //if i remove this parent::__construct(); the error is gone
        parent::__construct();
         $this->get_page('news');
        $this->data = $this->get_data();

         /*$this->data['breadcrumbs'] = $this->update_breadcrumbs('news');
         $this->load->helper('thumb');*/
	}

	public function index() {
        $this->load->Model("post_default_model");

        $post_module = 'news';
        $language_id = LANGUAGE;
        $limit = 9;
        $count = $this->post_default_model->count($post_module,$language_id);
        $pages = ceil($count/$limit);
        $p = isset($_GET['p']) ? $_GET['p'] : 1;
        $offset = ($p-1)*$limit;


		$this->data['news'] = $this->post_default_model->get_post_by_pagination($post_module,$language_id,$offset,$limit);
//        _pr($this->data['news'],true);
        $this->data['pages'] = $pages;
        $this->data['current_page'] = $p;
        foreach($this->data['news'] as $n) {
            $this->data['timestamp'] = strtotime($n['post_datecreated']);
        }

//        _pr($this->data['timestamp'],true);



//		$page = $this->post_default_model->get_page('news', LANGUAGE);
//		$this->data['page'] = $page;
//
//		//SEO
//		$this->data['seo_title'] = $page['post_seo_title'];
//		$this->data['seo_description'] = $page['post_seo_description'];
//		$this->data['seo_keywords'] = $page['post_seo_keywords'];

	    //RUN VIEW
        $this->template->build( 'news/index', $this->data );
                //CACHING
        //$this->output->cache(CACHE_TIME);
	}

    public function post($language_id, $alias_name) {
        $post_module = 'news';
        $meta = array();

        $this->load->Model('alias_default_model');
        $a = $this->alias_default_model->get_by_name($alias_name);
        $id = $a['fid'];

        $this->load->Model('post_default_model');
        $this->data['posts'] = (array)$this->post_default_model->get_by_id($id);


        $this->data['timestamp'] = strtotime($this->data['posts']['post_datecreated']);

        $this->data['new_posts'] = $this->post_default_model->get_posts($post_module, $language_id, $meta);

//        _pr($this->data['new_posts'],true);

        //SEO
        $this->data['seo_title'] = $this->data['posts']['post_seo_title'];
        $this->data['seo_description'] = $this->data['posts']['post_seo_description'];
        $this->data['seo_keywords'] = $this->data['posts']['post_seo_keywords'];








        //RUN VIEW
        $this->template->build( 'news/post', $this->data );
    }

}
