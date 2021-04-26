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


    public function getAllSkKumuh()
    {
        $this->mongo_db->where(['surat_keterangan' => $this->mongo_db->exists(true)]);
        return $this->mongo_db->sort('_id', 'desc')->get('lokasi_kumuh');
    }

    public function getAllLokasiKumuh()
    {
        $this->mongo_db->where(['surat_keterangan.lokasi_kumuh' => $this->mongo_db->exists(true)]);
        return $this->mongo_db->sort('_id', 'desc')->get('lokasi_kumuh');
    }

    public function tambahDataLokasi()
    {



        $this->mongo_db->push(
            'surat_keterangan.$.lokasi_kumuh',

            // 'id_sk' => $this->mongo_db->create_document_id(),

            [
                'id_lokasi' => uniqid(),
                'nama_lokasi' => $this->input->post('nama_lokasi'),
                'luas_lokasi' => floatval($this->input->post('luas_lokasi')),
                'lingkup_administratif' => $this->input->post('lingkup_administratif'),
                'longitude' => floatval($this->input->post('longitude')),
                'latitude' => floatval($this->input->post('latitude')),
                'tingkat_kumuh' => $this->input->post('longitude')
            ]

        )
            ->where(
                'surat_keterangan.id_sk',
                $this->input->post('surat_keterangan')
            )
            ->update('lokasi_kumuh');
    }

    public function hapusDataLokasi($_id, $id_sk, $id_lokasi)
    {

        $this->mongo_db->pull(
            'surat_keterangan.$.lokasi_kumuh',
            [
                'id_lokasi' => $id_lokasi
            ]
        )->where('surat_keterangan.id_sk', $id_sk)

            ->update('lokasi_kumuh');
    }

    /* End of file Lokasikumuh_model.php */
}
