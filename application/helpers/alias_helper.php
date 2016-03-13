<?php
/*
|--------------------------------------------------------------------------
| create alias
|--------------------------------------------------------------------------
| 
|
|
*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('alias')) {
    /**
     * create alias form string
     * @param $str
     * @return string
     */
    function alias($str) {
		$str = preg_replace('/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
		$str = preg_replace('/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
		$str = preg_replace('/(Ì|Í|Ị|Ỉ|Ĩ|ì|í|ị|ỉ|ĩ)/', 'i', $str);
		$str = preg_replace('/(Ơ|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
		$str = preg_replace('/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
		$str = preg_replace('/(Ỳ|Ý|Ỵ|Ỷ|Ỹ|ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
		$str = preg_replace('/(Ç|ç)/', 'c', $str);
		$str = preg_replace('/(Đ|đ)/', 'd', $str);
		$str = preg_replace('/(Ñ|ñ)/', 'n', $str);
		
		$str = preg_replace('/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_|\“|\”|\…/', '-', $str); 
		$str = preg_replace('/-+-/', '-', $str);
		$str = preg_replace('/^\-+|\-+$/', '', $str);
		$str = preg_replace('/[^a-zA-Z0-9 -]/', '', $str);
		
		return strtolower($str);
    }
}
