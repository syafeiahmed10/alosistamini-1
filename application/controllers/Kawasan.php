<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kawasan extends CI_Controller
{



    public function lokasi_kumuh()
    {

        $data['lokasikumuh'] = $this->Model_lokasi_kumuh->getAllLokasikumuh();
        $this->header();
        $this->load->view('kawasan/lokasi/view_lokasi_kumuh', $data);
        $this->footer();
    }

    public function lokasi_kumuh_tambah()
    {

        $this->form_validation->set_rules('nama_lokasi', 'Nama Kawasan', 'required');
        $this->form_validation->set_rules('luas_awal', 'Luas', 'required|decimal');
        // $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('lingkup_administratif', 'Lingkup Administratif', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|decimal');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required|decimal');
        $this->form_validation->set_rules('status', 'Tingkat Kumuh', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->header();
            $this->load->view('kawasan/lokasi/view_lokasi_kumuh_tambah');
            $this->footer();
        } else {
            $this->Model_lokasi_kumuh->tambahDataLokasi();
            $this->session->set_flashdata('add', 'ditambahkan');


            redirect('Kawasan/lokasi_kumuh');
        }
    }

    public function penanganan_kumuh()
    {
        $this->header();
        $this->load->view('kawasan/penanganan/view_penanganan_kumuh');
        $this->footer();
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

/* End of file Controllername.php */
