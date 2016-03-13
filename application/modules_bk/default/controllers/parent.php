<?php 
//REQUIRE
require_once APPPATH . 'modules/default/controllers/core.php';

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Parent_Controller extends Core_Controller {
	
        private $data;

	function __construct() {
                //if i remove this parent::__construct(); the error is gone
                parent::__construct();
                
                
                $this->load_theme();
                $this->load_helper();
                $this->load_lang();
                
                $this->get_ads();
                $this->get_about_list();
                $this->get_products_list();
                $this->get_menu();
                $this->get_breadcrumbs();
                
                $this->data['config'] = $this->load_config();
	}

        private function get_menu() {
                $this->load->Model("post_default_model");
                $this->load->Model("language_default_model");
                $rs = $this->post_default_model->get_pages();
                $languages = $this->language_default_model->list_all();
                foreach($languages as $l) {
                        if($l['language_id'] == LANGUAGE) {
                                $this->data['menu_list']['current'] = get_list_by_language_id($l['language_id'], $rs);
                        }else {
                                $this->data['menu_list']['sub'] = get_list_by_language_id($l['language_id'], $rs); 
                        }    
                }
        }

        protected function get_breadcrumbs() {
                $title = $this->data['menu_list']['current'][0]['post_title'];
                $module = $this->data['menu_list']['current'][0]['post_module'];
                $url = short_url($module, array(), true);
                $this->data['breadcrumbs'] = array();
                array_push($this->data['breadcrumbs'], array('title'=>$title, 'url'=>$url ));
                return $this->data['breadcrumbs']; 
        }

        protected function update_breadcrumbs($module, $alias = '') {
                $l =$this->data['menu_list']['current'];
                for ($i=0; $i < count($l) ; $i++) { 
                        if( $l[$i]['post_module'] == $module ) {
                                $url = ( empty($alias) ) ? '' : short_url($module, array($alias), true);
                                $title = $l[$i]['post_title'];
                                array_push($this->data['breadcrumbs'], array('title'=>$title, 'url'=>$url ));
                                return $this->data['breadcrumbs'];
                        }
                }
                return $this->data['breadcrumbs'];
        }

        private function get_ads() {
                $this->load->Model("media_default_model");
                $this->data['ads'] = $this->media_default_model->get_gallery('ads', LANGUAGE);
        }

        private function get_products_list() {
                $this->load->Model("category_default_model");
                $this->data['products_list'] = $this->category_default_model->get_category('productcat', LANGUAGE);
        }

        private function get_about_list() {
                $this->load->Model("post_default_model");
                $this->data['about_list'] = $this->post_default_model->get_post('about', LANGUAGE); 
        }
        
        private function load_theme() {
                $this->template->set_theme('default_theme');
                $this->template->set_layout('two_col');
                $this->template->set_partial('header','header');
                $this->template->set_partial('sidebar','sidebar');
                $this->template->set_partial('footer','footer');
        }
        
        private function load_helper() {
                $this->load->helper('url');
		$this->load->helper('utility');	
                $this->load->helper('breadcrumbs'); 
	}

        
        protected function get_data() {
                return $this->data;
        }
        
        
}
