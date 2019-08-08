<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Admin1 extends REST_Controller{
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model('Jemputan_model', 'jm');
		$this->load->model('Jenis_sampah_model', 'jsm');
		$this->load->model('Sampah_model', 'sm');
		$this->load->model('Tpa_model', 'tpaM');
		$this->load->model('Tps_model', 'tpsM');
		$this->load->model('Admin_model', 'am');
		$this->load->model('Member_model', 'mm');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE, PATCH, OPTIONS");
    }
    
	public function tpa_get()
	{
		$id_tpa = $this->get('id_tpa');
		if ($id_tpa != null) {
			$this->response([
				'status' => true,
				'data' => $this->tpaM->getTpaById($id_tpa),
			], REST_Controller::HTTP_OK);
		}
		$this->response([
			'status' => true,
			'data' => $this->tpaM->getAllTpa(),
		], REST_Controller::HTTP_OK);
	}

	public function tpaupdate_post()
	{
		$id_tpa = $this->post('id_tpa');
		$now = date('dmYHis');
		$uploaddir = base_url('assets/tpa/');
		$file_name = $now.".jpg";
		$uploadfile = $_SERVER['DOCUMENT_ROOT'] . "/lowcarbo/assets/tpa/".$file_name;

		$data = [
			'alamat_tpa' => $this->post('alamat_tpa'),
			'lat_tpa' => $this->post('lat_tpa'),
			'lng_tpa' => $this->post('lng_tpa'),
			'nama_tpa' => $this->post('nama_tpa'),
			'gambar_tpa' => 'tpa/' . $file_name,
			'username_tpa' => $this->post('username_tpa'),
			'password_tpa' => $this->post('password_tpa')
		];

		if (move_uploaded_file($_FILES['gambar_tpa']['tmp_name'], $uploadfile)) {
			$dataDB['status'] = 'success';       
			$dataDB['filename'] = $file_name;
		} else {
			$dataDB['status'] =  'failure';  
			return false;     
		}
		$this->db->where("id_tpa", $id_tpa);
		$update = $this->db->update('tpa', $data);
		if ($update) {
			$this->response([
				'status' => true,
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => false,
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function tpsupdate_post()
	{
		$id_tps = $this->post('id_tps');

		$now = date('dmYHis');
		$uploaddir = base_url('assets/tps/');
		// $file_name = underscore($_FILES['file']['name']);
		$file_name = $now.".jpg";
		$uploadfile = $_SERVER['DOCUMENT_ROOT'] . "/lowcarbo/assets/tps/".$file_name;

		
		$data = [
			'alamat_tps' => $this->post('alamat_tps'),
			'lat_tps' => $this->post('lat_tps'),
			'lng_tps' => $this->post('lng_tps'),
			'nama_tps' => $this->post('nama_tps'),
			'gambar_tps' => 'tps/' . $file_name,
			'username_tps' => $this->post('username_tps'),
			'password_tps' => $this->post('password_tps')
		];
		
		if (move_uploaded_file($_FILES['gambar_tps']['tmp_name'], $uploadfile)) {
			$dataDB['status'] = 'success';       
			$dataDB['filename'] = $file_name;
		} else {
			$dataDB['status'] =  'failure';  
			return false;     
		}
		
		$this->db->where("id_tps", $id_tps);
		$update = $this->db->update('tps', $data);
		if ($update) {
			$this->response([
				'status' => true,
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => false,
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function tpa_post()
	{
		$this->form_validation->set_rules('alamat_tpa', 'alamat_tpa', 'required');
		$this->form_validation->set_rules('lat_tpa', 'lat_tpa', 'required');
		$this->form_validation->set_rules('lng_tpa', 'lng_tpa', 'required');
		$this->form_validation->set_rules('nama_tpa', 'nama_tpa', 'required');
		$this->form_validation->set_rules('username_tpa', 'username_tpa', 'required');
		$this->form_validation->set_rules('password_tpa', 'password_tpa', 'required');
		
		$now = date('dmYHis');
		$uploaddir = base_url('assets/tpa/');
		// $file_name = underscore($_FILES['file']['name']);
		$file_name = $now.".jpg";
		$uploadfile = $_SERVER['DOCUMENT_ROOT'] . "/lowcarbo/assets/tpa/".$file_name;

		$data = [
			'alamat_tpa' => $this->post('alamat_tpa'),
            'lat_tpa' => $this->post('lat_tpa'),
            'lng_tpa' => $this->post('lng_tpa'),
			'nama_tpa' => $this->post('nama_tpa'),
			'gambar_tpa' => 'tpa/' . $file_name,
			'username_tpa' => $this->post('username_tpa'),
			'password_tpa' => $this->post('password_tpa')
		];
		
        if ($this->tpaM->addTpa($data) > 0) {
			if (move_uploaded_file($_FILES['gambar_tpa']['tmp_name'], $uploadfile)) {
				$dataDB['status'] = 'success';       
				$dataDB['filename'] = $file_name;
			} else {
				$dataDB['status'] =  'failure';  
				return false;     
			}
            $this->response([
                'status' => true,
                'data' => $data,
                'message' => 'tpa Created'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'data not valid'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
	}

	public function member_post()
	{
		$this->form_validation->set_rules('fullname_member', 'fullname_member', 'required');
		$this->form_validation->set_rules('alamat_member', 'alamat_member', 'required');
		$this->form_validation->set_rules('telp_member', 'telp_member', 'required');
		$this->form_validation->set_rules('username_member', 'username_member', 'required');
		$this->form_validation->set_rules('password_member', 'password_member', 'required');
		$this->form_validation->set_rules('status_member', 'status_member', 'required');
		
		$data = [
			'fullname_member' => $this->post('fullname_member'),
            'alamat_member' => $this->post('alamat_member'),
            'telp_member' => $this->post('telp_member'),
			'username_member' => $this->post('username_member'),
			'password_member' => $this->post('password_member'),
			'status_member' => $this->post('status_member')
		];
		
        if ($this->mm->addMember($data) > 0) {
            $this->response([
                'status' => true,
                'data' => $data,
                'message' => 'member Created'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'data not valid'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
	}

	public function tps_get()
	{
		$id_tps = $this->get('id_tps');
		if ($id_tps != null) {
			$this->response([
				'status' => true,
				'data' => $this->tpsM->getTpsById($id_tps),
			], REST_Controller::HTTP_OK);
		}
		$this->response([
			'status' => true,
			'data' => $this->tpsM->getTpsAll(),
		], REST_Controller::HTTP_OK);
	}

	public function tps_post()
	{
		$this->form_validation->set_rules('id_tpa', 'id_tpa', 'required');
		$this->form_validation->set_rules('alamat_tps', 'alamat_tps', 'required');
		$this->form_validation->set_rules('lat_tps', 'lat_tps', 'required');
		$this->form_validation->set_rules('lng_tps', 'lng_tps', 'required');
		$this->form_validation->set_rules('nama_tps', 'nama_tps', 'required');
		$this->form_validation->set_rules('username_tps', 'username_tps', 'required');
		$this->form_validation->set_rules('password_tps', 'password_tps', 'required');

		$now = date('dmYHis');
		$uploaddir = base_url('assets/tps/');
		// $file_name = underscore($_FILES['file']['name']);
		$file_name = $now.".jpg";
		$uploadfile = $_SERVER['DOCUMENT_ROOT'] . "/lowcarbo/assets/tps/".$file_name;

		if (move_uploaded_file($_FILES['gambar_tps']['tmp_name'], $uploadfile)) {
			$dataDB['status'] = 'success';       
			$dataDB['filename'] = $file_name;
			$data['gambar_tps'] = $file_name;
		} else {
			$dataDB['status'] =  'failure';  
			return false;     
		}
		
		$data = [
			'id_tpa' => $this->post('id_tpa'),
			'alamat_tps' => $this->post('alamat_tps'),
            'lat_tps' => $this->post('lat_tps'),
            'lng_tps' => $this->post('lng_tps'),
			'nama_tps' => $this->post('nama_tps'),
			'gambar_tps' => "tps/" . $file_name,
			'username_tps' => $this->post('username_tps'),
			'password_tps' => $this->post('password_tps'),
		];

        if ($this->tpsM->addTps($data) > 0) {
            $this->response([
                'status' => true,
                'data' => $data,
                'message' => 'Tps Created'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'data not valid'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
	}

	public function sampah_get()
	{
		$this->response([
			'status' => true,
			'data' => $this->sm->getAllSampah(),
		], REST_Controller::HTTP_OK);
	}
	
	public function login_post()
	{
		$data = [
			'username'	=> $this->post('username'),
			'password'	=> $this->post('password')
		];
		$query = $this->am->cekAdmin($data);
		if ($query->num_rows() > 0) {
			$query = $query->result_array();
			$this->response([
                'status' => true,
                'data' => $query,
                'message' => 'Admin Logged In'
            ], REST_Controller::HTTP_CREATED);
		} else {
			$this->response([
                'status' => false,
                'message' => 'data not valid'
            ], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function grafik_get()
	{
		$count = $this->sm->adminGetGrafik();

        if ($count) {
            $this->response([
                'status' => true,
				'count' => $count
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'data' => 'data not found. maybe id not match'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function tpahapus_get()
	{
		$id_tpa = (int) $this->get('id_tpa');
		$query = $this->tpaM->hapusTpa($id_tpa);
		if ($query) {
			$this->response([
                'status' => true,
				'data' => $query
            ], REST_Controller::HTTP_OK);
		} else {
			 $this->response([
                'status' => false,
                'data' => 'data not found. maybe id not match'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function tpshapus_get()
	{
		$id_tps = (int) $this->get('id_tps');
		$query = $this->tpsM->hapusTps($id_tps);
		if ($query) {
			$this->response([
                'status' => true,
				'data' => $query
            ], REST_Controller::HTTP_OK);
		} else {
			 $this->response([
                'status' => false,
                'data' => 'data not found. maybe id not match'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function member_get()
	{
		$this->response([
			'status' => true,
			'data' => $this->mm->getAllMember(),
		], REST_Controller::HTTP_OK);
	}

	public function member_delete()
    {
        $id_member = (int) $this->delete('id_member');

        if ($id_member <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
		
		$query = $this->db->delete('member', ['id_member' => $id_member]);
		if ($query) {
			$this->set_response([
				'id' => $id_member,
				'message' => 'Member deleted'
			], REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
		}

	}
	
}

