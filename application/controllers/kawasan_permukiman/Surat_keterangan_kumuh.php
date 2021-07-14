<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Surat_keterangan_kumuh extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_surat_keterangan_kumuh');
        $this->load->model('model_for_all');
    }

    // List all your items
    public function index()
    {
        $data['title'] = "Surat Keterangan Kumuh";
        $data['dataSatu'] = $this->model_surat_keterangan_kumuh->get_table();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kawasan/surat_keterangan_kumuh/index', $data);
        $this->load->view('templates/footer');
    }

    // Add a new item
    public function add()
    {
        $data['title'] = "Tambah Surat Keterangan Kumuh";
        $data['dataSatu'] =  $this->model_for_all->get_kabupaten_jateng();
        $this->form_validation->set_rules('surat_keterangan_kumuh', 'Surat Keterangan Kumuh', 'trim|required');
        $this->form_validation->set_message('required', '{field} harus diisi');


        if ($this->form_validation->run() == TRUE) {
            $this->model_surat_keterangan_kumuh->add();
            redirect('kawasan_permukiman/surat_keterangan_kumuh');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('kawasan/surat_keterangan_kumuh/add', $data);
            $this->load->view('templates/footer');
        }
    }

    //Update one item
    public function update($id = NULL)
    {
        $data['title'] = "Ubah Surat Keterangan Kumuh";
        $data['dataSatu'] = $this->model_for_all->get_kabupaten_jateng();
        $data['dataDua'] = $this->model_surat_keterangan_kumuh->update($id);
        $this->form_validation->set_rules('surat_keterangan_kumuh', 'Surat Keterangan Kumuh', 'trim|required');
        $this->form_validation->set_message('required', '{field} harus diisi');
        $this->form_validation->set_message('numeric', '{field} harus berupa angka');
        if ($this->form_validation->run() == TRUE) {
            $this->model_surat_keterangan_kumuh->update_action($this->input->post('id'));
            redirect('kawasan_permukiman/surat_keterangan_kumuh');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('kawasan/surat_keterangan_kumuh/update', $data);
            $this->load->view('templates/footer');
        }
    }

    //Delete one item
    public function delete($id = NULL)
    {
        $this->model_surat_keterangan_kumuh->delete($id);
        redirect('kawasan_permukiman/surat_keterangan_kumuh');
    }

    //Delete selected item
    public function delete_selected()
    {
        foreach ($this->input->post('id') as $id) {
            $this->model_surat_keterangan_kumuh->delete($id);
        }

        redirect('kawasan_permukiman/surat_keterangan_kumuh');
    }
}

/* End of file Surat_keterangan_kumuh.php */
