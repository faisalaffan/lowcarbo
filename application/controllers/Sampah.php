<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sampah extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sampah_model');
	}
	

	public function index()
	{
		$data['title'] = 'Sampah';
		$data['halaman'] = 'Sampah';
		$this->load->view('templates/templates', $data);
	}

}

/* End of file Sampah.php */
