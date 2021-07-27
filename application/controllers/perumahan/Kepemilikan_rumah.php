<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kepemilikan_rumah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('perumahan/model_kepemilikan_rumah');
        $this->load->model('model_for_all');
        $this->load->library('pagination');
        $this->load->helper('alosista_helper');
        is_logged_in();
    }

    public function index()
    {
        $data['start'] = $this->uri->segment(4);
        $data['title'] = "Kepemilikan Rumah";
        $data['countRow'] = $this->model_kepemilikan_rumah->countRow();
        $data['base_url'] = base_url('perumahan/kepemilikan_rumah/index');
        $this->pagination->initialize(paginationConfig($data['base_url'], $data['countRow']));
        $data['dataSatu'] = $this->model_kepemilikan_rumah->get_table(paginationConfig($data['base_url'], $data['countRow'])['per_page'], $data['start']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('perumahan/kepemilikan_rumah/index', $data);
        $this->load->view('templates/footer');
    }
}

/* End of file Kepemilikan_rumah.php */