<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_lokasi_kumuh extends CI_Model
{

    public function get()
    {
        $result = $this->db->select('reg_regencies.name as kabupaten, lokasi_kumuh.id_lokasi as id_lokasi, lokasi_kumuh.lokasi as nama_lokasi,lokasi_kumuh.luas as luas, lokasi_kumuh.rt_rw as rt_rw, reg_villages.id as id_kelurahan, reg_villages.name as kelurahan,reg_districts.id as id_kecamatan, reg_districts.name as kecamatan, lokasi_kumuh.lintang as lintang, lokasi_kumuh.bujur as bujur, lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,  surat_keterangan_kumuh.id_sk as id_sk,surat_keterangan_kumuh.sk as sk,  lokasi_kumuh.tingkat_kumuh as tingkat_kumuh');
        $result = $this->db->from('lokasi_kumuh');
        $result = $this->db->join('surat_keterangan_kumuh', 'surat_keterangan_kumuh.id_sk=lokasi_kumuh.id_sk', 'LEFT');
        $result = $this->db->join('reg_regencies', 'reg_regencies.id=surat_keterangan_kumuh.regency_id', 'LEFT');
        $result = $this->db->join('reg_districts', 'reg_districts.id=lokasi_kumuh.district_id', 'LEFT');
        $result = $this->db->join('reg_villages', 'reg_villages.id=lokasi_kumuh.village_id', 'LEFT');
        $result = $this->db->get();
        return $result;
    }
}

/* End of file Model_lokasi_kumuh.php */
