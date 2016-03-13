<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Pluggable {

		public function __construct() {}

    public function hook_action($event, $args) {
    	global $action_events;
    	if( isset($action_events[$event]) ) {
    		foreach($action_events[$event] as $func) {
    			if(!function_exists($func)) {
	                die('Unknown function: '.$func);
	            } else {
	                call_user_func_array($func, $args);
	            }
    		}
    	}
    }


    public function register_action($event, $func) {
		    global $action_events;
		    $action_events[$event][] = $func;
		}


}

/* End of file Pluggable.php */