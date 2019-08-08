<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tps_model');
	}
	

	public function index()
	{
		$data['judul'] = 'User';
		$this->load->view('templates/header', $data);
		$this->load->view('user', $data);
		$this->load->view('templates/footer');
	}

}

/* End of file User.php */
