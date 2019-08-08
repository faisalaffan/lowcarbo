<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tpa_model extends CI_Model {

	public function getTpaByProv()
    {
        $query = $this->db->query('SELECT p.province_name, p.lat, p.lng, COUNT(*) as jumlah_tpa FROM tpa INNER JOIN district d ON district_id = d.id INNER             JOIN city c ON d.id_city = c.id INNER JOIN province p ON c.province_id = p.id GROUP BY p.province_name')->result_array();
        return $query;
    }
    public function getCo2()
    {
        $query = $this->db->query('SELECT * FROM tbl_co2')->result_array();
        return $query;
    }
    public function getCo()
    {
        $query = $this->db->query('SELECT * FROM tbl_co')->result_array();
        return $query;
    }

    public function getWind()
    {
        $query = $this->db->query('SELECT * FROM tbl_wind')->result_array();
        return $query;
    }
    public function getWindDirection()
    {
        $query = $this->db->query('SELECT * FROM tbl_winddirection')->result_array();
        return $query;
    }
    public function getVoltage()
    {
        $query = $this->db->query('SELECT * FROM tbl_voltage')->result_array();
        return $query;
    }
    public function getMethane()
    {
        $query = $this->db->query('SELECT * FROM tbl_methane')->result_array();
        return $query;
    }

    public function getHumidity()
    {
        $query = $this->db->query('SELECT * FROM tbl_humidity')->result_array();
        return $query;
    }

    public function getTemperature()
    {
        $query = $this->db->query('SELECT * FROM tbl_temperature')->result_array();
        return $query;
    }

	public function getAllTpa()
	{
		// $query = $this->db->select("*")->from('tpa')
		// ->join("district", "tpa.district_id = district.id")
		// ->join("city", "district.id_city = city.id")
		// ->join("province", "city.province_id = province.id")
		// ->get()
		// ->result_array();

		$query = $this->db->query('SELECT *, SUM(sampah.berat) AS berat_sampah FROM tpa INNER JOIN tps ON tpa.id_tpa = tps.id_tpa INNER JOIN sampah ON tps.id_tps = sampah.id_tps INNER JOIN district ON tpa.district_id = district.id GROUP BY tpa.nama_tpa')->result_array();
        return $query;

		// $berat = $this->db->select("sampah.berat")->from('sampah')
		// ->join("tps", "sampah.id_tps = tps.id_tps")
		// ->join("tpa", "tps.id_tpa = tpa.id_tpa")
		// ->where("tpa.id_tpa", "TPA201908010923254967")->get()->result_array();

		// foreach ($query as $index => $value) {
		// 	$query[$index]['berat'] = "faisal";
		// 	// $query[$index] = "faisal";
		// 	// var_dump($index);
		// }

		return $query;
	}

	public function addTpa($data)
	{
		$this->db->insert('tpa', $data);
		return $this->db->affected_rows();
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
			return false;
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$data = array('upload_data' => $this->upload->data());
			return $type . '/' . $data['upload_data']['file_name'];
		}
	}

	public function cekTpa($data)
	{
		return $this->db->get_where('tpa', $data);
	}

	public function getTpaById($id_tpa)
	{
		$data = $this->db->select('*')
		->from('tpa')
		->where('id_tpa', $id_tpa)
		->get()
		->result_array();
		return $data;
	}

	public function deleteTpa($id_tpa)
	{
		$this->db->delete('tpa', ['id_tpa' => $id_tpa]);
		return $this->db->affected_rows();
	}

}

/* End of file Tpa_model.php */
