<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_lokasi_kumuh extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        // $this->load->library('mongo_db');
    }

    public function getAllLokasikumuh()
    {
        return $this->mongo_db->get('lokasi_kumuh');
    }

    public function tambahDataLokasi()
    {
        $data = [
            'kabupaten' => $this->input->post('kabupaten'),
            'surat_keterangan' => [
                'sk' => $this->input->post('sk'),
                'kawasan' => [
                    'nama_lokasi' => $this->input->post('nama_lokasi'),
                    'luas_awal' => $this->input->post('nama_lokasi'),
                    'lingkup_administratif' => $this->input->post('lingkup_administratif'),
                    'latitude' => $this->input->post('latitude'),
                    'longitude' => $this->input->post('longitude'),
                    'status' => $this->input->post('status')
                ]
            ]
        ];


        $this->mongo_db->insert('lokasi_kumuh', $data);
    }


    /* End of file Lokasikumuh_model.php */
}
