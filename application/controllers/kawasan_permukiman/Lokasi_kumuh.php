<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi_kumuh extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_lokasi_kumuh');
        $this->load->model('model_for_all');
    }

    // List all your items
    public function index($offset = 0)
    {
        $data['title'] = "Lokasi Kumuh";
        $data['lokasi_kumuh'] = $this->model_lokasi_kumuh->get()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kawasan/lokasi_kumuh/index', $data);
        $this->load->view('templates/footer');
    }

    // Add a new item
    public function add()
    {
        $data['title'] = "Lokasi Kumuh";
        $data['dropdown_kelurahan_kecamatan'] =  $this->model_for_all->dropdown_kelurahan_kecamatan()->result_array();
        $data['dropdown_surat_keterangan_kumuh'] =  $this->model_for_all->dropdown_surat_keterangan_kumuh()->result_array();
        $this->form_validation->set_rules('nama_lokasi', 'Nama Lokasi', 'trim|required');
        $this->form_validation->set_rules('luas', 'Luas', 'trim|required|numeric');
        $this->form_validation->set_rules('rt_rw', 'RT/RW', 'trim|required');
        // $this->form_validation->set_rules('lintang', 'Lintang', 'trim|required|numeric');
        // $this->form_validation->set_rules('bujur', 'Bujur', 'trim|required|numeric');
        $this->form_validation->set_message('required', '{field} harus diisi');
        $this->form_validation->set_message('numeric', '{field} harus berupa angka');

        if ($this->form_validation->run() == TRUE) {
            $this->model_lokasi_kumuh->add();
            redirect('kawasan_permukiman/lokasi_kumuh');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('kawasan/lokasi_kumuh/add', $data);
            $this->load->view('templates/footer');
        }
    }



    //Update one item
    public function update($id = null, $id_kabupaten = null, $id_kecamatan = NULL)
    {
        $data['title'] = "Ubah Lokasi Kumuh";
        $data['dropdown_kecamatan'] =  $this->model_for_all->dropdown_kecamatan($id_kabupaten)->result_array();
        $data['dropdown_kelurahan'] =  $this->model_for_all->dropdown_kelurahan($id_kecamatan)->result_array();
        $data['dropdown_surat_keterangan_kumuh'] =  $this->model_for_all->dropdown_surat_keterangan_kumuh()->result_array();
        $data['lokasi_kumuh_by_id'] = $this->model_lokasi_kumuh->update($id)->row_array();

        $this->form_validation->set_rules('nama_lokasi', 'Nama Lokasi', 'trim|required');
        $this->form_validation->set_rules('luas', 'Luas', 'trim|required|numeric');
        $this->form_validation->set_rules('rt_rw', 'RT/RW', 'trim|required');

        // $this->form_validation->set_rules('lintang', 'Lintang', 'trim|required|numeric');
        // $this->form_validation->set_rules('bujur', 'Bujur', 'trim|required|numeric');
        $this->form_validation->set_message('required', '{field} harus diisi');
        $this->form_validation->set_message('numeric', '{field} harus berupa angka');

        if ($this->form_validation->run() == TRUE) {
            $this->model_lokasi_kumuh->update_action($this->input->post('id'));
            redirect('kawasan_permukiman/lokasi_kumuh');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('kawasan/lokasi_kumuh/update', $data);
            $this->load->view('templates/footer');
        }
    }

    //Delete one item
    public function delete($id = NULL)
    {
        $this->model_lokasi_kumuh->delete($id);
        redirect('kawasan_permukiman/lokasi_kumuh');
    }

    //Delete selected item
    public function delete_selected()
    {
        foreach ($this->input->post('id') as $id) {
            $this->model_lokasi_kumuh->delete_selected($id);
        }

        redirect('kawasan_permukiman/lokasi_kumuh');
    }
}

/* End of file Lokasi_kumuh.php */
