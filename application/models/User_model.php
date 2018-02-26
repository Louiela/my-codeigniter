<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class User_model extends CI_Model {



	const __TABLE_NAME = 'user';

	const __SALT = 'npM579vQ';



	public function create($username, $password, $name) {
		$tbl_name = self::__TABLE_NAME;
		$data[] = $username;
		$data[] = sha1($password . self::__SALT);
		$data[] = $name;
		$sql = "INSERT INTO `$tbl_name`
			(
				`username`,
				`password`,
				`name`
			) VALUES(?, ?, ?)";
		$this->db->query($sql, $data);
		$id = $this->db->insert_id();
		$action = 'insert';
		$result = array(
				'action' => $action,
				'id' => $id
			);
		return $result;
	}

	public function delete($id) {
		$tbl_name = self::__TABLE_NAME;
		$data[] = $id;
		$sql = "DELETE FROM `$tbl_name`
			WHERE `id` = ? 
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
		$tbl_name = self::__TABLE_NAME;

		$data[] = $username;

		$data[] = sha1($password . self::__SALT);

		$sql = "SELECT 

			`id`

			FROM `$tbl_name`

			WHERE `username` = ?

			AND `password` = ?

			LIMIT 1";

		$query = $this->db->query($sql, $data);

		$result = $query->result();

		$id = 0;

		foreach($result as $row) { $id = $row->id; }



		return (int) $id;

	}



	public function find($id) {

		$tbl_name = self::__TABLE_NAME;

		$data[] = $id;

		$sql = "SELECT

			`id`,

			`name`

			FROM `$tbl_name`

			WHERE `id` = ? 

			LIMIT 1";

		$query = $this->db->query($sql, $data);

		$result = $query->result();



		return $result;

	}

}

