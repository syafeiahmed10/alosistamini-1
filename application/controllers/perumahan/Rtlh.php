<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rtlh extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('perumahan/model_rtlh');
        $this->load->model('model_for_all');
        $this->load->library('pagination');
        $this->load->helper('alosista_helper');
        is_logged_in();
    }


    public function index()
    {
        $data['start'] = $this->uri->segment(4);
        $data['title'] = "RTLH";
        $data['countRow'] = $this->model_rtlh->countRow();
        $data['base_url'] = base_url('perumahan/rtlh/index');
        $this->pagination->initialize(paginationConfig($data['base_url'], $data['countRow']));
        $data['dataSatu'] = $this->model_rtlh->get_table(paginationConfig($data['base_url'], $data['countRow'])['per_page'], $data['start']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('perumahan/rtlh/index', $data);
        $this->load->view('templates/footer');
    }

    // Add a new item
    public function add()
    {
        $data['title'] = "Tambah RTLH";
        $data['dataSatu'] =  $this->model_for_all->get_kabupaten_jateng();
        $this->form_validation->set_rules('unit_pbdt', 'Unit PBDT', 'trim|required|number');
        $this->form_validation->set_rules('unit_dtpfmotm', 'Unit DTPFMOTM', 'trim|required|number');
        $this->form_validation->set_rules('unit_dtks', 'Unit DTKS', 'trim|required|number');
        $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required|number');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_message('required', '{field} harus diisi');

        if ($this->form_validation->run() == TRUE) {
            $this->model_rtlh->add();
            redirect('perumahan/rtlh');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('perumahan/rtlh/add', $data);
            $this->load->view('templates/footer');
        }
    }

    //Update one item
    public function update($id = NULL)
    {
    }

    //Delete one item
    public function delete($id = NULL)
    {
    }
}

/* End of file Rtlh.php */
