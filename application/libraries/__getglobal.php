<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class __getglobal {

	private $CI;

	public function __construct() {
		$this->CI =& get_instance();
	}

	public function data_default($data) {
		$temp['base_url'] = base_url();
		$temp['app_name'] = $this->CI->config->item('app_name');
		$temp['app_name_sub'] = $this->CI->config->item('app_name_sub');
		$temp['app_version'] = $this->CI->config->item('app_version');
		$merge = array_merge($data, $temp);

		return $merge;
	}
}
