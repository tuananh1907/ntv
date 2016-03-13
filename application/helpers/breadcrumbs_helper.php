<?php
/*
|--------------------------------------------------------------------------
| create breadcrumbs
|--------------------------------------------------------------------------
| 
|
|
*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('breadcrumbs')) {
    /**
     * create breadcrumbs form string
     * @param $str
     * @return string
     */
    function breadcrumbs($list, $class='') {
    	$string = '<ul class=\'' . $class . '\'>';
		for ($i = 0; $i < count($list); $i++) {
			$b = ($i == count($list)-1) ? '':'&gt;';
			if( !empty($list[$i]['url']) ) {
				$string .= '<li>' . '<a href=\'' . $list[$i]['url'] . '\'>' . $list[$i]['title'] . '</a>&nbsp;' . $b . '&nbsp;</li>';
			}else {
				$string .= '<li>' . $list[$i]['title'] . '&nbsp;' . $b . '&nbsp;</li>';
			}
		}
		$string .= '</ul>';
		echo $string;
    }
}
