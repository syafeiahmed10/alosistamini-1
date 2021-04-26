<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi_kumuh extends CI_Controller
{

    public function index()
    {
        $data['lokasikumuh'] = $this->Model_lokasi_kumuh->getAllLokasiKumuh();

        $this->header();
        $this->load->view('kawasan/lokasi/view_lokasi_kumuh', $data);
        $this->footer();
    }

    public function tambah()
    {
        $data['lokasikumuh'] = $this->Model_lokasi_kumuh->getAllSkKumuh();
        $this->form_validation->set_rules('nama_lokasi', 'Nama Kawasan', 'required');
        $this->form_validation->set_rules('luas_lokasi', 'Luas', 'required|decimal');
        // $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('lingkup_administratif', 'Lingkup Administratif', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|decimal');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required|decimal');
        $this->form_validation->set_rules('tingkat_kumuh', 'Tingkat Kumuh', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->header();
            $this->load->view('kawasan/lokasi/view_lokasi_kumuh_tambah', $data);
            $this->footer();
        } else {
            $this->Model_lokasi_kumuh->tambahDataLokasi();
            $this->session->set_flashdata('flash', 'ditambahkan');


            redirect('lokasi_kumuh');
        }
    }


    public function hapus($_id, $id_sk, $id_lokasi)
    {
        $this->Model_lokasi_kumuh->hapusDataLokasi($_id, $id_sk, $id_lokasi);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('lokasi_kumuh');
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

/* End of file Lokasi_kumuh.php */
