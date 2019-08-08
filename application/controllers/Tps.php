<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tps extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tps_model');
	}
	

	public function index()
	{
		$data['title'] = 'Tps';
		$data['halaman'] = 'Tps';
		$this->load->view('templates/templates', $data);
	}

}

/* End of file Tps.php */
