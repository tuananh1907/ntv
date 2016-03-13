<?php
/*
|--------------------------------------------------------------------------
| resize
|--------------------------------------------------------------------------
| 
|
|
*/
include("./vendor/mews/thumb/src/Mews/Thumb/lib/ThumbLib.inc.php");
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('resize')) {
    /**
     * resize image
     * @param $path
     * @return prefix
     */
    function resize($path, $prf = '', $size = array()) {
    	$fileName 	= '.' . $path;
    	$name = end(explode('/', $path));
    	
    	try {
    		$thumb 		= PhpThumbFactory::create($fileName);

			$thumb->resize($size[0],$size[1]);
			$newPath = './upload/files/thumb/' .  $prf . $name;
			$thumb->save($newPath);
			return $newPath;
    	}
    	catch(Exception $e) {
    		return false;
    	}
    }
}