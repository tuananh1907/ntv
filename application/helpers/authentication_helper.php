<?php
/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
| 
|
|
*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('check_permission')) {
    /**
     * check permission
     * @param $module
     * @param $permission
     * @return bool|int
     */
    function check_permission($module, $permission){
        $CI = & get_instance();
        $user = $CI->session->userdata('user_entity');
        $permissions = $user['permission'];
        if( isset($permissions[$module]) ) {
            $module_permission = $permissions[$module];
            return ($module_permission & $permission);
        }
        return false;
    }
}




