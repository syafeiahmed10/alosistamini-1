<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sk_kumuh extends CI_Controller
{

    public function index()
    {
        $data['lokasikumuh'] = $this->Model_sk_kumuh->getAllSkKumuh();
        $this->header();
        $this->load->view('kawasan/lokasi/view_sk_kumuh', $data);
        $this->footer();
    }


    public function tambah()
    {

        $data['kabupaten'] = $this->Model_sk_kumuh->getAllKabupaten();

        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
        // $this->form_validation->set_rules('surat_keterangan', 'Sk', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->header();
            $this->load->view('kawasan/lokasi/view_sk_kumuh_tambah', $data);
            $this->footer();
        } else {
            $this->Model_sk_kumuh->tambahDataSk();
            $this->session->set_flashdata('flash', 'ditambahkan');


            redirect('sk_kumuh');
        }
    }


    public function hapus($_id, $id_sk)
    {
        $this->Model_sk_kumuh->hapusDataSk($_id, $id_sk);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('sk_kumuh');
    }


    public function edit()
    {

        $this->form_validation->set_rules('surat_keterangan', 'Surat Keterangan', 'required');
        $data['surat_keterangan'] = $this->Model_sk_kumuh->getAllKabupaten();
        $data['kabupaten'] = $this->Model_sk_kumuh->getAllKabupaten();
        // var_dump($data['kabupaten']);
        if ($this->form_validation->run() ==  FALSE) {
            $this->header();
            $this->load->view('kawasan/lokasi/view_sk_kumuh_edit', $data);
            $this->footer();
        } else {
            $this->Model_sk_kumuh->editDataLokasi();
            $this->session->set_flashdata('flash', 'diedit');
            redirect('sk_kumuh');
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

/* End of file Sk_kumuh.php */
