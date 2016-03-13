<?php
require_once APPPATH . "modules/install/controllers/inputs/inputs.php";
class Module_Inputs extends Inputs {

	private $params;

	public function __construct () {
		parent::__construct();
        $this->params = array(
            "pid" => 0,
            "page" => 1,
            "show" => -1,
            "highlight" => -1,
            "keyword" => ''
        );
	}

	public function get_input_params() {
		$page = $this->input->get('page');
        $pid = $this->input->get('pid');
        $show = $this->input->get('show');
        $highlight = $this->input->get('highlight');
        $keyword = $this->input->get('keyword');

        return 	$this->set_param('page', $page)
                        ->set_param('pid', $pid)
                        ->set_param('show', $show)
                        ->set_param('highlight', $highlight)
                        ->set_param('keyword', $keyword)
                        ->get_params();
	}

	public function set_params($params) {
        $this->params = $params;
    }

    public function get_params() {
        return $this->params;
    }

	public function set_param($key, $value = '') {
        if( !empty($key) && $value != null)
            $this->params[$key] = $value;
        return $this;
    }
}