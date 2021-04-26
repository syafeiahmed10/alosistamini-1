<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site_model extends CI_Model
{
    private $_regency_id;
    private $_district_id;

    // set ID Regency (Kabupaten)
    public function setRegencyID($regencyID)
    {
        return $this->_regency_id = $regencyID;
    }
    public function setDistrictID($districtID)
    {
        return $this->_district_id = $districtID;
    }

    public function getAllRegencyJateng()
    {
        $this->db->from('reg_regencies as kabupaten');
        $this->db->select('kabupaten.id as id_kabupaten, kabupaten.name as kabupaten');
        $this->db->where('kabupaten.province_id', 33);
        return $this->db->get()->result_array();
    }

    public function getDistricts()
    {
        $this->db->from('reg_districts as kecamatan');
        $this->db->select('kecamatan.id as id_kecamatan, kecamatan.name as kecamatan');
        $this->db->where('kecamatan.regency_id', $this->_regency_id);
        return $this->db->get()->result_array();
    }

    public function getVillages()
    {
        $this->db->from('reg_villages as desa');
        $this->db->select('desa.id as id_desa, desa.name as desa');
        $this->db->where('desa.district_id', $this->_district_id);
        return $this->db->get()->result_array();
    }
}

/* End of file Site.php */
