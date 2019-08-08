<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Location extends REST_Controller{
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model('Location_model', 'lm');
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE, PATCH, OPTIONS");
    }
    

    public function index_get()
    {
        $id = $this->get('id');
        if ($id == null) {
            $location = $this->lm->getLocation();
        } else {
            $location = $this->lm->getLocation($id);
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

    public function index_delete()
    {
		$id = $this->delete('id');
        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'provide id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->lm->deleteLocation($id) > 0) {
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'deleted'
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'jenis' => $this->post('jenis'),
			'alamat' => $this->post('alamat'),
            'lat' => $this->post('lat'),
            'lng' => $this->post('lng'),
			'title' => $this->post('title'),
        ];

        if ($this->lm->addLocation($data) > 0) {
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

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
			'jenis' => $this->put('jenis'),
			'alamat' => $this->put('alamat'),
            'lat' => $this->put('lat'),
            'lng' => $this->put('lng'),
			'title' => $this->put('title'),
        ];

        if ($this->lm->updateLocation($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Location updated'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'data fail to updated'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}

