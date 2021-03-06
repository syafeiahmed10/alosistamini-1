<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Penanganan_kumuh extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kawasan_permukiman/model_penanganan_kumuh');
        $this->load->model('model_for_all');
        $this->load->library('pagination');
        $this->load->helper('alosista_helper');
        is_logged_in();
    }

    // List all your items
    public function index($offset = 0)
    {

        $data['title'] = "Penanganan Kumuh";
        $data['start'] = $this->uri->segment(4);
        $data['countRow'] = $this->model_penanganan_kumuh->countRow();
        $data['base_url'] = base_url('kawasan_permukiman/penanganan_kumuh/index');
        $this->pagination->initialize(paginationConfig($data['base_url'], $data['countRow']));
        $data['penanganan_kumuh'] = $this->model_penanganan_kumuh->get_table(paginationConfig($data['base_url'], $data['countRow'])['per_page'], $data['start'])->result_array();
        $data['dropdown_kabupaten'] = $this->model_for_all->get_kabupaten_jateng()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kawasan_permukiman/penanganan_kumuh/index', $data);
        $this->load->view('templates/footer');
    }

    // Add a new item
    public function add()
    {
        $data['title'] = "Ubah Penanganan Kumuh";
        $data['dropdown_lokasi_kumuh'] =  $this->model_for_all->dropdown_lokasi_kumuh()->result_array();
        $this->form_validation->set_rules('luas_tertangani', 'Luas Tertangani', 'trim|required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required|numeric');
        $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'trim|required');
        $this->form_validation->set_rules('nominal', 'Anggaran / Pembiayaan', 'numeric|trim|required');
        $this->form_validation->set_rules('sumber_dana', 'Sumber Dana', 'trim|required');
        // $this->form_validation->set_rules('lintang', 'Lintang', 'trim|required|numeric');
        // $this->form_validation->set_rules('bujur', 'Bujur', 'trim|required|numeric');
        $this->form_validation->set_message('required', '{field} harus diisi');
        $this->form_validation->set_message('numeric', '{field} harus berupa angka');

        if ($this->form_validation->run() == TRUE) {
            $this->model_penanganan_kumuh->add();
            redirect('kawasan_permukiman/penanganan_kumuh');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('kawasan_permukiman/penanganan_kumuh/add', $data);
            $this->load->view('templates/footer');
        }
    }

    //Update one item
    public function update($id = null, $id_kabupaten = null, $id_kecamatan = NULL)
    {
        $data['title'] = "Ubah Penanganan Kumuh";
        $data['dropdown_lokasi_kumuh'] = $this->model_for_all->dropdown_lokasi_kumuh();
        $data['penanganan_kumuh_by_id'] = $this->model_penanganan_kumuh->update($id)->row_array();

        $this->form_validation->set_rules('nama_lokasi', 'Nama Lokasi', 'trim|required');
        $this->form_validation->set_rules('luas_tertangani', 'Luas di Tangani', 'trim|required|numeric');
        $this->form_validation->set_rules('tahun', 'Tahun Penanganan', 'trim|required');
        $this->form_validation->set_rules('kegiatan', 'Jenis Kegiatan', 'trim|required');
        $this->form_validation->set_rules('nominal', 'Anggaran / Pembiayaan', 'trim|required');
        $this->form_validation->set_rules('sumber_dana', 'Sumber Dana', 'trim|required');

        // $this->form_validation->set_rules('lintang', 'Lintang', 'trim|required|numeric');
        // $this->form_validation->set_rules('bujur', 'Bujur', 'trim|required|numeric');
        $this->form_validation->set_message('required', '{field} harus diisi');
        $this->form_validation->set_message('numeric', '{field} harus berupa angka');

        if ($this->form_validation->run() == TRUE) {
            $this->model_penanganan_kumuh->update_action($this->input->post('id'));
            redirect('kawasan_permukiman/penanganan_kumuh');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('kawasan_permukiman/penanganan_kumuh/update', $data);
            $this->load->view('templates/footer');
        }
    }

    //Delete one item
    public function delete($id = NULL)
    {
        $this->model_penanganan_kumuh->delete($id);
        redirect('kawasan_permukiman/penanganan_kumuh');
    }

    public function delete_selected()
    {
        foreach ($this->input->post('id') as $id) {
            $this->model_penanganan_kumuh->delete($id);
        }

        redirect('kawasan_permukiman/penanganan_kumuh');
    }
}

/* End of file Penanganan_kumuh.php */
