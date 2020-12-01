<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->__user->is_authenticated()) { redirect('secure/login', 'refresh'); exit(); }
	}

	/*
	* index
	*/
	public function index() {
		$result = $this->user_model->findall();
		// $user_access_lists = $this->user_model->getUserAccessLists();
		// $role_key = array();
		// foreach ($user_access_lists as $item) {
		// 	$role_key[$item->user_role_id] = $item->role_type;
		// }

		$data = array(
          'pageId' 			=> 'users-list',
          'title' 			=> 'Users',
          'users' 			=> $result
        );

    	$this->global_data->templater('users/all', $data);
	}

	/*
	* Page add user
	*/
	public function add() {
		$data = array(
			'pageId' 			=> 'users-add',
        	'title' 			=> 'Add User',
        	'department_lists' 	=> $this->user_model->getDepartmentLists(),
        	'user_access_lists' => $this->user_model->getUserAccessLists()
        );

    	$this->global_data->templater('users/add', $data);
	}

	/*
	* Page edit user
	*/
	public function edit() {
		$userid = $this->uri->segment(3);
		$result = $this->user_model->findbyid(array($userid));
		if($userid) {
			$data = array(
				'pageId' 			=> 'users-edit',
				'user'				=> $result,
				'id'				=> $userid,
		    	'title' 			=> 'Update User Information',
        		'department_lists' 	=> $this->user_model->getDepartmentLists(),
        		'user_access_lists' => $this->user_model->getUserAccessListsName()
		    );

			$this->global_data->templater('users/edit', $data);	
		} else {
			redirect('/users', 'refresh');
		}
		
	}

	/*
	* Action create user
	*/
	public function create() {

		$pwd = $this->input->post('password');
		$cpassword = $this->input->post('cpassword');

		if ($pwd == $cpassword) {
			$usr = $this->input->post('username');
			$fname = $this->input->post('firstname');
			$lname = $this->input->post('lastname');
			$email = $this->input->post('email');
			$department = $this->input->post('department');
			$user_role = $this->input->post('user_role');
			$result = $this->user_model->create($usr, $pwd, $fname, $lname, $email, $department, $user_role);

   			$msg = ($result['id'])?'success':'warning';
    		if ($result['id']) {
				redirect('/users', 'refresh');
    		}else{
    			$this->session->set_flashdata('add_user_msg', $msg);
				redirect('/users/add', 'refresh');
    		}

		}else{			
    		$this->session->set_flashdata('password_msg', 'Password and confirm password are not match!');
			redirect('/users/add', 'refresh');
		}
	}

	/*
	* Action update user info
	*/
	public function update() {
		$userid = $this->input->post('userid');
		$usr = $this->input->post('username');
		$npwd = $this->input->post('npassword');
		$fname = $this->input->post('firstname');
		$lname = $this->input->post('lastname');
		$email = $this->input->post('email');
		$department = $this->input->post('department');
		$user_role = $this->input->post('user_role');
		$result = $this->user_model->update($usr, $fname, $lname, $email, $department, $user_role, $userid);
		if($npwd != "") {
			$updatePassword = $this->user_model->updatePassword($userid, $npwd);
		}
		redirect('/users', 'refresh');
	}

	/*
	* Action
	*/
	public function delete() {
		$userid = $this->input->post('userid');
		$result = $this->user_model->delete($userid);

		redirect('/users', 'refresh');
	}

	/*User Roles*/
	public function roles(){
		$result = $this->user_model->allroles();
		$data = array(
			'pageId' 			=> 'users-rule',
			'title' 			=> 'User Roles',        
			'data' 				=> $result,
		);		
    	$this->global_data->templater('users/roles', $data);
	}

	public function addroles(){
		$data = array(
			'pageId' 			=> 'add-users-role',
			'title' 			=> 'Create User Roles',        
		);

    	$this->global_data->templater('users/add_roles', $data);
	}


	public function updateroles($user_role_id){
		$result = $this->user_model->findroles(array($user_role_id));
		$data = array(
			'pageId' 			=> 'update-users-role',
			'title' 			=> 'Update User Role',   
			'data' 				=> $result     
		);

    	$this->global_data->templater('users/update_roles', $data);
	}

	public function createrole(){
		$roles_array = array(
			'user_role_name' 			=> isset($_POST['role_name']) ? $_POST['role_name'] : 0,
			'recipient_all' 			=> isset($_POST['recipient_all']) ? $_POST['recipient_all'] : 0,
			'recipient_monthly' 		=> isset($_POST['recipient_monthly']) ? $_POST['recipient_monthly'] : 0,
			'recipient_add' 			=> isset($_POST['recipient_add']) ? $_POST['recipient_add'] : 0,
			'recipient_update' 			=> isset($_POST['recipient_update']) ? $_POST['recipient_update'] : 0,
			'recipient_request' 		=> isset($_POST['recipient_request']) ? $_POST['recipient_request'] : 0,
			'recipient_approverequest' 	=> isset($_POST['recipient_approverequest']) ? $_POST['recipient_approverequest'] : 0,
			'recipient_archived' 		=> isset($_POST['recipient_archived']) ? $_POST['recipient_archived'] : 0,
			'maps' 						=> isset($_POST['maps']) ? $_POST['maps'] : 0,
			'package' 					=> isset($_POST['package']) ? $_POST['package'] : 0,
			'package_add' 				=> isset($_POST['package_add']) ? $_POST['package_add'] : 0,
			'package_update' 			=> isset($_POST['package_update']) ? $_POST['package_update'] : 0,
			'package_delete' 			=> isset($_POST['package_delete']) ? $_POST['package_delete'] : 0,
			'orders' 					=> isset($_POST['orders']) ? $_POST['orders'] : 0,
			'orders_add' 				=> isset($_POST['orders_add']) ? $_POST['orders_add'] : 0,
			'orders_update' 			=> isset($_POST['orders_update']) ? $_POST['orders_update'] : 0,
			'deploy_update' 			=> isset($_POST['deploy_update']) ? $_POST['deploy_update'] : 0,
			'deploy_add' 				=> isset($_POST['deploy_add']) ? $_POST['deploy_add'] : 0,
			'courier' 					=> isset($_POST['courier']) ? $_POST['courier'] : 0,
			'courier_add' 				=> isset($_POST['courier_add']) ? $_POST['courier_add'] : 0,
			'courier_update' 			=> isset($_POST['courier_update']) ? $_POST['courier_update'] : 0,
			'report_recipient' 			=> isset($_POST['report_recipient']) ? $_POST['report_recipient'] : 0,
			'report_recipient_print' 	=> isset($_POST['report_recipient_print']) ? $_POST['report_recipient_print'] : 0,
			'report_barangay' 			=> isset($_POST['report_barangay']) ? $_POST['report_barangay'] : 0,
			'report_barangay_report' 	=> isset($_POST['report_barangay_report']) ? $_POST['report_barangay_report'] : 0,
			'report_courier' 			=> isset($_POST['report_courier']) ? $_POST['report_courier'] : 0,
			'report_courier_print' 		=> isset($_POST['report_courier_print']) ? $_POST['report_courier_print'] : 0,
			'users' 					=> isset($_POST['users']) ? $_POST['users'] : 0,
			'users_add' 				=> isset($_POST['users_add']) ? $_POST['users_add'] : 0,
			'users_update' 				=> isset($_POST['users_update']) ? $_POST['users_update'] : 0,
			'user_role' 				=> isset($_POST['user_role']) ? $_POST['user_role'] : 0,
			'api' 						=> isset($_POST['api']) ? $_POST['api'] : 0,
			'import_export' 			=> isset($_POST['import_export']) ? $_POST['import_export'] : 0,
			'truncate_data' 			=> isset($_POST['truncate_data']) ? $_POST['truncate_data'] : 0,
			'added_by' 					=> $this->session->userdata('user_id')
		);

		$result = $this->user_model->addrole($roles_array);
		$msg = ($result)?'success':'warning';
		$this->session->set_flashdata('msg_basic', $msg);
		redirect('/users/roles', 'refresh');
	}

	public function updateroleaction(){
		$roles_array = array(
			'user_role_name' 			=> isset($_POST['role_name']) ? $_POST['role_name'] : 0,
			'recipient_all' 			=> isset($_POST['recipient_all']) ? $_POST['recipient_all'] : 0,
			'recipient_monthly' 		=> isset($_POST['recipient_monthly']) ? $_POST['recipient_monthly'] : 0,
			'recipient_add' 			=> isset($_POST['recipient_add']) ? $_POST['recipient_add'] : 0,
			'recipient_update' 			=> isset($_POST['recipient_update']) ? $_POST['recipient_update'] : 0,
			'recipient_request' 		=> isset($_POST['recipient_request']) ? $_POST['recipient_request'] : 0,
			'recipient_approverequest' 	=> isset($_POST['recipient_approverequest']) ? $_POST['recipient_approverequest'] : 0,
			'recipient_archived' 		=> isset($_POST['recipient_archived']) ? $_POST['recipient_archived'] : 0,
			'maps' 						=> isset($_POST['maps']) ? $_POST['maps'] : 0,
			'package' 					=> isset($_POST['package']) ? $_POST['package'] : 0,
			'package_add' 				=> isset($_POST['package_add']) ? $_POST['package_add'] : 0,
			'package_update' 			=> isset($_POST['package_update']) ? $_POST['package_update'] : 0,
			'package_delete' 			=> isset($_POST['package_delete']) ? $_POST['package_delete'] : 0,
			'orders' 					=> isset($_POST['orders']) ? $_POST['orders'] : 0,
			'orders_add' 				=> isset($_POST['orders_add']) ? $_POST['orders_add'] : 0,
			'orders_update' 			=> isset($_POST['orders_update']) ? $_POST['orders_update'] : 0,
			'deploy_update' 			=> isset($_POST['deploy_update']) ? $_POST['deploy_update'] : 0,
			'deploy_add' 				=> isset($_POST['deploy_add']) ? $_POST['deploy_add'] : 0,
			'courier' 					=> isset($_POST['courier']) ? $_POST['courier'] : 0,
			'courier_add' 				=> isset($_POST['courier_add']) ? $_POST['courier_add'] : 0,
			'courier_update' 			=> isset($_POST['courier_update']) ? $_POST['courier_update'] : 0,
			'report_recipient' 			=> isset($_POST['report_recipient']) ? $_POST['report_recipient'] : 0,
			'report_recipient_print' 	=> isset($_POST['report_recipient_print']) ? $_POST['report_recipient_print'] : 0,
			'report_barangay' 			=> isset($_POST['report_barangay']) ? $_POST['report_barangay'] : 0,
			'report_barangay_report' 	=> isset($_POST['report_barangay_report']) ? $_POST['report_barangay_report'] : 0,
			'report_courier' 			=> isset($_POST['report_courier']) ? $_POST['report_courier'] : 0,
			'report_courier_print' 		=> isset($_POST['report_courier_print']) ? $_POST['report_courier_print'] : 0,
			'users' 					=> isset($_POST['users']) ? $_POST['users'] : 0,
			'users_add' 				=> isset($_POST['users_add']) ? $_POST['users_add'] : 0,
			'users_update' 				=> isset($_POST['users_update']) ? $_POST['users_update'] : 0,
			'user_role' 				=> isset($_POST['user_role']) ? $_POST['user_role'] : 0,
			'api' 						=> isset($_POST['api']) ? $_POST['api'] : 0,
			'import_export' 			=> isset($_POST['import_export']) ? $_POST['import_export'] : 0,
			'truncate_data' 			=> isset($_POST['truncate_data']) ? $_POST['truncate_data'] : 0,
			'added_by' 					=> $this->session->userdata('user_id'),
			'user_role_id' 				=> $_POST['user_role_id']
		);

		$result = $this->user_model->updaterole($roles_array);
		$msg = ($result)?'success':'warning';
		$this->session->set_flashdata('msg_basic', $msg);
		redirect('/users/updateroles/'.$_POST['user_role_id'], 'refresh');
	}
}
