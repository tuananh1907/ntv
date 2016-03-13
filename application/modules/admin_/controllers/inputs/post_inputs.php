<?php
require_once APPPATH . "modules/admin/controllers/inputs/inputs.php";
class Post_Inputs extends Inputs {

	public function __construct () {
		parent::__construct();
	}

	public function get_request_params() {
        $module = $this->input->get('mod');
        $highlight = $this->input->get('highlight');
        $highlight = ( !empty($highlight) ) ? $highlight : -1;
        return 	$this->set_param('highlight', $highlight)
        							->set_param('mod', $module)
        						 	->get_params();
	}
}