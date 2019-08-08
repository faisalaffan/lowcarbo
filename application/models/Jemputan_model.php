<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jemputan_model extends CI_Model {

	public function getJemputanByTpa($id_tpa)
	{
		// return $this->db->get_where('penjemputan', ['id_tpa' => $id_tpa])
		// ->join('tpa', 'tpa.id_tpa = penjemputan.id_tpa')
		// ->result_array();

		return $this->db->select('*')->from('penjemputan')
		->join('sampah', 'sampah.id_sampah = penjemputan.id_sampah')
		->join('tps', 'tps.id_tps = sampah.id_tps')
		->join('tpa', 'tpa.id_tpa = penjemputan.id_tpa')
		->where('penjemputan.id_tpa', $id_tpa)
		->get()->result_array();
	}

	public function getJemputanByTpsAndTpa($id_tpa, $id_tps)
	{
		$data = $this->db->select('*')->from('penjemputan')
		->join('tpa', 'tpa.id_tpa = penjemputan.id_tpa')
		->join('sampah', 'sampah.id_sampah = penjemputan.id_sampah')
		->join('tps', 'tps.id_tps = sampah.id_tps')
		->where('penjemputan.id_tpa', $id_tpa)
		->where('tps.id_tps', $id_tps)
		->get()->result_array();
		var_dump($data);
	}

	public function getJemputanById($id_penjemputan)
	{
		return $this->db->select('*')->from('penjemputan')
		->join('tpa', 'tpa.id_tpa = penjemputan.id_tpa')
		->join('sampah', 'sampah.id_sampah = penjemputan.id_sampah')
		->join('jenis_sampah', 'jenis_sampah.id_jenis_sampah = sampah.id_jenis_sampah')
		->where('penjemputan.id_penjemputan', $id_penjemputan)
		->get()->result_array();
		
	}

	public function getJemputanAll()
	{
		return $this->db->get('penjemputan')->result_array();
	}

	public function addJemputan($data)
	{
		$this->db->insert('sampah', $data);
	}

	public function addPenjemputan($data)
	{
		$this->db->insert('penjemputan', $data);
		$this->db->update('sampah', ['tertampung' => '2'], ['id_sampah' => $data['id_sampah']]);
		return $this->db->affected_rows();
	}

	public function getJemputanTps($id_tpa, $id_tps)
	{
		return $this->db->select('*')->from('penjemputan')
		->join('tpa', 'tpa.id_tpa = penjemputan.id_tpa')
		->join('sampah', 'sampah.id_sampah = penjemputan.id_sampah')
		->join('tps', 'tps.id_tps = sampah.id_tps')
		->where('penjemputan.id_tpa', $id_tpa)
		->where('sampah.id_tps', $id_tps)
		->get()->result_array();

	}
}

/* End of file Jemputan_model.php */
