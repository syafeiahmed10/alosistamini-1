<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('alosista_model');
        $this->form_validation->set_error_delimiters(' <small class="text-danger pl-3">', ' </small>');
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }


    // ====================================================SK KUMUH==========================================================================
    public function sk_kumuh()
    {
        $data['content'] =  $this->alosista_model->get_sk_kumuh();
        $data['title'] =  "SK Kumuh";
        $data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('suratketerangankumuh', $data);
        $this->load->view('template/footer');
    }

    public function sk_kumuh_tambah()
    {

        $this->form_validation->set_rules('surat_keterangan', 'Surat Keterangan', 'trim|required');
        $this->form_validation->set_rules('tahun', 'Tahun SK', 'numeric|trim|required');
        $this->form_validation->set_message('required', '{field} harus diisi');
        $this->form_validation->set_message('numeric', 'Input {field} harus berupa angka');
        if ($this->form_validation->run() == FALSE) {
            $data['content'] =  $this->alosista_model->dropdown_kabupaten_jateng();
            $data['title'] =  "Tambah SK";
            $this->load->view('template/header', $data);
            $this->load->view('suratketerangankumuhtambah', $data);
            $this->load->view('template/footer');
        } else {
            $this->alosista_model->add_sk_kumuh();
            redirect('user/sk_kumuh');
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
        redirect('user/sk_kumuh');
    }

    public function sk_kumuh_hapus($id_sk)
    {
        $this->alosista_model->del_sk_kumuh($id_sk);
        redirect('user/sk_kumuh');
    }
    // ====================================================END OF SK KUMUH==========================================================================

    // ====================================================LOKASI KUMUH==========================================================================
    public function lokasi_kumuh()
    {
        $data['title'] = "Lokasi Kumuh";
        $data['content'] = $this->alosista_model->get_lokasi_kumuh()->result_array();
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
            redirect('user/lokasi_kumuh');
        }
    }

    public function lokasi_kumuh_ubah($id_lokasi)
    {
        // var_dump($this->alosista_model->edit_lokasi_kumuh_get($id_lokasi));
        // die;
        $data['content'] = $this->alosista_model->dropdown_sk_kumuh();
        $data['title'] =  "Ubah Lokasi Kumuh";
        $data['content2'] = $this->alosista_model->edit_lokasi_kumuh_get($id_lokasi);
        $this->load->view('template/header', $data);
        $this->load->view('lokasikumuhubah', $data);
        $this->load->view('template/footer');
    }
    public function lokasi_kumuh_aksi_ubah()
    {
        $this->alosista_model->edit_lokasi_kumuh_action($this->input->post('id_lokasi'));

        redirect('user/lokasi_kumuh');
    }

    public function lokasi_kumuh_hapus($id_lokasi)
    {
        $this->alosista_model->del_lokasi_kumuh($id_lokasi);
        redirect('user/lokasi_kumuh');
    }
    // ====================================================END OF LOKASI KUMUH==========================================================================

    // ==================================================PENANGANAN KUMUH==========================================================================
    public function penanganan_kumuh()
    {
        // var_dump($this->alosista_model->get_penanganan_kumuh());
        // die;
        $data['content'] =  $this->alosista_model->get_penanganan_kumuh()->result_array();
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
            redirect('user/penanganan_kumuh');
        }
    }

    public function penanganan_kumuh_hapus($id_penanganan, $id_lokasi)
    {
        $this->alosista_model->del_penanganan_kumuh($id_penanganan, $id_lokasi);
        redirect('user/penanganan_kumuh');
    }

    public function penanganan_kumuh_ubah($id_penanganan)
    {
        // var_dump($this->alosista_model->edit_penanganan_kumuh_get($id_penanganan));
        // die;
        $data['content'] = $this->alosista_model->dropdown_lokasi_kumuh()->result_array();
        $data['title'] =  "Ubah Penanganan Kumuh";
        $data['content2'] = $this->alosista_model->edit_penanganan_kumuh_get($id_penanganan);

        $this->load->view('template/header', $data);
        $this->load->view('penanganankumuhubah', $data);
        $this->load->view('template/footer');
    }

    public function penanganan_kumuh_aksi_ubah()
    {
        $this->alosista_model->edit_penanganan_kumuh_action($this->input->post('id_penanganan'));

        redirect('user/penanganan_kumuh');
    }
    // ==================================================END OF PENANGANAN KUMUH==========================================================================
}

/* End of file User.php */
