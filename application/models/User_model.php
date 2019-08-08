<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    // ================ ALL USER ======================

    public function getAllOfUser()
    {
        $query = $this->db->get('user')->result_array();
        if (!empty($query)) {
            return $query;
        } else {
            return false;
        }
    }

    public function cekLogin($data)
    {
        return $this->db->get_where('user', $data);
    }

    // ============================== ADMIN =================================

    public function getAdminAll()
    {
        $query = $this->db->get_where('user', ["level" => 2])->result_array();
        if (!empty($query)) {
            return $query;
        } else {
            return false;
        }
    }

    public function getAdminById($id = null)
    {
        if ($id == null || $id == "") {
            return false;
        } else {
            $query = $this->db->get_where('user', ["level" => 2, "id" => $id])->result_array();
            if (!empty($query)) {
                return $query;
            } else {
                return false;
            }
        }
    }

    public function insertAdmin($data)
    {
        $data["photo"] = "photo/" . $this->do_upload("photo", "jpg", "photo");
        $data["identity_file"] = "identity_file/" . $this->do_upload("identity_file", "jpg", "identity_file");
        $this->db->insert('user', $data);
        return $this->db->affected_rows();
    }

    // =============================== PEMERINTAH ============================

    public function getPemerintahAll()
    {
        $query =  $this->db->get_where('user', ["level" => 1])->result_array();
        if (!empty($query)) {
            return $query;
        } else {
            return false;
        }
    }

    public function getPemerintahById($id = null)
    {
        if ($id == null || $id == "") {
            return false;
        } else {
            $query = $this->db->get_where('user',["level" => 1, "id" => $id])->result_array();
            if (!empty($query)) {
                return $query;
            } else {
                return false;
            }
        }
    }

    public function insertPemerintah($data)
    {
        $data["photo"] = "photo/" . $this->do_upload("photo", "jpg", "photo");
        $data["identity_file"] = "identity_file/" . $this->do_upload("identity_file", "jpg", "identity_file");
        $this->db->insert('user', $data);
        return $this->db->affected_rows();
    }

    // =============================== MEMBER =============================

    public function getMemberAll()
    {
        $query = $this->db->get_where('user', ["level" => 0])->result_array();
        if (!empty($query)) {
            return $query;
        } else {
            return false;
        }
    }

    public function getMemberById($id = null)
    {
        if ($id == null || $id == "") {
            return false;
        } else {
            $query = $this->db->get_where('user',["level" => 0, "id" => $id])->result_array();
            if (!empty($query)) {
                return $query;
            } else {
                return false;
            }
        }
    }

    public function insertMember($data)
    {
        $data["photo"] = "photo/" . $this->do_upload("photo", "jpg", "photo");
        $data["identity_file"] = "identity_file/" . $this->do_upload("identity_file", "jpg", "identity_file");
        $this->db->insert('user', $data);
        return $this->db->affected_rows();
    }


    // UPLOAD FILE METHOD
    public function do_upload($field, $extension = null, $dest = null) // field gambar, destinasi folder
    {
        $now = date('dmYHis');
		$uploaddest = base_url("assets/$dest/");
		$file_name = $now . "." . $extension;
        $uploadfile = $_SERVER['DOCUMENT_ROOT'] . "/lowcarbo/assets/$dest/" . $file_name;
        if (move_uploaded_file($_FILES["$field"]["tmp_name"], $uploadfile)) {
			return $file_name;
		} else {
			return false;     
		}
    }
}

/* End of file User_model.php */
