<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Tps extends REST_Controller{
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model('Location_model', 'lm');
		$this->load->model('Jemputan_model', 'jm');
		$this->load->model('Tps_model', 'tpsM');
		$this->load->model('Jenis_sampah_model', 'jsm');
		$this->load->model('Sampah_model', 'sm');
		
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE, PATCH, OPTIONS");
    }
    
	public function jemputan_get() {
		$id_tpa = (int) $this->get('id_tpa');
		$id_tps = (int) $this->get('id_tps');
		if ($id_tps == null && $id_tpa == null) {
			$location = $this->jm->getJemputanAll();
		} else {
			$location = $this->jm->getJemputanTps($id_tpa, $id_tps);
        }
        if ($location) {
            $this->response([
                'status' => true,
                'data' => $location
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'data' => 'data not found. maybe id not match'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function jemputanDetail_get()
	{
		$id_penjemputan = $this->get('id_penjemputan');
		$data = $this->jm->getJemputanById($id_penjemputan);
        if ($data) {
            $this->response([
                'status' => true,
                'data' => $data
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'data' => 'data not found. maybe id not match'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function tpsProfile_post()
	{
		$this->form_validation->set_rules('id_tpa', 'id_tpa', 'required');
		$this->form_validation->set_rules('alamat_tps', 'alamat_tps', 'required');
		$this->form_validation->set_rules('lat_tps', 'lat_tps', 'required');
		$this->form_validation->set_rules('lng_tps', 'lng_tps', 'required');
		$this->form_validation->set_rules('nama_tps', 'nama_tps', 'required');
		$this->form_validation->set_rules('username_tps', 'username_tps', 'required');
		$this->form_validation->set_rules('password_tps', 'password_tps', 'required');
		
		$data = [
			'id_tpa' => $this->post('id_tpa'),
			'alamat_tps' => $this->post('alamat_tps'),
            'lat_tps' => $this->post('lat_tps'),
            'lng_tps' => $this->post('lng_tps'),
			'nama_tps' => $this->post('nama_tps'),
			'gambar_tps' => $this->post('gambar_tps'),
			'username_tps' => $this->post('username_tps'),
			'password_tps' => $this->post('password_tps')
        ];

        if ($this->tpsM->updateTps($data) > 0) {
            $this->response([
                'status' => true,
                'data' => $data,
                'message' => 'Tps Updated'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'data not valid'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
	}

	public function sampah_post()
	{
		$this->form_validation->set_rules('id_jenis_sampah', 'id_jenis_sampah', 'required');
		$this->form_validation->set_rules('id_tps', 'id_tps', 'required');
		$this->form_validation->set_rules('lat', 'lat', 'required');
		$this->form_validation->set_rules('lng', 'lng', 'required');
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('tertampung', 'tertampung', 'required');
		
		$data = [
			'id_jenis_sampah' => $this->post('id_jenis_sampah'),
			'id_tps' => $this->post('id_tps'),
            'lat' => $this->post('lat'),
            'lng' => $this->post('lng'),
			'title' => $this->post('title'),
			'gambar' => $this->post('gambar'),
			'berat' => $this->post('berat'), // baru
			'tertampung' => $this->post('tertampung'),
			'waktu_ditambahkan' => $this->post('waktu_ditambahkan') //baru
        ];
        if ($this->sm->addSampah($data) > 0) {
            $this->response([
                'status' => true,
                'data' => $data,
                'message' => 'Sampah Added'
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
			'username_tps'	=> $this->post('username'),
			'password_tps'	=> $this->post('password')
		];
		$query = $this->tpsM->cekTps($data);
		if ($query->num_rows() > 0) {
			$query = $query->result_array();
			$this->response([
                'status' => true,
                'data' => $query,
                'message' => 'Tps Logged In'
            ], REST_Controller::HTTP_CREATED);
		} else {
			$this->response([
                'status' => false,
                'message' => 'data not valid'
            ], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function jenisSampah_get()
	{
		$jenis_sampah = $this->jsm->getAllJenisSampah();
        if ($jenis_sampah) {
            $this->response([
                'status' => true,
                'data' => $jenis_sampah
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'data' => 'data not found. maybe id not match'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function sampah_get()
	{
		$id_tps = (int) $this->get('id_tps');
		$tertampung = $this->get('tertampung');

		if ($tertampung != null && $tertampung == true) {
			$sampah = $this->sm->getAllSampahByIdTps($id_tps);
			$count = $this->sm->getAllSampahByIdTpsCount($id_tps);
		} else {
			$sampah = $this->sm->getSampahByIdTpsNotTertampung($id_tps);
		}
        if ($sampah) {
            $this->response([
                'status' => true,
				'data' => $sampah,
				'count' => $count
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'data' => 'data not found. maybe id not match'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function sampahInTps_get()
	{
		$id_tps = (int) $this->get('id_tps');
		$tertampung = $this->get('tertampung');

		if ($tertampung != null && $tertampung == true) {
			$sampah = $this->sm->getSampahInTps($id_tps);
		}
        if ($sampah) {
            $this->response([
                'status' => true,
				'data' => $sampah,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'data' => 'data not found. maybe id not match'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function invoice_get()
	{
		$id_tps = (int) $this->get('id_tps');
		$tertampung = $this->get('tertampung');

		if ($tertampung != null && $tertampung == true) {
			$sampah = $this->sm->getAllSampahByIdTps($id_tps);
			$count = $this->sm->getAllSampahByIdTpsCount($id_tps);
		} else {
			$sampah = $this->sm->getSampahByIdTpsNotTertampung($id_tps);
		}
        if ($sampah) {
            $this->response([
                'status' => true,
				'data' => $sampah
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'data' => 'data not found. maybe id not match'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function profile_get()
	{
		$id_tps = (int) $this->get('id_tps');
		$data = $this->tpsM->getTpsById($id_tps);
        if ($data) {
            $this->response([
                'status' => true,
                'data' => $data
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'data' => 'data not found. maybe id not match'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function sampahDetail_get()
	{
		$id_sampah = $this->get('id_sampah');
		$data = $this->sm->getSampahDetail($id_sampah);
        if ($data) {
            $this->response([
                'status' => true,
                'data' => $data
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'data' => 'data not found. maybe id not match'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
}

