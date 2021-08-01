<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->helper('alosista_helper');
        $this->load->model('model_dashboard');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['dataSatu'] = $this->model_dashboard->get_sisa_kumuh();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
}

/* End of file Dashboard.php */
