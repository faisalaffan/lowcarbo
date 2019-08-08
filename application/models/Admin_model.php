<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function cekAdmin($data)
	{
		return $this->db->get_where('admin', $data);
	}

}

/* End of file Admin_model.php */
