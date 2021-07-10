<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_for_all extends CI_Model
{
    public function dropdown_kabupaten()
    {
        $result = $this->db->where('province_id', 33);
        $result = $this->db->get('reg_regencies');
        return $result;
    }

    public function dropdown_kelurahan_kecamatan()
    {
        $result = $this->db->select('reg_villages.id as id_kelurahan, reg_villages.name as kelurahan, reg_districts.name as kecamatan, reg_regencies.name as kabupaten ');
        $result = $this->db->where('province_id', 33);
        $result = $this->db->from('reg_villages');
        $result = $this->db->join('reg_districts', 'reg_districts.id = reg_villages.district_id', 'left');
        $result = $this->db->join('reg_regencies', 'reg_regencies.id = reg_districts.regency_id', 'left');
        $result = $this->db->join('reg_provinces', 'reg_provinces.id = reg_regencies.province_id', 'left');
        $result = $this->db->get();
        return $result;
    }

    public function dropdown_surat_keterangan_kumuh()
    {
        $result = $this->db->from('surat_keterangan_kumuh');
        $result = $this->db->join('reg_regencies', 'reg_regencies.id=surat_keterangan_kumuh.regency_id', 'LEFT');
        $result = $this->db->get();
        return $result;
    }

    public function dropdown_kecamatan($id)
    {
        $result = $this->db->from('reg_districts');
        $result = $this->db->where('regency_id', $id);
        $result = $this->db->get();
        return $result;
    }

    public function dropdown_kelurahan($id)
    {
        $result = $this->db->from('reg_villages');
        $result = $this->db->where('district_id', $id);
        $result = $this->db->get();
        return $result;
    }

    public function dropdown_lokasi_kumuh()
    {
        $result = $this->db->from('lokasi_kumuh');
        $result = $this->db->join('surat_keterangan_kumuh', 'surat_keterangan_kumuh.id_sk=lokasi_kumuh.id_sk', 'LEFT');
        $result = $this->db->get();
        return $result;
    }
}

/* End of file Model_for_all.php */
