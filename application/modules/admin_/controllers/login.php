<?php
//REQUIRE
require_once APPPATH . 'modules/admin/controllers/base_admin_controller.php';

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends Base_Admin_Controller {
    
    
    /**
     * CONSTRUCT 
     * 
     */
    function __construct(){
        
        parent::__construct();
        
        //LOAD THEME
        $this->load_theme();
        
        //LOAD MODEL
        $this->load_model();
    }
    
    
    
    /**
     * INDEX ACTION 
     * 
     */
    public function index () {
        if( isset($_POST['login']) ) {
            $username = strip_tags( $this->input->post('wl-username') );
            $password = strip_tags( $this->input->post('wl-password') );
            $password = md5( $password . ENCRYPTION_KEY );
            $user = $this->user_admin_model->login( $username, $password );
            if( $user == false ) {
                //NOTICE
                $this->session->set_flashdata( 'notice', array('status'=>'error', 'message'=> $this->lang->line('login_error') ) );
                //RUN VIEW
                redirect ('/admin/login', 'refresh');
            }else {
                $group_id = $user['group_id'];
                $group = $this->group_admin_model->get_by_id($group_id);
                $user['permission'] = json_decode($group['group_permission'], true);
                $this->session->set_userdata('user_entity', $user);
                //RUN VIEW
                redirect ('/admin/index', 'refresh');
            }
        }
        $this->template->build('login/index');
    }
    
    
    public function logout() {
        if( $this->session->userdata('user_entity') ) {
            $this->session->unset_userdata('user_entity');
        }
        //RUN VIEW
        redirect ('/admin/login', 'refresh');
    }
    /**
     *  LOAD THEME 
     * 
     */
    private function load_theme() {
        $this->template->set_theme('admin_theme');
        $this->template->set_layout('login');
        $this->template->set_partial('login_header','login_header');
        $this->template->set_partial('login_footer','login_footer');
    }
    
    
    
    /**
     *  LOAD MODEL 
     * 
     */
    private function load_model() {
        $this->load->Model("user_admin_model");
        $this->load->Model("group_admin_model");
    }
    
    
}