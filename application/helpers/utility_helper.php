<?php
/*
|--------------------------------------------------------------------------
| Utilities
|--------------------------------------------------------------------------
| 
|
|
*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('get_list_by_language_id')) {
    /**
     * sort data by language
     * @param $language_id
     * @param $data
     * @param bool $is_get_a_row
     * @return array
     */
    function get_list_by_language_id($language_id, $data, $is_get_a_row = false) {
       $array = array();
       foreach($data as $o) {
           if( $o['language_id'] == $language_id ) {
               if( $is_get_a_row == true ) return $o;
               array_push($array, $o);
           }
       } 
       return $array;
   }
}

if (!function_exists('url_add_params')) {
    /**
     * append param to url
     * @param array $params
     * @param string $url
     * @return string
     */
    function url_add_params($params = array(), $url = '') {
        if(empty($params)) return $url;
    	$url .= '?';
        foreach ($params as $key => $value) {
        	$url .= $key . '=' . $value . '&';
        }
        return substr($url, 0, -1);
    }
}


if (!function_exists('notice')) {
    /**
     * create notice
     * @param $obj
     */
    function notice($obj) {
        $ci =& get_instance();
        $k = 'alert_' . $obj['status'];
        $title = $ci->lang->line($k);
        $n =  "<div class=\"response-msg " . $obj['status'] . " ui-corner-all flash\">
                  <span>" . $title . "</span>
                  " . $obj['message'] . "
              </div>";
        echo $n;  
    }
}


if (!function_exists('short_url')) {
    /**
     * create url
     * @param string $key
     * @param array $params
     * @param bool $return
     * @return string
     */
    function short_url($key = '', $params = array(), $return = false) {
        global $route_params;
        if( empty($key) ) echo '#';
        array_unshift($params, LANGUAGE);
        $pattern = $route_params[LANGUAGE][$key];
        if( $return == true ) return vsprintf($pattern, $params);
        echo vsprintf($pattern, $params);
    }
}


if (!function_exists('config')) {
    /**
     * config
     * @param string $key
     * @param array $params
     * @param bool $return
     * @return string
     */
    function config($key = '') {
        $ci =& get_instance();
        $ci->load->Model('config_admin_model');
        $c = $ci->config_admin_model->get_by_key($key);
        return (count($c) > 0) ? $c['field_value'] : '';
    }
}


/**
 * Clears all cache from the cache directory
 */
if (!function_exists('clear_all_cache')) {
    function clear_all_cache()
    {
        $CI =& get_instance();
        $path = $CI->config->item('cache_path');

        $cache_path = ($path == '') ? APPPATH.'cache/' : $path;

        $handle = opendir($cache_path);
        while (($file = readdir($handle))!== FALSE) 
        {
            //Leave the directory protection alone
            if ($file != '.htaccess' && $file != 'index.html')
            {
               @unlink($cache_path.'/'.$file);
            }
        }
        closedir($handle);
    }
}


/**
 * date format
 */
if (!function_exists('my_date_format')) {
    function my_date_format($date) {
        if(!$date) {
            return;
        }
        $CI =& get_instance();
        $format = $CI->lang->line('date_format');
        $t = strtotime($date);
        echo date($format, $t);
    }
}