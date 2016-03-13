<?php 
require_once APPPATH . 'models/module_model.php';
class Module_Admin_Model extends Module_Model {
 
    public function __construct() {
        parent::__construct();
    }
 
    public function get_list() {
        $list = $this->list_all(array(), array('module_status'=>1), array('module_order' => 'asc'));
        return $this->map_list($list);
    }
    
    private function map_list($list) {
        $rs = array();
        for($i = 0 ; $i<count($list); $i++) {
            if($list[$i]['module_parent'] == 0) {
                $list[$i]['children'] = array();
                foreach($list as $l) {
                    if($l['module_parent'] == $list[$i]['module_id']) {
                        array_push($list[$i]['children'], $l);
                    }
                }
                array_push($rs, $list[$i]);
            }
        }
        return $rs;
    }
}