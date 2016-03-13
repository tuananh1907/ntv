<?php
/**
 * Created by PhpStorm.
 * User: Tuan Anh
 * Date: 8/12/15
 * Time: 7:17 AM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Base_Install_Controller extends MX_Controller {

    function __construct(){
        parent::__construct();
        $this->template->set_theme('admin_theme');
        $this->template->set_layout('one_col');
        $this->template->set_partial('header','header');
        $this->template->set_partial('footer','footer');
        $this->lang->load(ADMIN_LANGUAGE, ADMIN_LANGUAGE);
        $this->load->helper('url');
    }

    public function create_input_params($inputs) {
        return $inputs->get_input_params();
    }

}