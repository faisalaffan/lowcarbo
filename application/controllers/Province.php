<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Province extends CI_Controller {

    public function index()
    {
        $data['title'] = "Province";
        $data['halaman'] = "Province";
        $this->load->view('templates/templates', $data);
    }

}

/* End of file Province.php */
