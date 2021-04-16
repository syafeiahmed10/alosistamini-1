<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_lokasi_kumuh extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        // $this->load->library('mongo_db');
    }

    public function getAllKabupaten()
    {
        return $this->mongo_db->get('kabupaten');
    }


    public function getAllLokasikumuh()
    {
        return $this->mongo_db->get('lokasi_kumuh');
    }

    public function tambahDataLokasi()
    {
        $data = [

            'kabupaten' => $this->input->post('kabupaten', true),
            'surat_keterangan' => [
                'sk' => $this->input->post('surat_keterangan'),
                'kawasan' => [
                    'nama_lokasi' => $this->input->post('nama_lokasi', true),
                    'luas_awal' => $this->input->post('luas_awal'),
                    'lingkup_administratif' => $this->input->post('lingkup_administratif'),
                    'latitude' => $this->input->post('latitude'),
                    'longitude' => $this->input->post('longitude'),
                    'status' => $this->input->post('status')
                ]
            ]
        ];


        $this->mongo_db->insert('lokasi_kumuh', $data);
    }


    public function tambahDataSk()
    {
        $data = [

            'kabupaten' => $this->input->post('kabupaten', true),
            'surat_keterangan' => [
                'sk' => $this->input->post('surat_keterangan'),
                'kawasan' => [
                    'nama_lokasi' => '',
                    'luas_awal' => '',
                    'lingkup_administratif' => '',
                    'latitude' => '',
                    'longitude' => '',
                    'status' => ''
                ]
            ]
        ];


        $this->mongo_db->insert('lokasi_kumuh', $data);
    }


    public function hapusDataLokasi($id)
    {
        $this->mongo_db->where('_id', new MongoDb\BSON\ObjectId($id))->delete('lokasi_kumuh');
    }

    /* End of file Lokasikumuh_model.php */
}
