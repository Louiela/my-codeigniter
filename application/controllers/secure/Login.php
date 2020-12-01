<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->session->sess_destroy();
	}

	public function index() {
		$template = 'login/index';
		$data[] = '';
		/*$this->parser->parse(
				$template, 
				$this->__getglobal->data_default($data)
			);*/
		//print_r($msg); die();
		$this->load->view('login/index');
	}

}

