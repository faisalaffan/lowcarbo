<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Wind extends CI_Controller {

    public function index()
    {
        $data['title'] = "Wind";
        $data['halaman'] = "Wind";
        $this->load->view('templates/templates', $data);
    }

}

/* End of file Wind.php */
