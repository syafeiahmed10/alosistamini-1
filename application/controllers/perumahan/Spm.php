<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Spm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('perumahan/model_spm');
        $this->load->model('model_for_all');
        $this->load->library('pagination');
        $this->load->helper('alosista_helper');
        is_logged_in();
    }

    public function index()
    {
        $data['start'] = $this->uri->segment(4);
        $data['title'] = "SPM";
        $data['countRow'] = $this->model_spm->countRow();
        $data['base_url'] = base_url('perumahan/spm/index');
        $this->pagination->initialize(paginationConfig($data['base_url'], $data['countRow']));
        $data['dataSatu'] = $this->model_spm->get_table(paginationConfig($data['base_url'], $data['countRow'])['per_page'], $data['start']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('perumahan/spm/index', $data);
        $this->load->view('templates/footer');
    }
}

/* End of file Spm.php */
