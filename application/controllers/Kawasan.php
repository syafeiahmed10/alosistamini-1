<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kawasan extends CI_Controller
{

    // =======================================================================LOKASI==================================

    public function sk_kumuh()
    {

        $data['lokasikumuh'] = $this->Model_lokasi_kumuh->getAllLokasikumuh();
        $this->header();
        $this->load->view('kawasan/lokasi/view_sk_kumuh', $data);
        $this->footer();
    }

    public function sk_kumuh_tambah()
    {
        $data['kabupaten'] = $this->Model_lokasi_kumuh->getAllKabupaten();
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('surat_keterangan', 'Sk', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->header();
            $this->load->view('kawasan/lokasi/view_sk_kumuh_tambah', $data);
            $this->footer();
        } else {
            $this->Model_lokasi_kumuh->tambahDataSk();
            $this->session->set_flashdata('flash', 'ditambahkan');


            redirect('Kawasan/lokasi_kumuh');
        }
    }



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
            $this->session->set_flashdata('flash', 'ditambahkan');


            redirect('Kawasan/lokasi_kumuh');
        }
    }

    public function lokasi_kumuh_hapus($id)
    {
        $this->Model_lokasi_kumuh->hapusDataLokasi($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('Kawasan/lokasi_kumuh');
    }


    // =======================================================================PENGANGANAN==================================

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
