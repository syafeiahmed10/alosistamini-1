<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penanganan_kumuh extends CI_Controller
{

    public function index()
    {
        $data['penanganan'] = $this->Model_penanganan_kumuh->getAllPenangananKumuh();
        $this->header();
        $this->load->view('kawasan/penanganan/view_penanganan_kumuh', $data);
        $this->footer();
    }

    public function tambah()
    {
        $data['lokasikumuh'] = $this->Model_lokasi_kumuh->getAllSkKumuh();
        $this->form_validation->set_rules('nama_lokasi', 'Nama Kawasan', 'required');
        // $this->form_validation->set_rules('luas_lokasi', 'Luas', 'required|decimal');
        // // $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
        // $this->form_validation->set_rules('lingkup_administratif', 'Lingkup Administratif', 'required');
        // $this->form_validation->set_rules('latitude', 'Latitude', 'required|decimal');
        // $this->form_validation->set_rules('longitude', 'Longitude', 'required|decimal');
        // $this->form_validation->set_rules('tingkat_kumuh', 'Tingkat Kumuh', 'required');




        if ($this->form_validation->run() == FALSE) {

            $this->header();
            $this->load->view('kawasan/penanganan/view_penanganan_kumuh_tambah', $data);
            $this->footer();
        } else {
            $this->Model_penanganan_kumuh->tambahDataPenanganan();
            $this->session->set_flashdata('flash', 'ditambahkan');


            redirect('penanganan_kumuh');
        }
    }

    public function header()
    {
        $this->load->view('reuse_template/view_header');
    }

    public function footer()
    {
        $this->load->view('reuse_template/view_footer');
    }
}

/* End of file Penanganan_kumuh.php */
