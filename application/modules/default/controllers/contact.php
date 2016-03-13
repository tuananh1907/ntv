<?php 
//REQUIRE
require_once APPPATH . 'modules/default/controllers/parent.php';

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contact extends Parent_Controller {
	private $data;

	 function __construct() {
        //if i remove this parent::__construct(); the error is gone
        parent::__construct();
        $this->data = $this->get_data();
//        $this->data['breadcrumbs'] = $this->update_breadcrumbs('contact');
	}
	
	public function index() {
		$this->load->library('session');
		$this->load->Model("post_default_model");
		$this->load->library('email');

		//SEND MAIL
        if( isset($_POST['send']) ) {
        	$name = stripslashes( $this->input->post('name') );
        	$email = stripslashes( $this->input->post('email') );
        	//$tel  = stripslashes( $this->input->post('txtTel') );
        	//$company  = stripslashes( $this->input->post('txtCompany') );
        	$content  = stripslashes( $this->input->post('title') );

        	$htmlContent = 'Name : ' . $name . '<br>';
        	$htmlContent .= 'Email : ' . $email . '<br>';
        	//$htmlContent .= 'Tel : ' . $tel . '<br>';
        	//$htmlContent .= 'Company : ' . $company . '<br>';
        	$htmlContent .= 'Content :<br> ' . $content;

        	$this->send_mail($name, $htmlContent);

        }

		$page = $this->post_default_model->get_page('contact', LANGUAGE);
		$this->data['page'] = $page;

		//SEO
		/*$this->data['seo_title'] = $page['post_seo_title'];
		$this->data['seo_description'] = $page['post_seo_description'];
		$this->data['seo_keywords'] = $page['post_seo_keywords'];*/

        //RUN VIEW
        $this->template->build( 'contact/index', $this->data);

        //CACHING
        //$this->output->cache(CACHE_TIME);
	}


	private function send_mail($name, $htmlContent) {
		$this->load->library('email');

		$this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => $this->data['config']['_smtp_'],/*'ssl://smtp.googlemail.com'*///ssl:465 , tsl:587,25
		  'smtp_user' => $this->data['config']['_smtp_account_'],
		  'smtp_pass' => $this->data['config']['_smtp_password_'],
		  'smtp_port' => $this->data['config']['_port_'],
		  'crlf' => "\r\n",
		  'newline' => "\r\n",
		  'mailtype'  => 'html',
	      'charset' => 'utf-8',
	      'wordwrap' => TRUE
		));

		$this->email->from($this->data['config']['_smtp_sender_'], $this->data['config']['_smtp_name_sender_']);
		$this->email->reply_to($this->data['config']['_smtp_sender_'], $this->data['config']['_smtp_name_sender_']);
		$this->email->to($this->data['config']['_smtp_receiver_']);

		$this->email->subject($this->data['config']['_email_subject_']);
		$this->email->message($htmlContent);

		if($this->email->send()) {
	       	$this->session->set_flashdata( 'notice', $this->lang->line('send_mail_success') );
	       	$this->back_to_page();
	    }else {
	    	$this->session->set_flashdata( 'notice', $this->lang->line('send_mail_failure') );
	    	$this->back_to_page();
	    }



	}


	private function back_to_page() {
		$url = short_url('contact', array(), true );
        $url = substr($url, 1, strlen($url));
        $url = base_url() . $url;
        redirect( $url );
	}
}
