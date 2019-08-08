<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Co extends CI_Controller {

    public function index()
    {
        $data['title'] = "Co";
        $data['halaman'] = "Co";
        $this->load->view('templates/templates', $data);
    }

}

/* End of file Co.php */
