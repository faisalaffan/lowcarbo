<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Sampah extends REST_Controller{
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model('Location_model', 'lm');
		$this->load->model('Jemputan_model', 'jm');
		$this->load->model('Sampah_model', 'sm');
		$this->load->model('Tps_model', 'tpsM');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE, PATCH, OPTIONS");
	}

	//memasukkan ke table sampah
	public function tpa_post()
	{
		// var_dump($this->post('gambar'));
		$data = [
			'id_jenis_sampah' => $this->post('id_jenis_sampah'),
			'id_tps' => $this->post('id_tps'),
            'lat' => $this->post('lat'),
            'lng' => $this->post('lng'),
			'title' => $this->post('title'),
			'gambar' => $this->post('gambar'),
			'tertampung' => $this->post('tertampung')
        ];
        if ($this->sm->addSampah($data) > 0) {
            $this->response([
                'status' => true,
                'data' => $data,
                'message' => 'Location Added'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'data not valid'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
	}
}

