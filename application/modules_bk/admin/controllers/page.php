<?php
//REQUIRE
require_once APPPATH . 'modules/admin/controllers/base_admin_controller.php';
require_once APPPATH . "modules/admin/controllers/inputs/post_inputs.php";

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Page extends Base_Admin_Controller
{

    private $languages;
    private $class_view;
    private $url;
    private $params;
    private $data;


    /**
     * CONSTRUCT
     *
     */
    function __construct() {

        parent::__construct();

        //CHECK LOGGED IN
        $this->check_logged_in();

        $this->data = $this->get_data();

        //GET VIEW
        $this->class_view = $this->router->fetch_class() . "/" . $this->router->fetch_method();

        //GET CURENT URL
        $this->url = $this->module_url();

        //GET LANGUAGES
        $this->languages = $this->languages();

        //GET PARAMS
        $this->params = $this->request_params(new Post_inputs);

        //ADD PARAMS TO VIEW
        $this->data['params'] = $this->params;

        $this->load_model();

        $this->load_helper();

        //SET TITLE FOR VIEW
        $this->template->title('Page');
    }


    /**
     * INDEX ACTION
     *
     */
    public function index() {
        //PERMISSION
        $this->page_has_permission('page', VIEW);

        //SELECT
        $select = array('post_id', 'post_title', 'post_order', 'post_status', 'post.language_id', 'post.post_featured_image');
        //FILTER
        $filters = array('post_type' => 'page');
        $filters['post.language_id'] = DEFAULT_LANGUAGE;
        //ORDER
        $orders = array('post_order' => 'asc');

        //PAGINATION
        $page = (int)$this->params['page'];
        $range = (int)$this->params['range'];
        $from = ($page - 1) * $range;

        //DATA TO VIEW
        $this->data['list'] = $this->post_admin_model->list_all_by_paging($select, $filters, $orders, $from, $range, $keyword = $this->params['keyword']);
        $this->data['list_length'] = $this->post_admin_model->get_length( $filters );
        
        //RUN VIEW
        $this->template->build($this->class_view, $this->data);
    }


    /**
     * ADD ACTION
     *
     */
    public function add() {
        //PERMISSION
        $this->page_has_permission('page', ADD);

        //IF SUBMITED
        if (isset($_POST['add'])) {
            //ADD NEW LANG MAP
            $langmap_id = (int)$this->langmap_admin_model->insert(array('langmap_module' => 'page'));

            //GET DATA FROM POST
            $posts = $this->input->post('post');
            $status = 1;
            $highlight = 1;
            $order = $this->input->post('order');
            $featured_image = $this->input->post('featured_image');
            $module = $this->input->post('module');

            foreach ($this->languages as $l) {
                $post = $posts[$l];
                $post['status'] = $status;
                $post['order'] = $order;
                $post['highlight'] = $highlight;
                $post['featured_image'] = $featured_image;
                $post['language_id'] = $l;
                $post['langmap_id'] = $langmap_id;
                $post['module'] = $module;
                $post['category_id'] = 0;
                $post['alias'] = $module;
                $post['type'] = 'page';

                //INSERT POST
                $post_id = $this->post_admin_model->insert($post);
                
                //AFTER POST UPDATE CALLBACK
                $this->pluggable->hook_action('admin_callback_page_after_added', array($this->module_code(), $l, $post_id, $langmap_id));  
            }

            //NOTICE
            $this->session->set_flashdata('notice', array('status' => 'success', 'message' => $this->lang->line('txt_insertsuccess') ));
            
            //BACK TO INDEX
            redirect(url_add_params($this->params, '/admin/page'));
        } else {
            $this->data['languages'] = $this->languages;
            $this->data['list'] = array();

            //GET LIST
            $filters = array('module_menu' => 1);
            $this->data['list'] = $this->module_admin_model->list_all(array(), $filters);

            //RUN VIEW
            $this->template->build($this->class_view, $this->data);
        }
    }


    /**
     * EDIT ACTION
     *
     */
    public function edit() {
        //PERMISSION
        $this->page_has_permission('page', EDIT);

        $this->data['posts'] = array();
        $this->data['languages'] = $this->languages;

        //IF SUBMITED
        if (isset($_POST['update'])) {
            //GET DATA FROM POST
            $posts = $this->input->post('post');
            $status = 1;
            $highlight = 1;
            $order = $this->input->post('order');
            $featured_image = $this->input->post('featured_image');
            $module = $this->input->post('module');

            foreach ($this->languages as $l) {
                $post = $posts[$l];
                $post['status'] = $status;
                $post['order'] = $order;
                $post['highlight'] = $highlight;
                $post['featured_image'] = $featured_image;
                $post['module'] = $module;
                $post['category_id'] = 0;
                $post['alias'] = $module;
                $post['type'] = 'page';

                //UPDATE POST
                $this->post_admin_model->update($post);
                
                //AFTER POST UPDATE CALLBACK
                $this->pluggable->hook_action( 'admin_callback_page_after_updated', array($this->module_code(), $l, $post['id'], $post['langmap_id']));
            }

            //NOTICE
            $this->session->set_flashdata('notice', array('status' => 'success', 'message' => $this->lang->line('txt_updateinfor') ));
            
            //BACK TO INDEX
            redirect(url_add_params($this->params, '/admin/page'));
        } else {
            //GET POSTS TO SHOW
            $id = $this->input->get('id');
            $post = $this->post_admin_model->get_by_id($id);
            $langmap_id = $post->langmap_id;
            $rs = $this->post_admin_model->get_page_by_langmap_id($langmap_id);
            
            foreach ($this->languages as $l) {
                $this->data['posts'][$l] = get_list_by_language_id($l, $rs, true);
            }

            //GET LIST
            $this->data['list'] = $this->module_admin_model->list_all(array(), array('module_menu' => 1));

            //RUN VIEW
            $this->template->build($this->class_view, $this->data);
        }
    }


    /**
     * UPDATE
     *
     */
    public function update() {
        //PERMISSION
        $this->page_has_permission('page', EDIT);

        $type = $this->input->post('type');
        if ($type == 'update') {
            $sorts = $this->input->post('sorts');
            if (count($sorts) > 0) {
                foreach ($sorts as $id => $value) {
                    //GET LANGMAP ID
                    $post = $this->post_admin_model->get_by_id($id);
                    $langmap_id = $post->langmap_id;

                    //UPDATE DATA
                    $args = array('post_order' => intval($value));
                    $this->post_admin_model->update_by_langmap_id($args, $langmap_id);
                }
            }
        } elseif ($type == 'delete') {
            $ids = $this->input->post('ids');
            if (count($ids) > 0) {
                foreach ($ids as $id) {
                    $this->remove($id);
                }
            }
        }
        //NOTICE
        $this->session->set_flashdata('notice', array('status' => 'success', 'message' => $this->lang->line('txt_updateinfor') ));
        
        //BACK TO INDEX
        redirect(url_add_params($this->params, '/admin/page'));
    }


    /**
     * DELETE
     *
     */
    public function delete() {
        //PERMISSION
        $this->page_has_permission('page', DELETE);

        $id = (int)$this->input->get('id');
        $this->remove($id);

        //NOTICE
        $this->session->set_flashdata('notice', array('status' => 'success', 'message' => $this->lang->line('txt_deletesuccess') ));
        
        //BACK TO INDEX
        redirect(url_add_params($this->params, '/admin/page'));
    }


    /**
     * REMOVE
     *
     */
    private function remove($id) {
        //GET LANGMAP ID
        $post = $this->post_admin_model->get_by_id($id);
        $langmap_id = $post->langmap_id;

        //DELETE DATA
        $this->post_admin_model->delete_by_langmap_id($langmap_id);
        
        //DELETE META
        $this->meta_admin_model->delete_by_langmap_id($langmap_id);
        
        //DELETE LANGMAP
        $this->langmap_admin_model->delete($langmap_id);
        
    }


    /**
     * LOAD MODEL
     *
     */
    private function load_model() {
        $this->load->Model("module_admin_model");
        $this->load->Model("post_admin_model");
        $this->load->Model("langmap_admin_model");
        $this->load->Model("meta_admin_model");
    }


    private function load_helper() {
        $this->load->helper('utility');
        $this->load->helper('select');
        $this->load->helper('button');
        $this->load->helper('sort_input');
        $this->load->helper('pagination');
    }
}