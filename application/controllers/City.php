<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {

    public function index()
    {
        $data['title'] = "City";
        $data['halaman'] = "City";
        $this->load->view('templates/templates', $data);
    }

}

/* End of file City.php */
