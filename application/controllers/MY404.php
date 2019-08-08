<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY404 extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
	}
	

	public function index()
	{
		$this->output->set_status_header('404'); 
		$this->load->view('404');//loading in custom error view
	}

}

/* End of file MY404.php */
