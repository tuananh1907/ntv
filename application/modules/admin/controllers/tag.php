<?php
//REQUIRE
require_once APPPATH . 'modules/admin/controllers/base_admin_controller.php';
require_once APPPATH . "modules/admin/controllers/inputs/category_inputs.php";

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Tag extends Base_Admin_Controller
{

    private $module;
    private $languages;
    private $class_view;
    private $url;
    private $params;
    private $data;
    private $category;

    /**
     * CONSTRUCT
     *
     */
    function __construct()
    {

        parent::__construct();

        //CHECK LOGGED IN
        $this->check_logged_in();

        $this->data = $this->get_data();

        $this->module = array();

        //GET VIEW
        $this->class_view = $this->router->fetch_class() . "/" . $this->router->fetch_method();

        //GET CURENT URL
        $this->url = $this->module_url();

        //GET LANGUAGES
        $this->languages = $this->languages();

        //GET PARAMS
        $this->params = $this->request_params(new Category_inputs);

        //ADD PARAMS TO VIEW
        $this->data['params'] = $this->params;

        //GET MODULE
        $this->module = $this->module();

        //CATEGORY
        //$this->get_category();

        //LOAD MODEL
        $this->load_model();


        //LOAD HELPER
        //$this->load_helper();

        //SET TITLE FOR VIEW
        $this->template->title((!empty($this->module->module_name)) ? $this->module->module_name : 'Post');
    }

    public function add()
    {
        if (isset($_POST['add'])) {
            //ADD NEW LANG MAP
            $langmap_id = (int)$this->langmap_admin_model->insert( array('langmap_module' => $this->module_code() ) );
            foreach ($this->languages as $l) {
                $data = array(
                    'language_id' => $l,
                    'title' => $_POST['tag'][$l]['title'],
                    'status' => $_POST['status'],
                    'module' => $this->module_code(),
                    'langmap_id'=>$langmap_id
                );
                $this->tag_admin_model->insert($data);
            }
        }
        else
        {
            $this->data['languages'] = $this->languages;
            $this->template->build('tag/add', $this->data);

        }


    }

    public function edit()
    {
        $this->data['languages'] = $this->languages;

        $id = $this->input->get('id');
        $tag = $this->tag_admin_model->get_by_id($id);
        $langmap_id = $tag['langmap_id'];
        $rs = $this->tag_admin_model->get_tag_by_langmap_id($langmap_id);

        foreach($this->languages as $l) {
            $this->data['tags'][$l] = get_list_by_language_id($l, $rs, true);

        }
        $this->template->build('tag/edit', $this->data);



        if ( isset($_POST['update']) ) {

            foreach ($this->languages as $l) {
                $id = $_POST['tag'][$l]['id'];
                $data = array
                (
                    'language_id' => $l,
                    'title' => $_POST['tag'][$l]['title'],
                    'status' => $_POST['status'],
                    'module' => $this->module_code(),
                    'langmap_id'=> $langmap_id
                );

                $this->tag_admin_model->update($id, $data);


            }


        }

        //Lay cai id xuong
        //Tim duoc tag tuong ung theo id
        //lay cai langmap_id ra
        //vo tag_admin_model viet 1 ham get_tag_by_langmap_id



    }


    private function load_model() {
        $this->load->model("tag_admin_model");
        $this->load->model('langmap_admin_model');
    }
}