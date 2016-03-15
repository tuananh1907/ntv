<?php
//REQUIRE
require_once APPPATH . 'modules/default/controllers/parent.php';

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Product2 extends Parent_Controller
{

    private $data;

    function __construct()
    {
        //if i remove this parent::__construct(); the error is gone
        parent::__construct();
        $this->get_page('product2');
        $this->data = $this->get_data();
        /*$this->data['breadcrumbs'] = $this->get_breadcrumbs();
        $this->load->helper('thumb');*/
    }

    public function index()
    {
        $category_module = 'product2cat';
        $post_module = 'product2';
        $language_id = LANGUAGE;
        $this->load->model('category_default_model');
        $this->data['categories'] = $this->category_default_model->get_category($category_module, $language_id);


        $this->load->model('post_default_model');
        $limit = 1;
        $count = $this->post_default_model->count($post_module, $language_id);
        $p = isset($_GET['p']) ? $_GET['p'] : 1;
        $offset = ($p - 1) * $limit;
        $this->data['posts'] = $this->post_default_model->get_post_by_pagination($post_module, $language_id, $offset, $limit);
        $this->data['current_page'] = $p;
        $this->data['pages'] = ceil($count / $limit);

        //RUN VIEW
        $this->template->build('product2/index', $this->data);
    }

    public function category($lang, $alias_name)
    {

        $category_module = 'product2cat';
        $post_module = 'product2';
        $language_id = LANGUAGE;
        $this->load->model('category_default_model');
        $this->data['categories'] = $this->category_default_model->get_category($category_module, $language_id);
        $category = array();
//            _pr($this->data['categories'],true);

        foreach ($this->data['categories'] as $cs) {

            if ($cs['alias_name'] == $alias_name) {
                $category = $cs;
            }


            if ($cs['alias_name'] == $alias_name) {
                $category_id = $cs['category_id'];

            }


        }

        $this->load->model('post_default_model');
        $limit = 1;
        $count = $this->post_default_model->count($post_module, $language_id, $category_id);
        $p = isset($_GET['p']) ? $_GET['p'] : 1;
        $offset = ($p - 1) * $limit;
        $this->data['posts'] = $this->post_default_model->get_post_by_pagination($post_module, $language_id, $offset, $limit, $category_id);
        $this->data['current_page'] = $p;
        $this->data['pages'] = ceil($count / $limit);


        //SEO
        $this->data['seo_title'] = $category['category_seo_title'];
        $this->data['seo_description'] = $category['category_seo_description'];
        $this->data['seo_keywords'] = $category['category_seo_keywords'];

        $this->data['category'] = $category;


        //RUN VIEW
        $this->template->build('product2/index', $this->data);


    }


    public function post($lang, $alias_name)
    {

        $category_module = 'product2cat';
        $post_module = 'product2';
        $language_id = LANGUAGE;
        $this->load->model('category_default_model');
        $this->data['categories'] = $this->category_default_model->get_category($category_module, $language_id);


        $this->load->model('alias_default_model');
        $alias = $this->alias_default_model->get_by_name($alias_name);
        $id = $alias['fid'];

        $this->load->model('post_default_model');
        $this->data['post'] = (array)$this->post_default_model->get_by_id($id);

//        _pr($this->data['post'],true);


        //SEO
        $this->data['seo_title'] = $this->data['post']['post_seo_title'];
        $this->data['seo_description'] = $this->data['post']['post_seo_description'];
        $this->data['seo_keywords'] = $this->data['post']['post_seo_keywords'];

        $meta = $this->post_default_model->get_meta($id, $post_module, array('_gallery'));
        $gallery = stripcslashes($meta['_gallery']);
        $this->data['gallery'] = json_decode($gallery, true);




        $this->data['posts_category'] = $this->post_default_model->get_post_by_category($post_module, $lang, $this->data['post']['category_id'], array());




        //RUN VIEW
        $this->template->build('product2/product', $this->data);
    }

}