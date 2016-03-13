<?php
/*
|--------------------------------------------------------------------------
| my custom Select
|--------------------------------------------------------------------------
|
| @param	  array	    $data		meta data
| @param	  array	    $keywords	Giving keyname of field need to use in data array include: title, value, parent, level
| @param	  array	    $selected	List of variables are selected
| @param	  array	    $no_choice	Custom for first option
| @param	  array	    $attributes	List of select attributes. Include: name, id, class, size etc
| @return	  string
|
*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('my_select')) {
    /**
     * create select
     * @param array $data
     * @param array $keywords
     * @param array $attributes
     * @param array $selected
     * @param array $no_choice
     * @param array $exception
     */
    function my_select($data = array(), 
                        $keywords = array(), 
                        $attributes = array(),
                        $selected = array(),
    					$no_choice = array(),
    					$exception = array()
    					) 
    {
        $html = '<select ';
        foreach ($attributes as $a => $v) {
            $html .= "$a='$v' "; 
        }
        $html .=' >';
        
        if(!empty($no_choice) && is_array($no_choice)) {
            $a = ( empty($selected) || in_array($no_choice['value'], $selected) ) ? 'selected' : '';
            $html .= '<option ' . $a . ' value=\'' . $no_choice['value'] . '\'>' . $no_choice['title'] . '</option>';
        }
        
        foreach ($data as $k => $d) {
            if( (!empty($keywords['parent']) && (int)$d[$keywords['parent']] == 0) || empty($keywords['parent']) )
            {
                $level = ( !empty($keywords['level']) ) ? $d[$keywords['level']] : '';
                $selectedAttr = (in_array($d[$keywords['value']], $selected)) ? 'selected' : '';
                $disableAttr = (in_array($d[$keywords['value']], $exception)) ? 'disabled' : '';
                
            	$html .= '<option ' . $selectedAttr . ' ' . $disableAttr .  ' value=\'' . $d[$keywords['value']] . '\'>' ;
            	$html .= $level . $d[$keywords['title']] ;
            	$html .= '</option>';
            
                if( !empty($keywords['parent']) ){
                    $html .= create_options($data, $keywords, $selected, (int)$d[$keywords['value']], '', $exception);
                }
            }
        }
        $html .= '</select>';
        echo $html;
    }


    function create_options($data, $keywords, $selected, $parent_id, $l, $exception) {
        $html = '';
        $l .= '&nbsp;&nbsp;&nbsp;'; 
        $child_array = array();
        foreach ($data as $k => $c) {
            if( $c[$keywords['parent']] == $parent_id ) {
                array_push($child_array, $c);
            }
        }
        
        if( count($child_array) <= 0 ) return $html;

        foreach ($child_array as $k => $child) {
            $level = ( !empty($keywords['level']) ) ? $child[$keywords['level']] : '';
            $selectedAttr = (in_array($child[$keywords['value']], $selected)) ? 'selected' : '';
            $disableAttr = (in_array($child[$keywords['value']], $exception)) ? 'disabled' : '';

            $html .= '<option ' . $selectedAttr . ' ' . $disableAttr . ' value=\'' . $child[$keywords['value']] . '\'>';
            $html .=  $l  . '|' . $child[$keywords['level']] . '&nbsp;' . $child[$keywords['title']];
            $html .= '</option>'; 

            if( !empty($keywords['parent']) ){
                $html .= create_options($data, $keywords, $selected, (int)$child[$keywords['value']], $l, $exception);
            }
        }
        return $html;
    }

}
