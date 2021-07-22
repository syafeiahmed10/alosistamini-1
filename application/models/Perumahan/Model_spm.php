<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_spm extends CI_Model
{
    public function get_table($limit, $start)
    {
        $this->db->select('perumahan__spm.id_spm as id_spm, reg_regencies.name as kabupaten, reg_districts.name as kecamatan, reg_villages.name as kelurahan, perumahan__spm.tahun as tahun, perumahan_dropdown__pekerjaan_spm.pekerjaan, perumahan__spm.jml_rumah_ditangani as jml_rumah_ditangani, perumahan__spm.keterangan as keterangan, perumahan__spm.last_update as last_update');
        $this->db->join('perumahan_dropdown__pekerjaan_spm', 'perumahan_dropdown__pekerjaan_spm.id_pekerjaan_spm=perumahan__spm.id_pekerjaan_spm', 'left');
        $this->db->join('reg_villages', 'reg_villages.id=perumahan__spm.village_id', 'LEFT');
        $this->db->join('reg_districts', 'reg_districts.id = reg_villages.district_id', 'left');
        $this->db->join('reg_regencies', 'reg_regencies.id = reg_districts.regency_id', 'left');
        $this->db->order_by('last_update', 'asc');
        return $this->db->get('perumahan__spm', $limit, $start);
    }

    public function countRow()
    {
        $this->db->select('perumahan__spm.id_spm as id_spm, reg_regencies.name as kabupaten, reg_districts.name as kecamatan, reg_villages.name as kelurahan, perumahan__spm.tahun as tahun, perumahan_dropdown__pekerjaan_spm.pekerjaan, perumahan__spm.jml_rumah_ditangani as jml_rumah_ditangani, perumahan__spm.keterangan as keterangan, perumahan__spm.last_update as last_update');
        $this->db->join('perumahan_dropdown__pekerjaan_spm', 'perumahan_dropdown__pekerjaan_spm.id_pekerjaan_spm=perumahan__spm.id_pekerjaan_spm', 'left');
        $this->db->join('reg_villages', 'reg_villages.id=perumahan__spm.village_id', 'LEFT');
        $this->db->join('reg_districts', 'reg_districts.id = reg_villages.district_id', 'left');
        $this->db->join('reg_regencies', 'reg_regencies.id = reg_districts.regency_id', 'left');
        $this->db->order_by('last_update', 'asc');
        return $this->db->get('perumahan__spm')->num_rows();
    }
}

/* End of file Model_spm.php */
