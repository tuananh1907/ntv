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

if (!function_exists('my_select_range')) {
    /**
     * create range
     * @param array $attributes
     * @param int $val
     */
    function my_select_range($attributes = array(), $val = 0) {
        $html = 'show<select ';
        foreach ($attributes as $a => $v) {
            $html .= "$a='$v' "; 
        }
        $html .=' >';  
        
        for($i = 10; $i<=50; $i = $i + 10) {
            $selected = ( (int)$val == $i ) ? "selected" : "";
            $html.="<option $selected value=\"$i\">$i</option>";
        }
        
       $html.="</select>entries";
       
       echo $html;
   }
}

if (!function_exists('my_pagination')) {
    /**
     * create pagination
     * @param int $num_rows
     * @param int $page
     * @param int $range
     * @param string $url
     * @param array $keywords
     */
    function my_pagination($num_rows = 0, $page = 1, $range = 10, $url = '', $keywords = array('unit' => 'pages')) {
        
        $pages = ceil( $num_rows / $range );
        $previous = $page - 1;
        $previous = ($previous > 1) ? $previous : 1;
        
        $next = $page + 1;
        $next = ($next < $pages) ? $next : $pages;
        echo "<div class=\"dataTables_info\" id=\"dynamic_info\">";
        echo $page . "/" . $pages . " " .  $keywords['unit'];
        echo "</div>";
        echo "<div class=\"dataTables_paginate paging_full_numbers\" id=\"dynamic_paginate\" data-href='$url'>";
        echo "<a tabindex=\"1\" class=\"first paginate_button paginate_button_disabled\" id=\"dynamic_first\">&laquo;</a>";
		echo "<a tabindex=\"" . $previous . "\" class=\"previous paginate_button paginate_button_disabled\" id=\"dynamic_previous\">&lt;</a>";
		echo "<span>";
		echo "<a tabindex=\"" . $page . "\" class=\"paginate_active\">$page</a>";
		echo "</span>";
		echo "<a tabindex=\"" . $next . "\" class=\"next paginate_button\" id=\"dynamic_next\">&gt;</a>";
		echo "<a tabindex=\"" . $pages . "\" class=\"last paginate_button\" id=\"dynamic_last\">&raquo;</a>";
        echo "</div>";
   }
}
