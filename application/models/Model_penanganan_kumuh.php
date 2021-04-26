<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_penanganan_kumuh extends CI_Model
{
    public function getAllPenangananKumuh()
    {
        $this->mongo_db->where(['surat_keterangan.lokasi_kumuh.penanganan' => $this->mongo_db->exists(true)]);
        return $this->mongo_db->sort('_id', 'desc')->get('lokasi_kumuh');
    }
    public function tambahDataPenanganan()
    {



        $this->mongo_db->push(
            'surat_keterangan.$[].lokasi_kumuh.$.penanganan',

            // 'id_sk' => $this->mongo_db->create_document_id(),

            [
                'id_penanganan' => uniqid(),
                'kegiatan' => $this->input->post('kegiatan'),
                'luas_penanganan' => floatval($this->input->post('luas_penanganan')),
                'tahun_penanganan' => floatval($this->input->post('tahun_penanganan')),
                'longitude' => floatval($this->input->post('longitude')),
                'latitude' => floatval($this->input->post('latitude')),
                'sumber_dana' => $this->input->post('sumber_dana')
            ]

        )
            ->where(


                'surat_keterangan.lokasi_kumuh.id_lokasi',
                $this->input->post('nama_lokasi')
            )
            ->update('lokasi_kumuh');
    }
}

/* End of file Model_penanganan_kumuh.php */
