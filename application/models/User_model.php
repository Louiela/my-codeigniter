<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class User_model extends CI_Model {



	const __TABLE_USER = 'users';
	const __TABLE_USER_ROLE = 'user_role';
	const __TABLE_DEPARTMENT = 'department';

	const __SALT = 'npM579vQ';



	public function create($usr, $pwd, $fname, $lname, $email, $department, $user_role) {
		$tbl_user = self::__TABLE_USER;
		$data[] = $usr;
		$data[] = sha1($pwd . self::__SALT);
		$data[] = $fname;
		$data[] = $lname;
		$data[] = $email;
		$data[] = $department;
		$data[] = $user_role;
		$sql = "INSERT INTO `$tbl_user`
			(
				`username`,
				`password`,
				`firstname`,
				`lastname`,
				`email`,
				`department`,
				`user_role_id`,
				`date_created`
			) VALUES(?, ?, ?, ?, ?, ?, ?, NOW() )";
		$this->db->query($sql, $data);
		$id = $this->db->insert_id();
		$action = 'insert';
		$result = array(
				'action' => $action,
				'id' => $id
			);
		return $result;
	}

	public function update($usr, $fname, $lname, $email, $department, $user_role, $userid) {
		$tbl_user = self::__TABLE_USER;
		$data[] = $usr;
		$data[] = $fname;
		$data[] = $lname;
		$data[] = $email;
		$data[] = $department;
		$data[] = $user_role;
		$data[] = $userid;
		$sql = "UPDATE `$tbl_user`
			SET `username` = ?,
			`firstname` = ?,
			`lastname` = ?,
			`email` = ?,
			`department` = ?,
			`user_role_id` = ?,
			`date_updated` = NOW()
			WHERE `user_id` = ?
			LIMIT 1";
		$this->db->query($sql, $data);
		$action = 'update';
		$result = array(
				'action' => $action,
				'id' => $userid
			);
		return $result;
	}

	public function updatePassword($userid, $npwd) {
		$tbl_user = self::__TABLE_USER;
		$data[] = sha1($npwd . self::__SALT);
		$data[] = $userid;
		$sql = "UPDATE `$tbl_user` u
			SET u.password = ?
			WHERE u.user_id = ?
			LIMIT 1";
		$this->db->query($sql, $data);
		$action = 'update';
		$result = array(
				'action' => $action,
				'id' => $userid
			);
		return $result;
	}

	public function delete($id) {
		$tbl_user = self::__TABLE_USER;
		$data[] = $id;
		$sql = "DELETE FROM `$tbl_user`
			WHERE `user_id` = ? 
			LIMIT 1";
		$this->db->query($sql, $data);
		$affected_rows = $this->db->affected_rows();
		$action = 'delete';
		$result = array(
				'action' => $action,
				'affected_rows' => $affected_rows
			);
		return $result;
	}

	public function signin($username, $password) {
		$tbl_user = self::__TABLE_USER;
		$data[] = $username;
		$data[] = sha1($password . self::__SALT);
		$sql = "SELECT 
			`user_id`
			FROM `$tbl_user`
			WHERE `username` = ?
			AND `password` = ?
			LIMIT 1";
		$query = $this->db->query($sql, $data);
		$result = $query->result();
		$id = 0;
		foreach($result as $row) { $id = $row->user_id; }
		return (int) $id;
	}

	public function find($id) {
		$tbl_user = self::__TABLE_USER;
		$data[] = $id;
		$sql = "SELECT
			u.user_id,
			u.username,
			u.firstname,
			u.lastname,
			d.department_name as department,
			u.user_role_id
			FROM $tbl_user u
			LEFT JOIN department d ON d.department_id = u.department
			WHERE u.user_id = ? 
			LIMIT 1";
		$query = $this->db->query($sql, $data);
		$result = $query->result();
		return $result;

	}

	public function findall() {
		$tbl_user = self::__TABLE_USER;
		$tbl_user_role = self::__TABLE_USER_ROLE;
		$sql = "SELECT
			u.user_id,
			u.username,
			u.firstname,
			u.lastname,
			u.email,
			d.department_name as department,
			r.user_role_name,
			u.date_created
			FROM $tbl_user u
			LEFT JOIN $tbl_user_role r ON r.user_role_id = u.user_role_id
			LEFT JOIN department d ON d.department_id = u.department";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;		
	}

	public function findbyid($data) {
		$tbl_user = self::__TABLE_USER;
		$sql = "SELECT
			u.username,
			u.password,
			u.firstname,
			u.lastname,
			u.email,
			u.department,
			u.user_role_id
			FROM $tbl_user u
			WHERE u.user_id = ?";
		$query = $this->db->query($sql, $data);
		$result = $query->result();
		return $result;		
	}

	public function getDepartmentLists(){
		$tbl_department = self::__TABLE_DEPARTMENT;
		$sql = "SELECT
					*
				FROM $tbl_department";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function getUserAccessLists(){
		$tbl_user_role = self::__TABLE_USER_ROLE;
		$sql = "SELECT
					*
				FROM $tbl_user_role";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function getUserAccessListsId($data){
		$tbl_user_role = self::__TABLE_USER_ROLE;
		$sql = "SELECT
					*
				FROM $tbl_user_role
				WHERE user_role_id = ?";
		$query = $this->db->query($sql, $data);
		return $query->result();
	}

	public function getUserAccessListsName(){
		$tbl_user_role = self::__TABLE_USER_ROLE;
		$sql = "SELECT
					r.user_role_id,
					r.user_role_name
				FROM $tbl_user_role r";
		$query = $this->db->query($sql);
		return $query->result();
	}

	//check user password before truncate
	public function checkTruncatePassword($password) {
		$tbl_user = self::__TABLE_USER;
		$data[] = sha1($password . self::__SALT);
		$sql = "SELECT 
			`user_id`
			FROM `$tbl_user`
			WHERE `password` = ?
			LIMIT 1";
		$query = $this->db->query($sql, $data);
		$result = $query->result();
		$return = 0;
		if ($result) {
			$return = 1;
		}
		return $return;
	}

	public function allroles() {
		$tbl_user = self::__TABLE_USER;
		$tbl_user_role = self::__TABLE_USER_ROLE;
		$sql = "SELECT
			r.user_role_id,
			r.user_role_name,
			u.firstname,
			u.lastname,
			r.date_added
			FROM $tbl_user_role r
			LEFT JOIN $tbl_user u ON u.user_id = r.added_by";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;		
	}

	public function findroles($data) {
		$tbl_user_role = self::__TABLE_USER_ROLE;
		$sql = "SELECT
			*
			FROM $tbl_user_role
			WHERE user_role_id = ?";
		$query = $this->db->query($sql, $data);
		$result = $query->result();
		return $result;		
	}

	public function addrole($data) {
		$tbl_user_role = self::__TABLE_USER_ROLE;
		$sql = "INSERT INTO `$tbl_user_role`
			(
				user_role_name,
				recipient_all,
				recipient_monthly,
				recipient_add,
				recipient_update,
				recipient_request,
				recipient_approverequest,
				recipient_archived,
				maps,
				package,
				package_add,
				package_update,
				package_delete,
				orders,
				orders_add,
				orders_update,
				deploy_update,
				deploy_add,
				courier,
				courier_add,
				courier_update,
				report_recipient,
				report_recipient_print,
				report_barangay,
				report_barangay_report,
				report_courier,
				report_courier_print,
				users,
				users_add,
				users_update,
				user_role,
				api,
				import_export,
				truncate_data,
				added_by,
				date_added
			) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW() )";
		$this->db->query($sql, $data);
		$id = $this->db->insert_id();
		$action = 'insert';
		$result = array(
				'action' => $action,
				'id' => $id
			);
		return $result;
	}

	public function updaterole($data) {
		$tbl_user_role = self::__TABLE_USER_ROLE;
		$sql = "UPDATE `$tbl_user_role`
			SET user_role_name = ?,
				recipient_all = ?,
				recipient_monthly = ?,
				recipient_add = ?,
				recipient_update = ?,
				recipient_request = ?,
				recipient_approverequest = ?,
				recipient_archived = ?,
				maps = ?,
				package = ?,
				package_add = ?,
				package_update = ?,
				package_delete = ?,
				orders = ?,
				orders_add = ?,
				orders_update = ?,
				deploy_update = ?,
				deploy_add = ?,
				courier = ?,
				courier_add = ?,
				courier_update = ?,
				report_recipient = ?,
				report_recipient_print = ?,
				report_barangay = ?,
				report_barangay_report = ?,
				report_courier = ?,
				report_courier_print = ?,
				users = ?,
				users_add = ?,
				users_update = ?,
				user_role = ?,
				api = ?,
				import_export = ?,
				truncate_data = ?,
				added_by = ?
			WHERE user_role_id = ?";
		$this->db->query($sql, $data);
		$action = 'update';
		$result = array(
				'action' => $action
			);
		return $result;
	}

}

