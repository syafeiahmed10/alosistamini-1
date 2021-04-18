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




    // public function hapusDataLokasi($id)
    // {
    //     // $this->mongo_db->where('_id', new MongoDb\BSON\ObjectId($id))->delete('lokasi_kumuh');
    //     $this->mongo_db->where('_id', $id)->delete('lokasi_kumuh');
    // }


    public function getDataSk()
    {
        // $this->mongo_db->where('_id', (int)$_id);

        // $this->mongo_db->select(['surat_keterangan.sk']);
        // $this->mongo_db->elemMatch(['surat_keterangan.id_sk' => $id_sk]);
        // return $this->mongo_db->get('lokasi_kumuh');

        // return $this->mongo_db->aggregate('lokasi_kumuh', ['$match' => ['surat_keterangan.id_sk' => 'asfasfsa']]);

        $option = [
            [
                '$match' => [
                    'sk_id' => '$607a408f9a32a'
                ]
            ],
            [
                '$unwind' => '$surat_keterangan'
            ]
        ];




        $result = $this->mongo_db->aggregate(
            'lokasi_kumuh',
            $option,
            array('cursor' => array('batchSize' => 0))
        );
    }

    public function tambahDataSk()
    {

        $this->mongo_db->push(
            'surat_keterangan',
            [
                // 'id_sk' => $this->mongo_db->create_document_id(),
                'id_sk' => uniqid(),
                'sk' => $this->input->post('surat_keterangan')
            ]
        )
            ->where(
                'kabupaten',
                $this->input->post('kabupaten')
            )
            ->update('lokasi_kumuh');
    }

    public function editDataSk($_id, $id_sk)
    {
    }

    public function hapusDataSk($_id, $id_sk)
    {
        // var_dump((int)$_id);
        // die;

        $this->mongo_db->pull(
            'surat_keterangan',
            [
                'id_sk' => $id_sk

            ]
        )
            ->where(
                '_id',
                // new MongoDb\BSON\ObjectId($_id)
                (int)$_id
            )
            ->update('lokasi_kumuh');
    }
    /* End of file Lokasikumuh_model.php */
}
