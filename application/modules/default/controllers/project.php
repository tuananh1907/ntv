<?php
//REQUIRE
require_once APPPATH . 'modules/default/controllers/parent.php';

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Project extends Parent_Controller
{

    private $data;

    function __construct()
    {
        //if i remove this parent::__construct(); the error is gone
        parent::__construct();
        $this->data = $this->get_data();
        /*$this->data['breadcrumbs'] = $this->get_breadcrumbs();
        $this->load->helper('thumb');*/
    }

    public function index()
    {

        $category_module = 'projectcat';
        $language_id = LANGUAGE;

        $this->load->Model('category_default_model');
        $this->data['categories'] = $this->category_default_model->get_category($category_module,$language_id);



        $post_module = 'project';
        $this->load->model('post_default_model');
        $limit = 1;
        $count = $this->post_default_model->count($post_module, $language_id);
        $p = isset($_GET['p']) ? $_GET['p'] : 1;
        $offset = ($p-1)*$limit;
        $this->data['posts'] = $this->post_default_model->get_post_by_pagination($post_module,$language_id,$offset,$limit);
        $this->data['current_page'] = $p;
        $this->data['pages'] = ceil($count/$limit);
//        _pr($this->data['posts'],true);



        //RUN VIEW
        $this->template->build('project/index', $this->data);
    }

    public function category($lang, $alias_name)
    {

        $category_module = 'projectcat';
        $language_id = LANGUAGE;

        $this->load->Model('category_default_model');
        $this->data['categories'] = $this->category_default_model->get_category($category_module,$language_id);

        foreach($this->data['categories'] as $c) {
            if ($c['alias_name'] == $alias_name) {
                $category_id = $c['category_id'];
            }
        }



        $post_module = 'project';
        $this->load->model('post_default_model');
        $limit = 1;
        $count = $this->post_default_model->count($post_module, $language_id,$category_id);
        $p = isset($_GET['p']) ? $_GET['p'] : 1;
        $offset = ($p-1)*$limit;
        $this->data['posts'] = $this->post_default_model->get_post_by_pagination($post_module,$language_id,$offset,$limit, $category_id);
        $this->data['current_page'] = $p;
        $this->data['pages'] = ceil($count/$limit);



        //RUN VIEW
        $this->template->build('project/index', $this->data);
    }


    public function post($lang, $alias_name)
    {


        $category_module = 'projectcat';
        $language_id = LANGUAGE;

        $this->load->Model('category_default_model');
        $this->data['categories'] = $this->category_default_model->get_category($category_module,$language_id);
//        _pr($this->data['categories']);

        $this->load->model('alias_default_model');
        $alias = $this->alias_default_model->get_by_name($alias_name);
        $id = $alias['fid'];


        $this->load->model('post_default_model');
        $this->data['post'] = (array)$this->post_default_model->get_by_id($id);


        $this->data['category'] = (array)$this->category_default_model->get_by_id($this->data['post']['category_id']);


        $post_module = 'project';
        $meta = array();
        $this->data['posts_category'] = $this->post_default_model->get_post_by_category($post_module, $lang, $this->data['post']['category_id'], $meta);






        //RUN VIEW
        $this->template->build('project/post', $this->data);

    }


}