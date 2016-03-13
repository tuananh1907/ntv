<?php
/**
 * Created by PhpStorm.
 * User: Tuan Anh
 * Date: 8/12/15
 * Time: 7:17 AM
 */
require_once APPPATH . 'modules/install/controllers/base_install_controller.php';
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Language extends Base_Install_Controller {
    function __construct(){
        //if i remove this parent::__construct(); the error is gone
        parent::__construct();
    }

    public function index() {
    	$this->load->Model("language_install_model");
        $data['list'] = $this->language_install_model->list_all();
        
        $params = array();
        if ( isset($_POST['delete']) ) { 
            $params = $this->input->post();
            $this->delete($params);
        }else if( isset($_POST['update']) ) {
            $params = $this->input->post();
            $this->update($params);
        }

        $this->template->title('Language');
        $this->template->build('language/index', $data);
    }

    public function add() {
        $this->load->Model("language_install_model");
        $this->template->title('Language');
        $this->template->build('language/add');
        if ( isset($_POST['add']) ) {
            $language_id = $this->input->post('language_id', null);
            $data = array(
                'language_id' => $language_id,
                'language_default' => 0
            );
            $result = $this->language_install_model->upsert($data);
            redirect('/install/language');
        }
    }

    public function edit() {

    }

    public function delete($params) {
        if(empty($params)) return;
        print_r($params); die();
        
    }

    public function update($params) {
        if(empty($params)) return;
        print_r($params); die();
    }
}