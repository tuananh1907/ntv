<?php
require_once APPPATH . "modules/admin/controllers/inputs/inputs.php";
class Group_Inputs extends Inputs {

    private $params;
    
	public function __construct () {
		parent::__construct();
		$this->params = array(
		        "pid" => 0,
            "page" => 1,
            "keyword" => '',
            "range" => 10
        );
		
		    $page = $this->input->get('page');
        $keyword = $this->input->get('keyword');
        $range = $this->input->get('range');
        $pid = $this->input->get('pid');

        return 	$this->set_param('page', $page)
                        ->set_param('keyword', $keyword)
                        ->set_param('range', $range)
                        ->set_param('pid', $pid)
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

	public function get_request_params() {
        return 	$this->get_params();
	}
}