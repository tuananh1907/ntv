<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Pluggins {

	public function __construct() {
		include(APPPATH . "plugins/admin_product.php");
        /*include(APPPATH . "plugins/admin_product.php");
        include(APPPATH . "plugins/admin_news.php");
        include(APPPATH . "plugins/admin_index_page_slogan.php");*/
	}

}

/* End of file Pluggins.php */