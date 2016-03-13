<?php
require_once APPPATH . "modules/admin/controllers/inputs/inputs.php";
class Category_Inputs extends Inputs {

	public function __construct () {
		parent::__construct();
	}

	public function get_request_params() {
        $module = $this->input->get('mod');
        return 	$this->set_param('mod', $module)
                     ->get_params();
	}
}