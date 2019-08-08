<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Province_model extends CI_Model {

    public function getAllProvince()
    {
        return $this->db->get('province')->result_array();
    }

    public function getProvinceByProvinceId($id_province)
    {
        $query = $this->db->select("*")
        ->from('province')
        ->where('id', $id_province)
        ->get()->result_array();

        if (!empty($query)) {
            return $query;
        } else {
            return false;
        }
    }

    public function addProvince($data)
    {
        $this->db->insert('province', $data);
        return $this->db->affected_rows();
    }

    public function updateProvince($data, $id_province)
    {
        if (!empty($id_province)) {
            $this->db->update('province', $data, ["id" => $id_province]);
            return true;
        } else {
            return false;
        }
    }

    public function deleteProvince($id_province)
    {
        $this->db->delete('province')->where('id', $id_province);
        return $this->db->affected_rows();
    }

}

/* End of file Province_model.php */
