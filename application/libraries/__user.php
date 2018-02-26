<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class __user {

	private $CI;

	public function __construct() { 
		$this->CI =& get_instance();

	}

	public function signin($username, $password) {
		$authenticated = false;
		$result = $this->CI->user_model->signin($username, $password);
		if($result != null) {
			$authenticated = ($result > 0)? true: false;
		}

		$this->CI->session->set_userdata('authenticated', $authenticated);
	}

	public function is_authenticated() {

		return $this->CI->session->userdata('authenticated');
	}
}
