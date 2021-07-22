<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembangunan_rumah extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_pembangunan_rumah');
        $this->load->model('model_for_all');
        $this->load->library('pagination');
        $this->load->helper('alosista_helper');
        is_logged_in();
    }

    public function index()
    {
    }
}

/* End of file Pembangunan_rumah.php */
