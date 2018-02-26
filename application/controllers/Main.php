<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        if(!$this->__user->is_authenticated()) { redirect('secure/login'); }
    }

    /**
    * Main controller with parser
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
}
