<?php
/**
 * Created by PhpStorm.
 * User: Tuan Anh
 * Date: 8/12/15
 * Time: 7:17 AM
 */
require_once APPPATH . 'modules/install/controllers/base_install_controller.php';
require_once APPPATH . "modules/install/controllers/inputs/module_inputs.php";

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Module extends Base_Install_Controller {

    private $module;
    private $url;
    private $params;
     
    function __construct(){
        parent::__construct();
        $this->load->helper('utility');
        
        $this->module = 'module';
        $this->url = '/install/module';
    }

    public function index() {
        $this->load->Model("module_install_model");
        $this->load->helper('select');
        $this->load->helper('button');
        $this->load->helper('sort_input');

        //GET PARAMS
        $this->params = $this->create_input_params( new Module_inputs );
        
        $select = array('module_id', 'module_name', 'module_code', 'module_link', 'module_order', 'module_status', 'module_menu', 'module_level');

        //$filters = array('module_parent' => (int)$this->params['pid']);
        $filters = array();
        if((int)$this->params['show'] != -1) {
            $filters['module_status'] = (int)$this->params['show'];
        }
        $orders = array('module_order' => 'asc');

        $page = (int)$this->params['page'];
        $from = ($page - 1) * 20;
        $to = 20;
        
    	//DATA TO VIEW
    	$data['params'] = $this->params;
        $data['list'] = $this->module_install_model->list_all_by_paging($select, $filters, $orders, $from, $to, $keyword = '');
        $data['list_parent'] = $this->module_install_model->list_all(array('module_id', 'module_name', 'module_level', 'module_parent'));
        $data['url'] = $this->url;
        
        //ACTION FROM TABLE
        if ( isset($_POST['type']) && $_POST['type'] == 'delete' ) { 
            $this->delete();
        }else if ( isset($_POST['type']) && $_POST['type'] == 'update' ) {
            $this->update();
        }
        
        $this->template->title('Module');
        $this->template->build('module/index', $data);
    }

    public function add() {
        $this->load->Model("module_install_model");
        
        if ( isset($_POST['add']) ) {
            $module_code = $this->input->post('module_code');
            $module_name = $this->input->post('module_name');
            $module_link = $this->input->post('module_link');
            $module_parent  = (int)$this->input->post('module_parent'); 
            $module_option  = json_encode($this->input->post('module_option')); 
            $module_status  = (int)$this->input->post('module_status');
            $module_order  = (int)$this->input->post('module_order'); 
            $module_menu  = (int)$this->input->post('module_menu'); 
            $module_level = '';
            
            $data = array(
                'module_code' => $module_code,
                'module_name' => $module_name,
                'module_link' => $module_link,
                'module_parent' => $module_parent,
                'module_option' => $module_option,
                'module_status' => $module_status,
                'module_order' => $module_order,
                'module_level' => $module_level,
                'module_menu' => $module_menu
            );
            $result = $this->module_install_model->upsert_with_custom_data($data);
            redirect('/install/module');
        }else {
            $this->load->helper('select');

            $data['list_parent'] = $this->module_install_model->list_all(array('module_id', 'module_name', 'module_level', 'module_parent'));
            $data['list_children'] = array();
            foreach($data['list_parent'] as $c) {
                if( $c['module_parent'] != 0 ) {
                    array_push($data['list_children'], $c['module_id']);
                }
            }
            $this->template->title('Module');
            $this->template->build('module/add', $data);
        }
    }

    public function edit() {
        $this->load->Model("module_install_model");
        $id = $this->input->get('id');
        if ( isset($_POST['edit']) ) {
            $module_code = $this->input->post('module_code');
            $module_name = $this->input->post('module_name');
            $module_link = $this->input->post('module_link');
            $module_parent  = (int)$this->input->post('module_parent'); 
            $module_option  = json_encode($this->input->post('module_option')); 
            $module_status  = (int)$this->input->post('module_status');
            $module_order  = (int)$this->input->post('module_order'); 
            $module_menu  = (int)$this->input->post('module_menu'); 
            $module_level = '';
            
            $data = array(
                'module_id' => $id,
                'module_code' => $module_code,
                'module_name' => $module_name,
                'module_link' => $module_link,
                'module_parent' => $module_parent,
                'module_option' => $module_option,
                'module_status' => $module_status,
                'module_order' => $module_order,
                'module_level' => $module_level,
                'module_menu' => $module_menu
            );
            $result = $this->module_install_model->upsert_with_custom_data($data);
            redirect('/install/module');
        }else {
            $this->load->helper('select');
            $data['module'] = (array)$this->module_install_model->get_by_id($id);
            $data['list_parent'] = $this->module_install_model->list_all(array('module_id', 'module_name', 'module_level', 'module_parent'));
            $data['list_children'] = array();
            foreach($data['list_parent'] as $c) {
                if( $c['module_parent'] != 0 ) {
                    array_push($data['list_children'], $c['module_id']);
                }
            }
            $this->template->title('Module');
            $this->template->build('module/edit', $data);
        }
    }

    public function delete() {
        $this->load->Model("module_install_model");

        $ids = array();
        $sort = array();
        
        $ids = $this->input->post('ids');
        $sort = $this->input->post('sort');
        
        _pr($ids);
        _pr($sort, true);
    }

    public function update() {
        $this->load->Model("module_install_model");
        $sort = array();
        $sort = $this->input->post('sort');
        $data = array();
        foreach ($sort as $id => $value) {
            array_push($data, array('module_id' => $id, 'module_order' => $value));
        } 
        $this->module_install_model->update_rows($data);
        redirect('/install/module');
    }
    
    public function status() {
        
    }
}