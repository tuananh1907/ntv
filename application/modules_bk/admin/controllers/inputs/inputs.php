<?php
abstract class Inputs extends MX_Controller {
	
	
	private $params;
	
    public abstract function get_request_params();
    
	public function __construct () {
		parent::__construct();
        $this->params = array(
            "pid" => 0,
            "page" => 1,
            "show" => -1,
            "keyword" => '',
            "range" => 10
        );
        
        $page = $this->input->get('page');
        $pid = $this->input->get('pid');
        $show = $this->input->get('show');
        $keyword = $this->input->get('keyword');
        $range = $this->input->get('range');

        return 	$this->set_param('page', $page)
                        ->set_param('pid', $pid)
                        ->set_param('show', $show)
                        ->set_param('keyword', $keyword)
                        ->set_param('range', $range)
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