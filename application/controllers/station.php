<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Station extends CI_Controller {

    public function index()
    {
        $data['title'] = "Station";
        $data['halaman'] = "Station";
        $this->load->view('templates/templates', $data);
    }

}

/* End of file Station.php */
