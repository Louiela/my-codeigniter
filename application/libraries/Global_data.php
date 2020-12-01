<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Global_data {

	private $CI;

	public function __construct() {
		$this->CI =& get_instance();
		$this->api_base_url = $this->CI->config->item("api_base_url");
	}

	public function globalData($data = array()) {

		$global_data = array(
						'base_url' =>  base_url(),
						'api_base_url' =>  $this->api_base_url,
						'app_name' => $this->CI->config->item('app_name'),
						'app_name_sub' => $this->CI->config->item('app_name_sub'),
						'app_version' => $this->CI->config->item('app_version'),

					);
		$merged_data = array_merge($global_data, $data);
		return (array) $merged_data;
	}


	public function templater($view, $data = array()){

		$globalData = $this->globalData();
		$merged_data = array_merge($globalData, $data);		
	
		$this->CI->parser->parse('inc/header', $merged_data);
		// read acces only
		// $user_role = json_decode($this->CI->session->userdata('user_role'));
		$this->CI->parser->parse($view, $merged_data);
		// if(in_array(1, $user_role)) {
		// 	$this->CI->parser->parse($view, $merged_data);
		// } else {
		// 	// $this->CI->parser->parse('errors/403', $merged_data);
		// }
		$this->CI->parser->parse('inc/footer', $merged_data);
	}

	public function templaternc($view, $data = array()){

		$globalData = $this->globalData();
		$merged_data = array_merge($globalData, $data);		
	
		$this->CI->parser->parse('inc/header', $merged_data);
		// $this->CI->parser->parse('errors/403', $merged_data);
		$this->CI->parser->parse('inc/footer', $merged_data);
	}

	public function curlPostGetter($url= null, $id =null){

	    $param = "id=".$id."";
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL,"$url");
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $param );
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $result_json = curl_exec($ch);
	    curl_close ($ch);  

	    return json_decode($result_json);

	}

	public function curlPostUpdater($url= null,$params= null){

	    $param = $params;
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL,"$url");
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $param );
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $result = curl_exec($ch);
	    curl_close ($ch);  

	    return $result;

	}

	public function send_email($subject,$message) {
		$this->CI->email->set_newline("\r\n");
		
		$body = $this->CI->email->full_html($subject, $message);

		$result = $this->CI->email
	        ->from('system@gmail.com')
	        ->reply_to('admin@gmail.com')
	        ->to('tester@gmail.com')
		    ->subject($subject)
		    ->message($body)
		    ->send();

		if ($result) {
			return $result;
		}else{
			return $this->CI->email->print_debugger();
		}
	}
}