<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {

	public function registerMember($data)
	{
		$this->db->insert('member', $data);
		return $this->db->affected_rows();
	}

	public function cekMember($data)
	{
		return $this->db->get_where('member', $data);
	}

	public function getAllMember()
	{
		return $this->db->get('member')->result_array();
	}

	public function addMember($data)
	{
		$this->db->insert('member', $data);
		return $this->db->affected_rows();
	}

}

/* End of file Member_model.php */
