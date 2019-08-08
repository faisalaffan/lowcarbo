<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class District_model extends CI_Model {

    public function getDistrictAll()
    {
        return $this->db->select("district.id, city.city_name, district.postal_code, district.district_name")
        ->from("district")
        ->join("city", "district.id_city = city.id")
        ->join("province", "city.province_id = province.id")
        ->get()
        ->result_array();
    }

    public function getDistrictById($district_id)
    {
        // var_dump('hallo');
        return $this->db->select("*")->from('district')->where("id", $district_id)->get()->result_array();
    }

    public function insertDistrict($data)
    {
        $this->db->insert('district', $data);
        return $this->db->affected_rows();
    }

    public function deleteDistrict($district_id)
    {
        $this->db->delete('district', ["id" => $district_id]);
        return $this->db->affected_rows();
    }

}

/* End of file District_model.php */
