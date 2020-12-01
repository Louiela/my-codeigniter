<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->__user->is_authenticated()) { redirect('secure/login', 'refresh'); exit(); }
	}

	/*
	* index
	*/
	public function index() {
		
		$data = array(
          'pageId' 				=> 'dashboard',
          'title' 				=> 'Dashboard',
        );

    	$this->global_data->templater('dashboard', $data);
	}

}
