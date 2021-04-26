<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('alosista_model');
    }
    // ====================================================SK KUMUH==========================================================================
    public function sk_kumuh()
    {
        $data['content'] =  $this->alosista_model->get_sk_kumuh();
        $data['title'] =  "SK Kumuh";
        $this->load->view('template/header', $data);
        $this->load->view('suratketerangankumuh', $data);
        $this->load->view('template/footer');
    }

    public function sk_kumuh_tambah()
    {

        $this->form_validation->set_rules('surat_keterangan', 'Surat Keterangan', 'trim|required');
        $this->form_validation->set_rules('tahun', 'Tahun SK', 'trim|required');
        $this->form_validation->set_message('required', '{field} harus diisi');

        if ($this->form_validation->run() == FALSE) {
            $data['content'] =  $this->alosista_model->dropdown_kabupaten_jateng();
            $data['title'] =  "Tambah SK";
            $this->load->view('template/header', $data);
            $this->load->view('suratketerangankumuhtambah', $data);
            $this->load->view('template/footer');
        } else {
            $this->alosista_model->add_sk_kumuh();
            redirect('admin/sk_kumuh');
        }
    }

    public function sk_kumuh_ubah($id_sk)
    {
        $data['title'] =  "Ubah SK";
        $data['content'] = $this->alosista_model->dropdown_kabupaten_jateng();
        $data['content2'] = $this->alosista_model->edit_sk_kumuh_get($id_sk);
        $this->load->view('template/header', $data);
        $this->load->view('suratketerangankumuhubah', $data);
        $this->load->view('template/footer');
    }

    public function sk_kumuh_aksi_ubah()
    {
        $this->alosista_model->edit_sk_kumuh_action($this->input->post('id_sk'));
        redirect('admin/sk_kumuh');
    }

    public function sk_kumuh_hapus($id_sk)
    {
        $this->alosista_model->del_sk_kumuh($id_sk);
        redirect('admin/sk_kumuh');
    }
    // ====================================================END OF SK KUMUH==========================================================================

    // ====================================================LOKASI KUMUH==========================================================================
    public function lokasi_kumuh()
    {
        $data['title'] = "Lokasi Kumuh";
        $data['content'] = $this->alosista_model->get_lokasi_kumuh()->result_array();;
        $this->load->view('template/header', $data);
        $this->load->view('lokasikumuh', $data);
        $this->load->view('template/footer');
    }

    public function lokasi_kumuh_tambah()
    {
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
        $this->form_validation->set_rules('luas', 'Luas', 'trim|required|decimal');
        $this->form_validation->set_rules('lng', 'Langitude', 'trim|required|decimal');
        $this->form_validation->set_rules('lat', 'Latitude', 'trim|required|decimal');
        $this->form_validation->set_message('required', '{field} harus diisi');

        if ($this->form_validation->run() == FALSE) {
            $data['content'] =  $this->alosista_model->dropdown_sk_kumuh();
            $data['title'] =  "Ubah Lokasi Kumuh";
            $this->load->view('template/header', $data);
            $this->load->view('lokasikumuhtambah', $data);
            $this->load->view('template/footer');
        } else {
            $this->alosista_model->add_lokasi_kumuh();
            redirect('admin/lokasi_kumuh');
        }
    }

    public function lokasi_kumuh_ubah($id_sk)
    {
        // var_dump($this->alosista_model->edit_lokasi_kumuh_get($id_sk));
        // die;
        $data['content'] = $this->alosista_model->dropdown_sk_kumuh();
        $data['title'] =  "Ubah Lokasi Kumuh";
        $data['content2'] = $this->alosista_model->edit_lokasi_kumuh_get($id_sk);
        $this->load->view('template/header', $data);
        $this->load->view('lokasikumuhubah', $data);
        $this->load->view('template/footer');
    }
    public function lokasi_kumuh_aksi_ubah()
    {
        $this->alosista_model->edit_lokasi_kumuh_action($this->input->post('id_lokasi'));

        redirect('admin/lokasi_kumuh');
    }

    public function lokasi_kumuh_hapus($id_lokasi)
    {
        $this->alosista_model->del_lokasi_kumuh($id_lokasi);
        redirect('admin/lokasi_kumuh');
    }
    // ====================================================END OF LOKASI KUMUH==========================================================================

    // ==================================================PENANGANAN KUMUH==========================================================================
    public function penanganan_kumuh()
    {
        // var_dump($this->alosista_model->get_penanganan_kumuh());
        // die;
        $data['content'] =  $this->alosista_model->get_penanganan_kumuh();
        $data['title'] =  "Penanganan Kumuh";
        $this->load->view('template/header', $data);
        $this->load->view('penanganankumuh', $data);
        $this->load->view('template/footer');
    }

    public function penanganan_kumuh_tambah()
    {
        $this->form_validation->set_rules('proposal', 'Proposal', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['content'] =  $this->alosista_model->dropdown_lokasi_kumuh()->result_array();
            $data['title'] =  "Ubah Penanganan Kumuh";
            $this->load->view('template/header', $data);
            $this->load->view('penanganankumuhtambah', $data);
            $this->load->view('template/footer');
        } else {
            $this->alosista_model->add_penanganan_kumuh();
            redirect('admin/penanganan_kumuh');
        }
    }

    public function penanganan_kumuh_hapus($id_penanganan)
    {
        $this->alosista_model->del_penanganan_kumuh($id_penanganan);
        redirect('admin/penanganan_kumuh');
    }
    // ==================================================END OF PENANGANAN KUMUH==========================================================================
}

/* End of file Admin.php */
