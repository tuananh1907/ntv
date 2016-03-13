<?php
/*
|--------------------------------------------------------------------------
| Debug
|--------------------------------------------------------------------------
| Make easy debuging
|
|
*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('_pr')) {
    function _pr($data, $flag = FALSE) {
       echo "<pre>";
       print_r($data);
       echo "</pre>";
       if ($flag)
          die;
   }
}

if (!function_exists('_last_query')) {
     function _last_query($stop = FALSE) {
         $CI = & get_instance();
         _pr($CI->db->last_query(), $stop);
    }
}
