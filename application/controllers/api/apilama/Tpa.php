<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Tpa extends REST_Controller{
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model('Location_model', 'lm');
		$this->load->model('Jemputan_model', 'jm');
		$this->load->model('Sampah_model', 'sm');
		$this->load->model('Jenis_sampah_model', 'jsm');
		$this->load->model('Tpa_model', 'tpaM');
		$this->load->model('Tps_model', 'tpsM');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE, PATCH, OPTIONS");
    }
    
	public function sampah_get()
	{
		$id_tpa = $this->get('id_tpa');
		$id_tps = $this->get('id_tps');
		if ($id_tpa == null || $id_tps == null) {
			$this->response([
                'status' => false,
                'message' => 'Harus Sertakan id_tpa & id_tps'
            ], REST_Controller::HTTP_NOT_FOUND);
		}

		$data = $this->sm->getSampahByIdTpaAndTps($id_tpa, $id_tps);
		if ($data > 0) {
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

	public function penjemputan_post()
	{
		$id_penjemputan = $this->get('id_penjemputan');
		if ($id_penjemputan == null) {
			$this->response([
                'status' => false,
                'message' => 'id_penjemputan tidak dikenali'
            ], REST_Controller::HTTP_NOT_FOUND);
		}
		$data = $this->jm->jemputanVerification($id_penjemputan);
		if ($data > 0) {
			$this->response([
                'status' => true,
                'message' => 'jemputan terverifikasi'
            ], REST_Controller::HTTP_OK);
		} else {
			$this->response([
                'status' => false,
                'data' => 'id_penjemputan tidak dikenali'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function jemputan_post()
	{
		$data = [
			'id_sampah'		=> $this->post('id_sampah'),
			'waktu'			=> $this->post('waktu'),
			'id_tpa'			=> $this->post('id_tpa'),
			'verifikasi' 	=> 0
		];
		$query = $this->jm->addPenjemputan($data);
		if ($query > 0) {
			$this->response([
                'status' => true,
                'data' => $data,
                'message' => 'Penjemputan Created'
            ], REST_Controller::HTTP_CREATED);
		} else {
			$this->response([
                'status' => false,
                'message' => 'data not valid'
            ], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function jemputan_get() {
		$id_tpa = (int) $this->get('id_tpa');
		if ($id_tpa == null) {
			$location = $this->jm->getJemputanAll();
		} else {
			$location = $this->jm->getJemputanByTpa($id_tpa);
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

	public function login_post()
	{
		$data = [
			'username_tpa'	=> $this->post('username'),
			'password_tpa'	=> $this->post('password')
		];
		$query = $this->tpaM->cekTpa($data);
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

	public function profile_get()
	{
		$id_tpa = (int) $this->get('id_tpa');
		$data = $this->tpaM->getTpaById($id_tpa);
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

	public function tps_get()
	{
		$id_tpa = (int) $this->get('id_tpa');
		$data = $this->tpsM->getTpsByIdTpa($id_tpa);
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

	public function grafik_get()
	{
		$id_tpa = (int) $this->get('id_tpa');
		$tertampung = $this->get('tertampung');

		if ($tertampung != null && $tertampung == true) {
			$sampah = $this->sm->getAllSampahByIdTpa($id_tpa);
			$count = $this->sm->getAllSampahByIdTpaCount($id_tpa);
		} else {
			$sampah = $this->sm->getSampahByIdTpsNotTertampung($id_tpa);
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
}

