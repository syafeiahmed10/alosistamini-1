<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi_kumuh extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kawasan_permukiman/model_lokasi_kumuh');
        $this->load->model('model_for_all');
        $this->load->library('pagination');
        $this->load->helper('alosista_helper');
        is_logged_in();
    }

    // List all your items
    public function index()
    {
        $data['title'] = "Lokasi Kumuh";
        $data['start'] = $this->uri->segment(4);
        $data['countRow'] = $this->model_lokasi_kumuh->countRow();
        $data['base_url'] = base_url('kawasan_permukiman/lokasi_kumuh/index');
        $this->pagination->initialize(paginationConfig($data['base_url'], $data['countRow']));
        $data['dataSatu'] = $this->model_lokasi_kumuh->get_table(paginationConfig($data['base_url'], $data['countRow'])['per_page'], $data['start']);
        // $data['dataSatu'] = $this->model_lokasi_kumuh->get_table();
        $data['dataDua'] = $this->model_for_all->get_kabupaten_jateng();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kawasan_permukiman/lokasi_kumuh/index', $data);
        $this->load->view('templates/footer');
    }

    // Add a new item
    public function add()
    {
        $data['title'] = "Lokasi Kumuh";
        $data['dataSatu'] =  $this->model_for_all->get_surat_keterangan_kumuh();
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
            $this->load->view('kawasan_permukiman/lokasi_kumuh/add', $data);
            $this->load->view('templates/footer');
        }
    }



    //Update one item
    public function update($id = null, $id_kabupaten = null, $id_kecamatan = NULL)
    {
        $data['title'] = "Ubah Lokasi Kumuh";
        $data['dataSatu'] =  $this->model_for_all->get_kecamatan($id_kabupaten)->result_array();
        $data['dropdown_kelurahan'] =  $this->model_for_all->dropdown_kelurahan($id_kecamatan)->result_array();
        $data['dropdown_surat_keterangan_kumuh'] =  $this->model_for_all->get_surat_keterangan_kumuh()->result_array();
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
            $this->load->view('kawasan_permukiman/lokasi_kumuh/update', $data);
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

    public function get_graph()
    {
        header('Access-Control-Allow-Origin: *');
        $query = $this->db->query("SELECT name, SUM(luas) as luas, SUM(luas_tertangani) as luas_tertangani, SUM(luas)-SUM(luas_tertangani) as sisa FROM kawasan__lokasi_kumuh LEFT JOIN kawasan__surat_keterangan_kumuh ON kawasan__lokasi_kumuh.id_sk = kawasan__surat_keterangan_kumuh.id_sk LEFT JOIN reg__regencies ON reg__regencies.id = kawasan__surat_keterangan_kumuh.regency_id LEFT JOIN kawasan__penanganan_lokasi_kumuh ON kawasan__penanganan_lokasi_kumuh.id_lokasi = kawasan__lokasi_kumuh.id_lokasi GROUP BY name");
        echo json_encode($query->result());
    }
}

/* End of file Lokasi_kumuh.php */
