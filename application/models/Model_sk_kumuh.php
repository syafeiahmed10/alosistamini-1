<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_sk_kumuh extends CI_Model
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

    public function getDataSk()
    {
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
}

/* End of file Model_sk_kumuh.php */
