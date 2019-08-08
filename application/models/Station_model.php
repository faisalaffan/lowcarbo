<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Station_model extends CI_Model {

    public function getAllStation()
    {
        return $this->db->select("*")
        ->from("station")
        ->join("tpa", "station.id_tpa = tpa.id_tpa")
        ->get()
        ->result_array();
    }

    public function getStationById($id_station)
    {
        return $this->db->get_where('station', ["id_station" => $id_station])->result_array();
    }

    public function getStationByIdTpa($id_tpa)
    {
        return $this->db->get_where('station', ["id_tpa" => $id_tpa])->result_array();
    }

    public function addStation($data)
    {
        $this->db->insert('station', $data);
        return $this->db->affected_rows();
    }

    public function deleteStation($id_station)
    {
        $this->db->delete('station', ['id_station' => $id_station]);
        return $this->db->affected_rows();
    }

}

/* End of file Station_model.php */
