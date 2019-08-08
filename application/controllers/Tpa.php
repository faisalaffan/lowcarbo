<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tpa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tpa_model');
	}
	

	public function index()
	{
		$data['halaman'] = 'Tpa';
		$data['title'] = 'Tpa';
		$this->load->view('templates/templates', $data);
		// $this->load->view('tpa', $data);
		// $this->load->view('templates/footer');
	}

	public function station($id)
	{
		$this->load->view('tpastation');
	}

}

/* End of file Tpa.php */
