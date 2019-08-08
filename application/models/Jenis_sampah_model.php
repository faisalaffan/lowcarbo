<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_sampah_model extends CI_Model {

	public function getAllJenisSampah()
	{
		return $this->db->get('jenis_sampah')->result_array();
	}

	public function insertJenisSampah($data)
	{
		$this->db->insert('jenis_sampah', $data);
		return $this->db->affected_rows();
	}

	public function countJenisSampah($jenis = null)
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
			$data[$index]['count_jenis_sampah'] = null;
			$data[$index]['nama_jenis_sampah'] = null;
			// $data[$index][$js['nama_jenis_sampah']] = null;
			// var_dump($js);

			// $jenissampah = new stdClass();
			// $jenissampah->nama_jenis_sampah = 0;
			// $jenissampah->nama_jenis_sampah += 1;
			// $sampahArr[] = $jenissampah;

			foreach($query as $sampah) {
				if ($sampah['id_jenis_sampah'] == $js['id_jenis_sampah']) {
					// $data[$index]['nama_jenis_sampah'] += $sampah['berat'];
					// $data[$index][$js['nama_jenis_sampah']] += 1;
					// $data[$index]['count_jenis_sampah'] += 1;
					$data[$index]['count_jenis_sampah'] += 1;
					$data[$index]['nama_jenis_sampah'] = $js['nama_jenis_sampah'];
				}
			}
			$index++;
		}
		return $data;
	}

	public function countJenisSampahById($id, $jenis = null)
	{
		$query = $this->db->select('*')->from('sampah')->where('id_jenis_sampah', $id);
		// var_dump($query->count_all_results());
		return $query->count_all_results();
	}

}

/* End of file Jenis_sampah_model.php */
