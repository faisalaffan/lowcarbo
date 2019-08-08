<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class City_model extends CI_Model {

    public function getCityAll()
    {
        return $this->db->select('city.id, city.city_name, city.province_id, province.province_name')
        ->from("city")
        ->join("province", "city.province_id = province.id")
        ->get()->result_array();
    }

    public function addCity($data)
    {
        $this->db->insert('city', $data);
        return $this->db->affected_rows();
    }

}

/* End of file City_model.php */
