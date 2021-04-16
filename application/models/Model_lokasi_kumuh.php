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
        $this->mongo_db->where(['surat_keterangan' => $this->mongo_db->exists(true)]);
        return $this->mongo_db->sort('_id', 'desc')->get('lokasi_kumuh');
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




    public function hapusDataLokasi($id)
    {
        $this->mongo_db->where('_id', new MongoDb\BSON\ObjectId($id))->delete('lokasi_kumuh');
    }

    public function tambahDataSk()
    {

        $this->mongo_db->push(
            'surat_keterangan',
            [
                'id_sk' => $this->mongo_db->create_document_id(),
                'sk' => $this->input->post('surat_keterangan')
            ]
        )
            ->where(
                'kabupaten',
                $this->input->post('kabupaten')
            )
            ->update('lokasi_kumuh');
    }

    public function hapusDataSk($id)
    {
        $this->mongo_db->where('_id', new MongoDb\BSON\ObjectId($id))->delete('lokasi_kumuh');
    }
    /* End of file Lokasikumuh_model.php */
}
