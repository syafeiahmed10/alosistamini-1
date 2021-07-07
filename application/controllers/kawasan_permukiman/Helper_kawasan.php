<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Helper_kawasan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_lokasi_kumuh');
        $this->load->model('model_for_all');
    }
    public function index()
    {
    }

    public function get_kecamatan($id)
    { //Access-Control-Allow-Origin header with wildcard.
        header('Access-Control-Allow-Origin: *');
        $data = $this->model_for_all->dropdown_kecamatan($id)->result();
        echo json_encode($data);
    }

    public function get_kelurahan($id)
    { //Access-Control-Allow-Origin header with wildcard.
        header('Access-Control-Allow-Origin: *');
        $data = $this->model_for_all->dropdown_kelurahan($id)->result();
        echo json_encode($data);
    }
}

/* End of file Helper_kawasan.php */
