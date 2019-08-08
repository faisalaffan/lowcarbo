<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Member extends REST_Controller{
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model('Location_model', 'lm');
		$this->load->model('Jemputan_model', 'jm');
		$this->load->model('Sampah_model', 'sm');
		$this->load->model('Member_model', 'mm');
		
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE, PATCH, OPTIONS");
    }
    
	public function register_post()
	{
		$this->form_validation->set_rules('fullname_member', 'fullname_member', 'required');
		$this->form_validation->set_rules('alamat_member', 'alamat_member', 'required');
		$this->form_validation->set_rules('telp_member', 'telp_member', 'required');
		$this->form_validation->set_rules('username_member', 'username_member', 'required');
		$this->form_validation->set_rules('password_member', 'password_member', 'required');
		$this->form_validation->set_rules('status_member', 'status_member', 'required');
		
		$data = [
			'fullname_member' 	=> $this->post('fullname_member'),
			'alamat_member' 	=> $this->post('alamat_member'),
			'telp_member' 		=> $this->post('telp_member'),
			'username_member' 	=> $this->post('username_member'),
			'password_member' 	=> $this->post('password_member'),
			'status_member'		=> $this->post('status_member')
		];
		if ($this->mm->registerMember($data) > 0) {
            $this->response([
                'status' => true,
                'data' => $data,
                'message' => 'Member Added'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'data not valid'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
	}

	public function login_post()
	{
		$data = [
			'username_member'	=> $this->post('username'),
			'password_member'	=> $this->post('password')
		];
		$query = $this->mm->cekMember($data);
		if ($query->num_rows() > 0) {
			$query = $query->result_array();
			$this->response([
                'status' => true,
                'data' => $query,
                'message' => 'Member Added'
            ], REST_Controller::HTTP_CREATED);
		} else {
			$this->response([
                'status' => false,
                'message' => 'data not valid'
            ], REST_Controller::HTTP_BAD_REQUEST);
		}
	}
}

