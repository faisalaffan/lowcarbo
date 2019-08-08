<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class District extends CI_Controller {

    public function index()
    {
        $data['title'] = "District";
        $data['halaman'] = "District";
        $this->load->view('templates/templates', $data);
    }

}

/* End of file District.php */
