<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Unauthorized extends CI_Controller {

	

	public function __construct() {

		parent::__construct();

	}



	public function index() {

		$template = 'errors/unauthorized';

		$data[] = '';

		$this->parser->parse(

				$template, 

				$this->__getglobal->data_default($data)

			);

	}

}

