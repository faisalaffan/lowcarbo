<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sampah_model extends CI_Model {

	public function getAllSampah()
	{
		// return $this->db->get('sampah')->result_array();
		$query = $this->db->select('*')->from('sampah')
		->join('tps', 'tps.id_tps = sampah.id_tps')
		->join('tpa', 'tpa.id_tpa = tps.id_tpa')
		->join('jenis_sampah', 'jenis_sampah.id_jenis_sampah = sampah.id_jenis_sampah')
		->get()->result_array();
		return $query;
	}

	public function getSampahByIdSampah($id_sampah)
	{
		$query = $this->db->select("*")
		->from("sampah")
		->where('id_sampah', $id_sampah)
		->get()
		->result_array();
		if (!empty($query)) {
			return $query;
		} else {
			return false;
		}
	}

	public function getAllSampahByIdTps($id_tps)
	{
		$query = $this->db->select('*')->from('sampah')->where('id_tps', $id_tps)
		->where('tertampung', 1)
		->or_where('tertampung', 2)
		->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return null;
		}
	}
	public function getAllSampahByIdTpa($id_tpa)
	{
		$query = $this->db->select('*')->from('sampah')
		->join('tps', 'tps.id_tps = sampah.id_tps')
		->join('tpa', 'tpa.id_tpa = tps.id_tpa')
		->where('tpa.id_tpa', $id_tpa)
		->where('tertampung', 1)
		->or_where('tertampung', 2)
		->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return null;
		}
	}

	public function getSampahDetail($id_sampah)
	{
		$query = $this->db->select('*')->from('sampah')
		->join('jenis_sampah', 'sampah.id_jenis_sampah = jenis_sampah.id_jenis_sampah')
		->join('tps', 'sampah.id_tps = tps.id_tps')
		->where('id_sampah', $id_sampah)
		->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return null;
		}
	}

	public function getAllSampahByIdTpsCount($id_tps)
	{
		$query = $this->db->select('*')->from('sampah')->where('id_tps', $id_tps)
		->where('tertampung', 1)
		->or_where('tertampung', 2)
		->get()->result_array();
		$jenis_sampah = $this->db->get('jenis_sampah')->result_array();
		$data = [];

		$index = 0;
		foreach ( $jenis_sampah as $js ) {
			$data[$index]['nama_jenis_sampah'] = null;
			foreach($query as $s) {
				if ($s['id_jenis_sampah'] == $js['id_jenis_sampah']) {
					// $data[$index][$js['nama_jenis_sampah']] += 1;
					// $data[$index]['nama_jenis_sampah'] += 1;
					$data[$index]['nama_jenis_sampah'] += $s['berat'];
				}
			}
			$index++;
		}
		return $data;
	}

	public function getAllSampahByIdTpaCount($id_tpa)
	{
		$query = $this->db->select('*')->from('sampah')
		->join('jenis_sampah', 'sampah.id_jenis_sampah = jenis_sampah.id_jenis_sampah')
		->join('tps', 'sampah.id_tps = tps.id_tps')
		->where('id_tpa', $id_tpa)
		->where('tertampung', 1)
		->or_where('tertampung', 2)
		->get()->result_array();
		$jenis_sampah = $this->db->get('jenis_sampah')->result_array();
		$data = [];

		$index = 0;
		foreach ( $jenis_sampah as $js ) {
			$data[$index]['nama_jenis_sampah'] = null;
			foreach($query as $s) {
				if ($s['id_jenis_sampah'] == $js['id_jenis_sampah']) {
					// $data[$index][$js['nama_jenis_sampah']] += 1;
					// $data[$index]['nama_jenis_sampah'] += 1;
					$data[$index]['nama_jenis_sampah'] += $s['berat'];
				}
			}
			$index++;
		}
		return $data;
	}

	public function addSampah($data)
	{
        if ($this->form_validation->run() == TRUE) {
			// $data['gambar'] = $this->do_upload('sampah', 'gambar');
            $this->db->insert('sampah', $data);
			return $this->db->affected_rows();
        } else {
            return 0;
        }
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
	
		if ( ! $this->upload->do_upload($gambar))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->response($error, REST_Controller::HTTP_BAD_REQUEST);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$data = array('upload_data' => $this->upload->data());
			return $type . '/' . $data['upload_data']['file_name'];
		}
	}

	public function getSampahByIdTpsNotTertampung($id_tps)
	{
		$query = $this->db->select('*')->from('sampah')->where('id_tps', $id_tps)->where('tertampung', 0)->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return null;
		}
	}

	public function getSampahByIdTpaAndTps($id_tpa, $id_tps)
	{
		$query = $this->db->select('*')->from('sampah')
		->join('tps', 'tps.id_tps = sampah.id_tps')
		->where('tps.id_tpa', $id_tpa)
		->where('sampah.id_tps', $id_tps)
		->where('tertampung', 1)->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return null;
		}
	}

	public function getSampahInTps($id_tps)
	{
		$query = $this->db->select('*')->from('sampah')->where('id_tps', $id_tps)
		->where('tertampung', 1)
		->or_where('tertampung !=', 2)
		->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return null;
		}
	}

	public function adminGetGrafik()
	{
		$query = $this->db->select('*')->from('sampah')
		->join('jenis_sampah', 'sampah.id_jenis_sampah = jenis_sampah.id_jenis_sampah')
		->join('tps', 'sampah.id_tps = tps.id_tps')
		->where('tertampung', 1)
		->or_where('tertampung', 2)
		->get()->result_array();
		$jenis_sampah = $this->db->get('jenis_sampah')->result_array();
		$data = [];

		$index = 0;
		foreach ( $jenis_sampah as $js ) {
			$data[$index]['nama_jenis_sampah'] = null;
			foreach($query as $s) {
				if ($s['id_jenis_sampah'] == $js['id_jenis_sampah']) {
					// $data[$index][$js['nama_jenis_sampah']] += 1;
					$data[$index]['nama_jenis_sampah'] += $s['berat'];
				}
			}
			$index++;
		}
		return $data;
	}

	public function deleteSampah($id_sampah)
	{
		$this->db->delete('sampah', ["id_sampah" => $id_sampah]);
		return $this->db->affected_rows();
	}
}

/* End of file Sampah_model.php */
