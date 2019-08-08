<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Admin extends REST_Controller{
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model('Jemputan_model', 'jm');
		$this->load->model('Jenis_sampah_model', 'jsm');
		$this->load->model('Sampah_model', 'sm');
		$this->load->model('District_model', 'dm');
		$this->load->model('Tpa_model', 'tpaM');
		$this->load->model('Tps_model', 'tpsM');
		$this->load->model('Admin_model', 'am');
        $this->load->model('Member_model', 'mm');
        $this->load->model('Province_model', 'pm');
        $this->load->model('User_model', 'um');
        $this->load->model('Station_model', 'stM');
        $this->load->model('City_model', 'cm');
        
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE, PATCH, OPTIONS");
    }

    // ===================== TPA ========================

    public function tpaCount_get()
    {
        $this->response([
            'status' => true,
            'data' => $this->tpaM->getTpaByProv(),
        ], REST_Controller::HTTP_OK);
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

    public function tpa_post()
	{
		$this->form_validation->set_rules('nama_tpa', 'nama_tpa', 'required');
		$this->form_validation->set_rules('alamat_tpa', 'alamat_tpa', 'required');
		$this->form_validation->set_rules('no_alamat', 'no_alamat', 'required');
		$this->form_validation->set_rules('rt', 'rt', 'required');
		$this->form_validation->set_rules('rw', 'rw', 'required');
		$this->form_validation->set_rules('district_id', 'district_id', 'required');
		$this->form_validation->set_rules('lat_tpa', 'lat_tpa', 'required');
		$this->form_validation->set_rules('lng_tpa', 'lng_tpa', 'required');
		// $this->form_validation->set_rules('gambar_tpa', 'gambar_tpa', 'required');
		$this->form_validation->set_rules('username_tpa', 'username_tpa', 'required');
		$this->form_validation->set_rules('password_tpa', 'password_tpa', 'required');
        
        // jalankan validasi
        if ($this->form_validation->run() == TRUE && !empty($_FILES['gambar_tpa']['name'])) {
            $now = date('dmYHis');
            $uploaddir = base_url('assets/tpa/');
            $file_name = $now . ".jpg";
            $uploadfile = $_SERVER['DOCUMENT_ROOT'] . "/lowcarbo/assets/tpa/".$file_name;

            // generator id
            $tgl = date('YmdHis');
            $random = (rand()%50);
            $random2 = (rand()%100);
            $tgl = "TPA" . $tgl . $random . $random2;

            $data = [
                'id_tpa' => $tgl,
                'nama_tpa' => $this->post('nama_tpa'),
                'alamat_tpa' => $this->post('alamat_tpa'),
                'no_alamat' => $this->post('no_alamat'),
                'rt' => $this->post('rt'),
                'rw' => $this->post('rw'),
                'district_id' => $this->post('district_id'),
                'lat_tpa' => $this->post('lat_tpa'),
                'lng_tpa' => $this->post('lng_tpa'),
                'gambar_tpa' => 'tpa/' . $file_name,
                'username_tpa' => $this->post('username_tpa'),
                'password_tpa' => $this->post('password_tpa')
            ];
            
            // check apakah model mengembalikan affected rows
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
        } else {
            $this->response([
                'status' => false,
                'message' => 'data not valid'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
	}

    public function tpaUpdate_post()
	{
        $this->form_validation->set_rules('nama_tpa', 'nama_tpa', 'required');
		$this->form_validation->set_rules('alamat_tpa', 'alamat_tpa', 'required');
		$this->form_validation->set_rules('no_alamat', 'no_alamat', 'required');
		$this->form_validation->set_rules('rt', 'rt', 'required');
		$this->form_validation->set_rules('rw', 'rw', 'required');
		$this->form_validation->set_rules('district_id', 'district_id', 'required');
		$this->form_validation->set_rules('lat_tpa', 'lat_tpa', 'required');
		$this->form_validation->set_rules('lng_tpa', 'lng_tpa', 'required');
		$this->form_validation->set_rules('username_tpa', 'username_tpa', 'required');
		$this->form_validation->set_rules('password_tpa', 'password_tpa', 'required');
        
        // check validasi
        $id_tpa = $this->post('id_tpa');
        if ($this->form_validation->run() == TRUE && !empty($id_tpa)) {
            if (!empty($_FILES['gambar_tpa']['name'])) {
                $now = date('dmYHis');
                $uploaddir = base_url('assets/tpa/');
                $file_name = $now.".jpg";
                $uploadfile = $_SERVER['DOCUMENT_ROOT'] . "/lowcarbo/assets/tpa/" . $file_name;

                $data = [   
                    'nama_tpa' => $this->post('nama_tpa'),
                    'alamat_tpa' => $this->post('alamat_tpa'),
                    'no_alamat' => $this->post('no_alamat'),
                    'rt' => $this->post('rt'),
                    'rw' => $this->post('rw'),
                    'district_id' => $this->post('district_id'),
                    'lat_tpa' => $this->post('lat_tpa'),
                    'lng_tpa' => $this->post('lng_tpa'),
                    'gambar_tpa' => 'tpa/' . $file_name,
                    'username_tpa' => $this->post('username_tpa'),
                    'password_tpa' => $this->post('password_tpa')
                ];

                if (move_uploaded_file($_FILES['gambar_tpa']['tmp_name'], $uploadfile)) {
                    $dataDB['status'] = 'success';       
                    $dataDB['filename'] = $file_name;
                } else {
                    $dataDB['status'] = 'failure';  
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
                        'msg' => "data not valid"
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
            } else {
                $data = [   
                    'nama_tpa' => $this->post('nama_tpa'),
                    'alamat_tpa' => $this->post('alamat_tpa'),
                    'no_alamat' => $this->post('no_alamat'),
                    'rt' => $this->post('rt'),
                    'rw' => $this->post('rw'),
                    'district_id' => $this->post('district_id'),
                    'lat_tpa' => $this->post('lat_tpa'),
                    'lng_tpa' => $this->post('lng_tpa'),
                    'username_tpa' => $this->post('username_tpa'),
                    'password_tpa' => $this->post('password_tpa')
                ];
                $this->db->where("id_tpa", $id_tpa);
                $update = $this->db->update('tpa', $data);
                if ($update) {
                    $this->response([
                        'status' => true,
                    ], REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'status' => false,
                        'msg' => "data not valid"
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        } else {
            $this->response([
                'status' => false,
                'msg' => "data not valid"
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function tpa_delete()
    {
        $id_tpa = $this->delete("id_tpa");
        if (!empty($id_tpa)) {
            if ($this->tpaM->deleteTpa($id_tpa) > 0) {
                $this->response([
                    'status' => true,
                    'msg' => "success deleted"
                ], REST_Controller::HTTP_NO_CONTENT);
            } else {
                $this->response([
                    'status' => false,
                    'msg' => "ID tpa not found"
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $this->response([
                'status' => false,
                'msg' => "ID must be included as well :)"
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function tpakml_post()
    {
        $this->form_validation->set_rules('id_tpa', 'id_tpa', 'required');
        // check validasi
        $id_tpa = $this->post('id_tpa');
        if ($this->form_validation->run() == TRUE && !empty($id_tpa)) {
            $now = date('dmYHis');
            $uploaddir = base_url('assets/kml/');
            $file_name = $now.".kml";
            $uploadfile = UPLOAD . "kml/" . $file_name;

            $data = [   
                'kml_file' => 'kml/' . $file_name,
            ];

            if (move_uploaded_file($_FILES['kml_file']['tmp_name'], $uploadfile)) {
                $dataDB['status'] = 'success';       
                $dataDB['filename'] = $file_name;
            } else {
                $dataDB['status'] = 'failure';  
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
                    'msg' => "data not valid"
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            $this->response([
                'status' => false,
                'msg' => "data not valid"
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    // ======================== TPS ========================

    public function tps_get()
    {
        $id_tps = $this->get('id_tps');
        $id_tpa = $this->get('id_tpa');
		if (!empty($id_tps)) {
            $this->response([
                'status' => true,
				'data' => $this->tpsM->getTpsById($id_tps),
			], REST_Controller::HTTP_OK);
		} else if(!empty($id_tpa)) {
            $this->response([
                'status' => true,
				'data' => $this->tpsM->getTpsByIdTpa($id_tpa),
			], REST_Controller::HTTP_OK);
        }
		$this->response([
			'status' => true,
			'data' => $this->tpsM->getAllTps(),
		], REST_Controller::HTTP_OK);
    }

    public function tps_post()
	{
		$this->form_validation->set_rules('id_tpa', 'id_tpa', 'required');
		$this->form_validation->set_rules('nama_tps', 'nama_tps', 'required');
		$this->form_validation->set_rules('alamat_tps', 'alamat_tps', 'required');
		$this->form_validation->set_rules('lat_tps', 'lat_tps', 'required');
		$this->form_validation->set_rules('lng_tps', 'lng_tps', 'required');
		$this->form_validation->set_rules('username_tps', 'username_tps', 'required');
		$this->form_validation->set_rules('password_tps', 'password_tps', 'required');
        
        // jalankan validasi
        if ($this->form_validation->run() == TRUE && !empty($_FILES['gambar_tps']['name'])) {
            $now = date('dmYHis');
            $uploaddir = base_url('assets/tps/');
            $file_name = $now . ".jpg";
            $uploadfile = $_SERVER['DOCUMENT_ROOT'] . "/lowcarbo/assets/tps/".$file_name;

             // generator id
             $tgl = date('YmdHis');
             $random = (rand()%50);
             $random2 = (rand()%100);
             $tgl = "TPS" . $tgl . $random . $random2;

            $data = [
                'id_tps' => $tgl,
                'id_tpa' => $this->post('id_tpa'),
                'nama_tps' => $this->post('nama_tps'),
                'alamat_tps' => $this->post('alamat_tps'),
                'lat_tps' => $this->post('lat_tps'),
                'lng_tps' => $this->post('lng_tps'),
                'gambar_tps' => 'tps/' . $file_name,
                'username_tps' => $this->post('username_tps'),
                'password_tps' => $this->post('password_tps')
            ];
            
            // check apakah model mengembalikan affected rows
            if ($this->tpsM->addTps($data) > 0) {
                if (move_uploaded_file($_FILES['gambar_tps']['tmp_name'], $uploadfile)) {
                    $dataDB['status'] = 'success';
                    $dataDB['filename'] = $file_name;
                } else {
                    $dataDB['status'] =  'failure';  
                    // return false;     
                    $this->response([
                        'status' => false,
                        'message' => 'data not valid'
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
                $this->response([
                    'status' => true,
                    'data' => $data,
                    'message' => 'tps Created'
                ], REST_Controller::HTTP_CREATED);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'data not valid'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            $this->response([
                'status' => false,
                'message' => 'data not valid'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    public function tpsUpdate_post()
	{
        $this->form_validation->set_rules('id_tpa', 'id_tpa', 'required');
		$this->form_validation->set_rules('nama_tps', 'nama_tps', 'required');
		$this->form_validation->set_rules('alamat_tps', 'alamat_tps', 'required');
		$this->form_validation->set_rules('lat_tps', 'lat_tps', 'required');
		$this->form_validation->set_rules('lng_tps', 'lng_tps', 'required');
		$this->form_validation->set_rules('username_tps', 'username_tps', 'required');
		$this->form_validation->set_rules('password_tps', 'password_tps', 'required');
        
        // check validasi
        $id_tps = $this->post('id_tps');
        if ($this->form_validation->run() == TRUE && !empty($id_tps)) {
            if (!empty($_FILES['gambar_tps']['name'])) {
                $now = date('dmYHis');
                $uploaddir = base_url('assets/tps/');
                $file_name = $now . ".jpg";
                $uploadfile = $_SERVER['DOCUMENT_ROOT'] . "/lowcarbo/assets/tps/".$file_name;

                $data = [
                    'id_tpa' => $this->post('id_tpa'),
                    'nama_tps' => $this->post('nama_tps'),
                    'alamat_tps' => $this->post('alamat_tps'),
                    'lat_tps' => $this->post('lat_tps'),
                    'lng_tps' => $this->post('lng_tps'),
                    'gambar_tps' => 'tps/' . $file_name,
                    'username_tps' => $this->post('username_tps'),
                    'password_tps' => $this->post('password_tps')
                ];

                if (move_uploaded_file($_FILES['gambar_tps']['tmp_name'], $uploadfile)) {
                    $dataDB['status'] = 'success';       
                    $dataDB['filename'] = $file_name;
                } else {
                    $dataDB['status'] = 'failure';  
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
                        'msg' => "data not valid"
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
            } else {
                $data = [
                    'id_tpa' => $this->post('id_tpa'),
                    'nama_tps' => $this->post('nama_tps'),
                    'alamat_tps' => $this->post('alamat_tps'),
                    'lat_tps' => $this->post('lat_tps'),
                    'lng_tps' => $this->post('lng_tps'),
                    'username_tps' => $this->post('username_tps'),
                    'password_tps' => $this->post('password_tps')
                ];
                $this->db->where("id_tps", $id_tps);
                $update = $this->db->update('tps', $data);
                if ($update) {
                    $this->response([
                        'status' => true,
                    ], REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'status' => false,
                        'msg' => "data not valid"
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        } else {
            $this->response([
                'status' => false,
                'msg' => "data not valid"
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function tps_delete()
    {
        $id_tps = $this->delete('id_tps');
        if (!empty($id_tps)) {
            $this->db->delete('tps', ['id_tps' => $id_tps]);
            $this->response([
                'status' => true,
                'msg' => "tps deleted",
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'msg' => "id not found"
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    // =======================  STATION  ===================

    public function station_get()
    {
        $id_tpa = $this->get('id_tpa');
        $id_station = $this->get('id_station');
		if (!empty($id_station)) {
            $this->response([
                'status' => true,
				'data' => $this->stM->getStationById($id_station),
			], REST_Controller::HTTP_OK);
		} else if(!empty($id_tpa)) {
            $this->response([
                'status' => true,
				'data' => $this->stM->getStationByIdTpa($id_tpa),
			], REST_Controller::HTTP_OK);
        }
		$this->response([
			'status' => true,
			'data' => $this->stM->getAllStation(),
		], REST_Controller::HTTP_OK);
    }

    public function station_post()
    {
        $this->form_validation->set_rules('id_tpa', 'id_tpa', 'required');
		$this->form_validation->set_rules('nama_station', 'nama_station', 'required');
		$this->form_validation->set_rules('lat_station', 'lat_station', 'required');
		$this->form_validation->set_rules('lng_station', 'lng_station', 'required');
        
        // generator id
        $tgl = date('YmdHis');
        $random = (rand()%50);
        $random2 = (rand()%100);
        $tgl = "ST" . $tgl . $random . $random2;

        // jalankan validasi
        $data = [
            'id_station' => $tgl,
            'id_tpa' => $this->post('id_tpa'),
            'nama_station' => $this->post('nama_station'),
            'lat_station' => $this->post('lat_station'),
            'lng_station' => $this->post('lng_station'),
        ];
            
        // check apakah model mengembalikan affected rows
        if ($this->stM->addStation($data) > 0) {
            $this->response([
                'status' => true,
                'data' => $data,
                'message' => 'station Created'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'data not valid'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function station_delete()
    {
        $id_station = $this->delete('id_station');
        if (!empty($id_station)) {
            if ($this->stM->deleteStation($id_station) > 0) {
                $this->response([
                    'status' => true,
                    'msg' => "DATA BERHASIL DIHAPUS",
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => true,
                    'msg' => "Id not recognized",
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $this->response([
                'status' => false,
                'msg' => "ID must be included on request",
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function stationUpdate_post()
    {
        $this->form_validation->set_rules('id_tpa', 'id_tpa', 'required');
		$this->form_validation->set_rules('nama_station', 'nama_station', 'required');
		$this->form_validation->set_rules('lat_station', 'lat_station', 'required');
		$this->form_validation->set_rules('lng_station', 'lng_station', 'required');
        
        // check validasi
        $id_station = $this->post('id_station');
        if ($this->form_validation->run() == TRUE && !empty($id_station)) {
            // jalankan validasi
            $data = [
                'id_tpa' => $this->post('id_tpa'),
                'nama_station' => $this->post('nama_station'),
                'lat_station' => $this->post('lat_station'),
                'lng_station' => $this->post('lng_station'),
            ];            
            $this->db->where("id_station", $id_station);
            $update = $this->db->update('station', $data);
            if ($update) {
                $this->response([
                    'status' => true,
                    'data' => $data,
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'msg' => "data not valid"
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }


    // =======================  SAMPAH  ===================

    public function sampah_get()
	{
        $id_sampah = $this->get('id_sampah');
        if (!empty($id_sampah)) { // cari sampah berdasarkan id
            if($this->sm->getSampahByIdSampah($id_sampah)) {
                $this->response([
                    'status' => true,
                    'data' => $this->sm->getSampahByIdSampah($id_sampah),
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'msg' => "DATA TIDAK DITEMUKAN",
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        } else { //cari sampah semuanya
            $this->response([
                'status' => true,
                'data' => $this->sm->getAllSampah(),
            ], REST_Controller::HTTP_OK);
        }
    }

    public function sampah_delete()
    {
        $id_sampah = $this->delete('id_sampah');
        if (!empty($id_sampah)) {
            if ($this->sm->deleteSampah($id_sampah) > 0) {
                $this->response([
                    'status' => true,
                    'msg' => "DATA BERHASIL DIHAPUS",
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => true,
                    'msg' => "Id not recognized",
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $this->response([
                'status' => false,
                'msg' => "ID must be included on request",
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    // =======================  PROVINCE  ===================

    public function province_get()
    {
        $id_province = $this->get('id_province');
        if (!empty($id_province)) { // get province by id
            if ($this->pm->getProvinceByProvinceId($id_province)) {
                $this->response([
                    'status' => true,
                    'data' => $this->pm->getProvinceByProvinceId($id_province),
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'msg' => "DATA PROVINSI TIDAK ADA",
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        } else { // get province all
            $this->response([
                'status' => true,
                'data' => $this->pm->getAllProvince(),
            ], REST_Controller::HTTP_OK);
        }
    }

    public function province_post()
    {
        $this->form_validation->set_rules('province_name', 'province_name', 'required');
        $this->form_validation->set_rules('lat', 'lat', 'required');
        $this->form_validation->set_rules('lng', 'lng', 'required');

        $data = [
            "province_name" => $this->post("province_name"),
            "lat" => $this->post("lat"),
            "lng" => $this->post("lng"),
        ];

        if ($this->form_validation->run() == TRUE ) {
            if ($this->pm->addProvince($data) > 0) {
                $this->response([
                    'status' => true,
                    'data' => $data,
                    'msg' => "data berhasil di tambah",
                ], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response([
                'status' => false,
                'msg' => "DATA NOT VALID",
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function province_put()
    {
        $id_province = $this->put('id_province');
        if (!empty($id_province)) {
            $data = [
                'province_name' => $this->put('province_name'),
                'lat' => $this->put('lat'),
                'lng' => $this->put('lng'),
            ];
            $this->db->update('province', $data, ["id" => $id_province]);
            $this->response([
                'status' => true,
                'id' => $id_province,
                'data' => $data,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'msg' => 'field must be filled'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function province_delete()
    {
        $id_province = (int) $this->delete("id_province");
        if (!empty($id_province)) {
            $this->db->delete('province', ["id" => $id_province]);
            $this->response([
                'status' => true,
                'id_province' => $id_province,
                'msg' => 'Province deleted',
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'id_province' => $id_province,
                'msg' => 'failed to delete data',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    // =======================  CITY  ===================

    public function city_get()
    {
        $id_city = $this->get('id_city');
        if (!empty($id_city)) {
            $this->response([
                'status' => true,
                'data' => $this->cm->getCityById($id_city),
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => true,
                'data' => $this->cm->getCityAll(),
            ], REST_Controller::HTTP_OK);
        }
    }

    public function city_post()
    {
        $this->form_validation->set_rules('province_id', 'province_id', 'required');
        $this->form_validation->set_rules('city_name', 'city_name', 'required');

        $data = [
            "province_id" => $this->post("province_id"),
            "city_name" => $this->post("city_name"),
        ];

        if ($this->form_validation->run() == TRUE ) {
            if ($this->cm->addCity($data) > 0) {
                $this->response([
                    'status' => true,
                    'data' => $data,
                ], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response([
                'status' => false,
                'msg' => "DATA NOT VALID",
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function city_put()
    {
        $id_city = $this->put('id_city');
        if (!empty($id_city)) {
            $data = [
                'province_id' => $this->put('province_id'),
                'city_name' => $this->put('city_name'),
            ];
            $this->db->update('city', $data, ["id" => $id_city]);
            $this->response([
                'status' => true,
                'id' => $id_city,
                'data' => $data,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'msg' => 'field must be filled'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function city_delete()
    {
        $id_city = (int) $this->delete("id_city");
        if (!empty($id_city)) {
            $this->db->delete('city', ["id" => $id_city]);
            $this->response([
                'status' => true,
                'id_city' => $id_city,
                'msg' => 'Jenis sampah deleted',
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'id_city' => $id_city,
                'msg' => 'failed to delete data',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    // =======================  USER  ===================

    public function user_get()
    {
        // params isi admin, member atau pemerintah
        $params = (string) $this->get('params');
        
        // params id dari user tsb => untuk profile
        $id = $this->get('id');

        if(!empty($params)) {
            if ($params == "admin") { // params adalah admin
                if (!empty($id)) {
                    if ($this->um->getAdminById($id)) {
                        $this->response([
                            'status' => true,
                            'data' => $this->um->getAdminById($id),
                        ], REST_Controller::HTTP_OK);
                    } else {
                        $this->response([
                            'status' => false,
                            'msg' => "ID ADMIN NOT FOUND",
                        ], REST_Controller::HTTP_NOT_FOUND);
                    }
                } else {
                    if ($this->um->getAdminAll()) {
                        $this->response([
                            'status' => true,
                            'data' => $this->um->getAdminAll(),
                        ], REST_Controller::HTTP_OK);
                    } else {
                        $this->response([
                            'status' => false,
                            'msg' => "ADMIN NOT FOUND",
                        ], REST_Controller::HTTP_NOT_FOUND);
                    }
                }
            } elseif ($params == "pemerintah") { //params adalah pemerintah
                if (!empty($id)) {
                    if ($this->um->getPemerintahById($id)) {
                        $this->response([
                            'status' => true,
                            'data' => $this->um->getPemerintahById($id),
                        ], REST_Controller::HTTP_OK);
                    } else {
                        $this->response([
                            'status' => false,
                            'msg' => 'id pemerintah not found',
                        ], REST_Controller::HTTP_NOT_FOUND);
                    }
                } else {
                    if ($this->um->getPemerintahAll()) {
                        $this->response([
                            'status' => true,
                            'data' => $this->um->getPemerintahAll(),
                        ], REST_Controller::HTTP_OK);
                    } else {
                        $this->response([
                            'status' => true,
                            'msg' => 'data pemerintah kosong',
                        ], REST_Controller::HTTP_NOT_FOUND);
                    }
                }
            } elseif ($params == "member") {
                if (!empty($id)) {
                    if ($this->um->getMemberById($id)) {
                        $this->response([
                            'status' => true,
                            'data' => $this->um->getMemberById($id),
                        ], REST_Controller::HTTP_OK);
                    } else {
                        $this->response([
                            'status' => false,
                            'msg' => 'id Member not found',
                        ], REST_Controller::HTTP_NOT_FOUND);
                    }
                } else {
                    if ($this->um->getMemberAll()) {
                        $this->response([
                            'status' => true,
                            'data' => $this->um->getMemberAll(),
                        ], REST_Controller::HTTP_OK);
                    } else {
                        $this->response([
                            'status' => true,
                            'msg' => 'data Member kosong',
                        ], REST_Controller::HTTP_NOT_FOUND);
                    }
                }
            }
        } else {
            if ($this->um->getAllOfUser()) {
                $this->response([
                    'status' => true,
                    'data' => $this->um->getAllOfUser(),
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'msg' => 'table user kosong',
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function admin_post()
    {
        $this->form_validation->set_rules('user_fullname', 'user_fullname', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('pwd_hash', 'pwd_hash', 'required');
        $this->form_validation->set_rules('gender', 'gender', 'required');
        $this->form_validation->set_rules('hp', 'hp', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('address_number', 'address_number', 'required');
        $this->form_validation->set_rules('rt', 'rt', 'required');
        $this->form_validation->set_rules('rw', 'rw', 'required');
        $this->form_validation->set_rules('fb_account', 'fb_account', 'required');
        $this->form_validation->set_rules('ig_account', 'ig_account', 'required');
        $this->form_validation->set_rules('province', 'province', 'required');
        // $this->form_validation->set_rules('photo', 'photo', 'required');
        // $this->form_validation->set_rules('identity_file', 'identity_file', 'required');
        $this->form_validation->set_rules('lat', 'lat', 'required');
        $this->form_validation->set_rules('lng', 'lng', 'required');
        
        // generator id
        $tgl = date('YmdHis');
        $random = (rand()%50);
        $random2 = (rand()%100);
        $tgl = "AD" . $tgl . $random . $random2;

        $data = [
            'id' => $tgl,
            'user_fullname' => $this->input->post('user_fullname'),	
            'username' => $this->input->post('username'),	
            'pwd_hash' => sha1($this->input->post('pwd_hash')),	
            'gender' => $this->input->post('gender'),	
            'hp' => $this->input->post('hp'),	
            'address' => $this->input->post('address'),	
            'address_number' => $this->input->post('address_number'),	
            'rt' => $this->input->post('rt'),	
            'rw' => $this->input->post('rw'),	
            'fb_account' => $this->input->post('fb_account'),	
            'ig_account' => $this->input->post('ig_account'),	
            'province' => $this->input->post('province'),	
            // 'photo' => $this->input->post('photo'),	
            // 'identity_file' => $this->input->post('identity_file'),	
            'level' => 2,
            'lat' => $this->input->post('lat'),	
            'lng' => $this->input->post('lng')
        ];

        
        if ($this->form_validation->run() == TRUE) {
            if ($this->um->insertAdmin($data) > 0) {
                $this->response([
                    'status' => true,
                    'data' => $data,
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => true,
                    'msg' => 'SERVER ERROR',
                ], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response([
                'status' => false,
                'data' => 'All Field must be written',
            ], REST_Controller::HTTP_OK);
        }
    }

    public function pemerintah_post()
    {
        $this->form_validation->set_rules('user_fullname', 'user_fullname', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('pwd_hash', 'pwd_hash', 'required');
        $this->form_validation->set_rules('gender', 'gender', 'required');
        $this->form_validation->set_rules('hp', 'hp', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('address_number', 'address_number', 'required');
        $this->form_validation->set_rules('rt', 'rt', 'required');
        $this->form_validation->set_rules('rw', 'rw', 'required');
        $this->form_validation->set_rules('fb_account', 'fb_account', 'required');
        $this->form_validation->set_rules('ig_account', 'ig_account', 'required');
        $this->form_validation->set_rules('province', 'province', 'required');
        // $this->form_validation->set_rules('photo', 'photo', 'required');
        // $this->form_validation->set_rules('identity_file', 'identity_file', 'required');
        $this->form_validation->set_rules('lat', 'lat', 'required');
        $this->form_validation->set_rules('lng', 'lng', 'required');
        
        // generator id
        $tgl = date('YmdHis');
        $random = (rand()%50);
        $random2 = (rand()%100);
        $tgl = "PE" . $tgl . $random . $random2;

        $data = [
            'id' => $tgl,
            'user_fullname' => $this->input->post('user_fullname'),	
            'username' => $this->input->post('username'),	
            'pwd_hash' => sha1($this->input->post('pwd_hash')),	
            'gender' => $this->input->post('gender'),	
            'hp' => $this->input->post('hp'),	
            'address' => $this->input->post('address'),	
            'address_number' => $this->input->post('address_number'),	
            'rt' => $this->input->post('rt'),	
            'rw' => $this->input->post('rw'),	
            'fb_account' => $this->input->post('fb_account'),	
            'ig_account' => $this->input->post('ig_account'),	
            'province' => $this->input->post('province'),	
            // 'photo' => $this->input->post('photo'),
            // 'identity_file' => $this->input->post('identity_file'),	
            'level' => 1,	
            'lat' => $this->input->post('lat'),	
            'lng' => $this->input->post('lng')
        ];

        
        if ($this->form_validation->run() == TRUE) {
            if ($this->um->insertPemerintah($data) > 0) {
                $this->response([
                    'status' => true,
                    'data' => $data,
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => true,
                    'msg' => 'SERVER ERROR',
                ], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response([
                'status' => true,
                'data' => 'All Field must be written',
            ], REST_Controller::HTTP_OK);
        }
    }

    public function member_post()
    {
        $this->form_validation->set_rules('user_fullname', 'user_fullname', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('pwd_hash', 'pwd_hash', 'required');
        $this->form_validation->set_rules('gender', 'gender', 'required');
        $this->form_validation->set_rules('hp', 'hp', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('address_number', 'address_number', 'required');
        $this->form_validation->set_rules('rt', 'rt', 'required');
        $this->form_validation->set_rules('rw', 'rw', 'required');
        $this->form_validation->set_rules('fb_account', 'fb_account', 'required');
        $this->form_validation->set_rules('ig_account', 'ig_account', 'required');
        $this->form_validation->set_rules('province', 'province', 'required');
        // $this->form_validation->set_rules('photo', 'photo', 'required');
        // $this->form_validation->set_rules('identity_file', 'identity_file', 'required');
        $this->form_validation->set_rules('lat', 'lat', 'required');
        $this->form_validation->set_rules('lng', 'lng', 'required');

        // generator id
        $tgl = date('YmdHis');
        $random = (rand()%50);
        $random2 = (rand()%100);
        $tgl = "ME" . $tgl . $random . $random2;
        
        $data = [
            'id' => $tgl,
            'user_fullname' => $this->input->post('user_fullname'),	
            'username' => $this->input->post('username'),	
            'pwd_hash' => sha1($this->input->post('pwd_hash')),	
            'gender' => $this->input->post('gender'),	
            'hp' => $this->input->post('hp'),	
            'address' => $this->input->post('address'),	
            'address_number' => $this->input->post('address_number'),	
            'rt' => $this->input->post('rt'),	
            'rw' => $this->input->post('rw'),	
            'fb_account' => $this->input->post('fb_account'),	
            'ig_account' => $this->input->post('ig_account'),	
            'province' => $this->input->post('province'),	
            // 'photo' => $this->input->post('photo'),	
            // 'identity_file' => $this->input->post('identity_file'),	
            'level' => 0,	
            'lat' => $this->input->post('lat'),	
            'lng' => $this->input->post('lng')
        ];

        
        if ($this->form_validation->run() == TRUE) {
            if ($this->um->insertMember($data) > 0) {
                $this->response([
                    'status' => true,
                    'data' => $data,
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => true,
                    'msg' => 'SERVER ERROR',
                ], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response([
                'status' => false,
                'data' => 'All Field must be written',
            ], REST_Controller::HTTP_OK);
        }
    }

    // =========================== JENIS SAMPAH =======================
    public function jenis_get()
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

    public function jenis_post()
    {
        $this->form_validation->set_rules('nama_jenis_sampah', 'nama_jenis_sampah', 'required');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                "nama_jenis_sampah" => $this->post('nama_jenis_sampah')
            ];
            if ($this->jsm->insertJenisSampah($data) > 0) {
                $this->response([
                    'status' => true,
                    'data' => $data,
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'msg' => 'failed to insert data',
                ], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response([
                'status' => false,
                'msg' => 'Data tidak boleh kosong'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function jenis_put()
    {
        $id_jenis = $this->put('id_jenis_sampah');
        if (!empty($id_jenis)) {
            $data = [
                'nama_jenis_sampah' => $this->put('nama_jenis_sampah')
            ];
            $this->db->update('jenis_sampah', $data, ["id_jenis_sampah" => $id_jenis]);
            $this->response([
                'status' => true,
                'id' => $id_jenis,
                'data' => $data,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'msg' => 'field must be filled'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function jenis_delete()
    {
        $id_jenis = $this->delete("id_jenis_sampah");
        if (!empty($id_jenis)) {
            $this->db->delete('jenis_sampah', ["id_jenis_sampah" => $id_jenis]);
            $this->response([
                'status' => true,
                'id_jenis_sampah' => $id_jenis,
                'msg' => 'Jenis sampah deleted',
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'id_jenis_sampah' => $id_jenis,
                'msg' => 'failed to delete data',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    // ======================= DISTRICT ========================

    public function district_get()
    {
        $district_id = (int)$this->get('district_id');
        if (!empty($district_id)) {
            $this->response([
                'status' => true,
                'data' => $this->dm->getDistrictById($district_id),
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => true,
                'data' => $this->dm->getDistrictAll(),
            ], REST_Controller::HTTP_OK);
        }
    }

    public function district_post()
    {
        $this->form_validation->set_rules('id_city', 'id_city', 'required');
        $this->form_validation->set_rules('district_name', 'district_name', 'required');
        $this->form_validation->set_rules('postal_code', 'postal_code', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = [
                "id_city" => $this->post('id_city'),
                "district_name" => $this->post('district_name'),
                "postal_code" => $this->post('postal_code'),
            ];

            if ($this->dm->insertDistrict($data) > 0) {
                $this->response([
                    'status' => true,
                    'data' => $data,
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'msg' => 'failed to insert data',
                ], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response([
                'status' => false,
                'msg' => 'Data tidak boleh kosong'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function district_put()
    {
        $id_district = (int) $this->put('id_district');
        if (!empty($id_district)) {
            $data = [
                'district.id_city' => (int) $this->put('id_city'),
                'district.district_name' => $this->put('district_name'),
                'district.postal_code' => $this->put('postal_code'),
            ];
            $this->db->update('district', $data, ["district.id" => $id_district]);
            $this->response([
                'status' => true,
                'id' => $id_district,
                'data' => $data,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'msg' => 'field must be filled'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function district_delete()
    {
        $id_district = $this->delete("id_district");
        if (!empty($id_district)) {
            if ($this->dm->deleteDistrict($id_district) > 0) {
                $this->response([
                    'status' => true,
                    'msg' => "success deleted"
                ], REST_Controller::HTTP_NO_CONTENT);
            } else {
                $this->response([
                    'status' => false,
                    'msg' => "ID district not found"
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $this->response([
                'status' => false,
                'msg' => "ID must be included as well :)"
            ], REST_Controller::HTTP_BAD_REQUEST);
        }   
    }

    // ======================= grafik ========================

    public function grafik_get()
    {
        $params = (string) $this->get('params');
        $id = $this->get('id');
        // var_dump(!empty($id));die;
        if ($params = "jenis_sampah" && empty($id)) {
            $this->response([
                'status' => true,
                'data' => $this->jsm->countJenisSampah(),
            ], REST_Controller::HTTP_OK);
        } if ($params = "jenis_sampah" && !empty($id)) {
            $this->response([
                'status' => true,
                'data' => $this->jsm->countJenisSampahById($id),
            ], REST_Controller::HTTP_OK);
        }
    }

    // ======================= AUTH ============================

    public function auth_post()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $data = [
                "username" => $this->post("username"),
                "pwd_hash" => sha1($this->post("password")),
                "level" => 2,
            ];
            $query = $this->um->cekLogin($data);
            if ($query->num_rows() > 0) {
                $query = $query->result_array();
                $this->response([
                    'status' => true,
                    'data' => $query,
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'msg' => "user tidak ada",
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            $this->response([
                'status' => false,
                'msg' => "field tidak boleh kosong",
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    // ======================= SENSOR ============================

    public function sensor_get()
    {
        $this->response([
            'status' => true,
            'data' => [
                'co' => $this->tpaM->getCo(),
                'co2' => $this->tpaM->getCo2(),
                'wind' => $this->tpaM->getWind(),
                'methane' => $this->tpaM->getCo(),
                'temperature' => $this->tpaM->getTemperature(),
                'humidity' => $this->tpaM->getHumidity(),
                'wind_direction' => $this->tpaM->getWindDirection(),
                'voltage' => $this->tpaM->getVoltage(),
            ],
        ], REST_Controller::HTTP_OK);
    }
}