<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tps_model extends CI_Model {

	public function getAllTps()
	{
		return $this->db->select('id_tps, tps.nama_tps, tpa.nama_tpa, lat_tps, lng_tps, alamat_tps, gambar_tps, username_tps, password_tps')
		->from('tps')
		->join('tpa', 'tpa.id_tpa = tps.id_tpa')
		->get()->result_array();
	}

	public function getTpsByIdTpa($id_tpa)
	{
		return $this->db->get_where('tps', ['id_tpa' => $id_tpa])->result_array();
	}

	public function addTps($data)
	{
		if ($this->form_validation->run() == TRUE) {
            $this->db->insert('tps', $data);
			return $this->db->affected_rows();
        } else {
            return 0;
        }
	}

	public function updateTps($data)
	{
        if ($this->form_validation->run() == TRUE) {
			$data['gambar_tps'] = $this->do_upload('tps', 'gambar_tps');
            $this->db->update('tps', $data, ['id_tps' => 8]);
			return $this->db->affected_rows();
        } else {
            return 0;
        }
	}

	public function cekTps($data)
	{
		return $this->db->get_where('tps', $data);
	}

	public function getTpsById($id)
	{
		// var_dump($id);die;
		$data = $this->db->select('*')
		->from('tps')
		->where('id_tps', $id)
		->get()
		->result_array();
		return $data;
	}

	public function hapusTps($id_tps)
	{
		return $this->db->delete('tps', ['id_tps' => $id_tps]);
	}

	public function do_upload($type, $gambar)
	{
		$this->load->helper(array('form', 'url'));
	
		$now = date('dmYHis');
		$config['upload_path']          = "./assets/$type";
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10000;
		$config['file_name']             = $now;
	
		$this->load->library('upload',$config);
	
		$uploaddir = "./assets/$type";
		$file_name = $now.".jpg";
		$uploadfile = $_SERVER['DOCUMENT_ROOT'] . "/lowcarbo/assets/tps/".$file_name;

		if (move_uploaded_file($_FILES[$gambar]['tmp_name'], $uploadfile)) {
			$dataDB['status'] = 'success';       
			$dataDB['filename'] = $file_name;
			return false;
		} else {
			$dataDB['status'] =  'failure';  
			return $type . '/' . $file_name;     
		}
	}
}

/* End of file Tps_model.php */
