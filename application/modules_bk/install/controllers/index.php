<?php
/**
 * Created by PhpStorm.
 * User: Tuan Anh
 * Date: 8/12/15
 * Time: 7:17 AM
 */
require_once APPPATH . 'modules/install/controllers/base_install_controller.php';
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Index extends Base_Install_Controller {
    function __construct(){
        //if i remove this parent::__construct(); the error is gone
        parent::__construct();
    }

    public function index() {
        $data['meta'] = 'ssss';
        $this->template->title('Install Website');
        $this->template->build('index', $data);
    }
}