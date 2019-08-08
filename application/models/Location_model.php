<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Location_model extends CI_Model {

    public function getLocation($id = null)
    {
        if ($id === null) {
            return $this->db->get('location')->result_array();
        } else {
            return $this->db->from('location')->where('id', $id)->get()->result_array();
        }
    }

    public function deleteLocation($id)
    {
        $data = $this->db->get_where('location', ['id' => $id])->num_rows();
        if ($data > 0) {
            $this->db->delete('location', ['id' => $id]);
            return $data;
        } 
    }

    public function addLocation($data)
    {
        // for ($i=1; $i < $this->db->get('location')->num_rows(); $i++) { 
        //     $query = $this->db->select('jenis, lat, lng, title')
        //     ->where('id', $i)
        //     ->get('location');
        // }
        // var_dump($query);

        // $row = $query->row_array();  //returns a single row
        // var_dump($row);

        // if($row['title'] == 'hallo faisal')
        // {
        //     var_dump('yaa');
        // }
        // else
        // {
        //     var_dump('tidak');
        // }
        $this->form_validation->set_rules("jenis", "jenis", "in_list[1,2]");
        
        if ($this->form_validation->run() == TRUE) {
			$data['gambar'] = $this->do_upload('tps', 'gambar');
            $this->db->insert('location', $data);
			return $this->db->affected_rows();
        } else {
            return 0;
        }
    }

    public function updateLocation($data, $id)
    {
        $this->db->update('location', $data, ['id' => $id]);
        return $this->db->affected_rows();
	}
	
	public function do_upload($type, $gambar)
	{
		$now = date('dmYHis');
		$config['upload_path']          = "./assets/$type";
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10000;
		$config['file_name']             = $now;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload($gambar))
		{
			$error = array('error' => $this->upload->display_errors());
		}
		else
		{
			// $halo = "macOS-Mojave-Night-wallpaper4.jpg";
			// $halo = preg_replace("/[^a-zA-Z]/", "", $halo);
			// $halo = substr_replace($halo, '.jpg', -3);
			$data = array('upload_data' => $this->upload->data());
			return $type . '/' . $data['upload_data']['file_name'];
		}
	}
}

/* End of file Location_model.php */
