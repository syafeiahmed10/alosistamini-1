<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Helper_kawasan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kawasan_permukiman/model_lokasi_kumuh');
        $this->load->model('model_for_all');
        $this->load->helper('download');
        $this->load->helper('url');
        $this->load->helper('alosista_helper');
    }

    public function index()
    {
    }



    public function download()
    {
        $kabupaten = strtolower($this->input->post('kabupaten'));
        $kabupaten = ucwords($kabupaten);
        $path = $this->input->post('path');
        if ($path == 'lokasi_kumuh') {
            $fileName = 'Eksisting Kumuh_' . $kabupaten . '.xls';
        } else {
            $fileName = 'Penanganan Kumuh_' . $kabupaten . '.xlsx';
        }

        if ($fileName) {
            $file = realpath('assets/files/' . $path . '/download/format/' . $fileName);
            // check file exists    
            if (file_exists($file)) {
                // get file content
                $data = file_get_contents($file);
                //force download
                force_download($fileName, $data);
            } else {
                // Redirect to base url
                redirect(base_url());
            }
        }
    }



    public function get_kecamatan($id)
    { //Access-Control-Allow-Origin header with wildcard.
        header('Access-Control-Allow-Origin: *');
        $data = $this->model_for_all->get_kecamatan($id)->result();
        echo json_encode($data);
    }

    public function get_kelurahan($id)
    { //Access-Control-Allow-Origin header with wildcard.
        header('Access-Control-Allow-Origin: *');
        $data = $this->model_for_all->dropdown_kelurahan($id)->result();
        echo json_encode($data);
    }

    public function import()
    {
        import_excel();
    }
}

/* End of file Helper_kawasan.php */
