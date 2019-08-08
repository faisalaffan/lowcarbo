<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Penjemputan extends REST_Controller{
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model('Location_model', 'lm');
		$this->load->model('Jemputan_model', 'jm');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE, PATCH, OPTIONS");
    }
    
	public function tpa_get() {
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

	public function tps_get()
	{
		$id_tpa = (int) $this->get('id_tpa');
		// var_dump($id_tpa);die;
		if ($id_tpa === null) {
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
}

