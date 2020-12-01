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
			if($result > 0) {
				$authenticated = true;
				$login_user = $this->CI->user_model->find($result);
				$user_role = $this->CI->user_model->getUserAccessListsId($login_user[0]->user_role_id);
				// echo '<pre>';
				// print_r($user_role);
				// exit();
				$user_login_fullaname = $login_user[0]->firstname.' '.$login_user[0]->lastname;
				$this->CI->session->set_userdata('user_id', $login_user[0]->user_id);
				$this->CI->session->set_userdata('user_fullname', $user_login_fullaname);
				$this->CI->session->set_userdata('user_username', $login_user[0]->username);
				$this->CI->session->set_userdata('user_department', $login_user[0]->department);
				$this->CI->session->set_userdata('user_role', $user_role[0]);
			} else {
				$authenticated = false;
			}
		}
		$this->CI->session->set_userdata('authenticated', $authenticated);
	}

	public function is_authenticated() {
		return $this->CI->session->userdata('authenticated');
	}
}

