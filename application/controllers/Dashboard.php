<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->header();
        $this->load->view('view_dashboard');
        $this->footer();
    }

    // =======================================================================LOKASI==================================

    public function sk_kumuh()
    {

        $data['lokasikumuh'] = $this->Model_lokasi_kumuh->getAllSkKumuh();
        $this->header();
        $this->load->view('kawasan/lokasi/view_sk_kumuh', $data);
        $this->footer();
    }

    public function sk_kumuh_tambah()
    {

        $data['kabupaten'] = $this->Model_lokasi_kumuh->getAllKabupaten();
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
        // $this->form_validation->set_rules('surat_keterangan', 'Sk', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->header();
            $this->load->view('kawasan/lokasi/view_sk_kumuh_tambah', $data);
            $this->footer();
        } else {
            $this->Model_lokasi_kumuh->tambahDataSk();
            $this->session->set_flashdata('flash', 'ditambahkan');


            redirect('dashboard/sk_kumuh');
        }
    }


    public function sk_kumuh_hapus($_id, $id_sk)
    {
        $this->Model_lokasi_kumuh->hapusDataSk($_id, $id_sk);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('dashboard/sk_kumuh');
    }


    public function sk_kumuh_edit()
    {

        $this->form_validation->set_rules('surat_keterangan', 'Surat Keterangan', 'required');

        $data['content'] = $this->Model_lokasi_kumuh->getDataSk();
        var_dump($data['content']);
        if ($this->form_validation->run() ==  FALSE) {
            $this->header();
            $this->load->view('kawasan/lokasi/view_sk_kumuh_edit', $data);
            $this->footer();
        } else {
            $this->Model_lokasi_kumuh->editDataLokasi();
            $this->session->set_flashdata('flash', 'diedit');
            redirect('dashboard/sk_kumuh');
        }
    }


    public function lokasi_kumuh()
    {

        $data['lokasikumuh'] = $this->Model_lokasi_kumuh->getAllLokasiKumuh();

        $this->header();
        $this->load->view('kawasan/lokasi/view_lokasi_kumuh', $data);
        $this->footer();
    }

    public function lokasi_kumuh_tambah()
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


            redirect('dashboard/lokasi_kumuh');
        }
    }


    public function lokasi_kumuh_hapus($_id, $id_sk, $id_lokasi)
    {
        $this->Model_lokasi_kumuh->hapusDataLokasi($_id, $id_sk, $id_lokasi);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('dashboard/lokasi_kumuh');
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



    // public function header()
    // {
    //     $this->load->view('reuse_template/view_header');
    // }

    // public function footer()
    // {
    //     $this->load->view('reuse_template/view_footer');
    // }
}
