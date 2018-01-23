<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
    }

    /**
    * Home controller with parser
    */
	public function index()
	{
		$template = 'home';

		$data['data'] = 'Data content';
		$this->parser->parse(
				$template, 
				$this->__getglobal->data_default($data) 
			);
	}

	/**
	* Test function that can access in url 
	*/
	public function test() {
		$text = 'test function';
		echo $text;
	}
}
