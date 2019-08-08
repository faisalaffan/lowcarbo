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
}

