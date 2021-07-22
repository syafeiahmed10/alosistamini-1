<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_spm extends CI_Model
{
    public function get_table($limit, $start)
    {
        $this->db->select('perumahan__spm.id_spm as id_spm, reg__regencies.name as kabupaten, reg__districts.name as kecamatan, reg__villages.name as kelurahan, perumahan__spm.tahun as tahun, perumahan_dropdown__pekerjaan_spm.pekerjaan, perumahan__spm.jml_rumah_ditangani as jml_rumah_ditangani, perumahan__spm.keterangan as keterangan, perumahan__spm.last_update as last_update');
        $this->db->join('perumahan_dropdown__pekerjaan_spm', 'perumahan_dropdown__pekerjaan_spm.id_pekerjaan_spm=perumahan__spm.id_pekerjaan_spm', 'left');
        $this->db->join('reg__villages', 'reg__villages.id=perumahan__spm.village_id', 'LEFT');
        $this->db->join('reg__districts', 'reg__districts.id = reg__villages.district_id', 'left');
        $this->db->join('reg__regencies', 'reg__regencies.id = reg__districts.regency_id', 'left');
        $this->db->order_by('last_update', 'asc');
        return $this->db->get('perumahan__spm', $limit, $start);
    }

    public function countRow()
    {
        $this->db->select('perumahan__spm.id_spm as id_spm, reg__regencies.name as kabupaten, reg__districts.name as kecamatan, reg__villages.name as kelurahan, perumahan__spm.tahun as tahun, perumahan_dropdown__pekerjaan_spm.pekerjaan, perumahan__spm.jml_rumah_ditangani as jml_rumah_ditangani, perumahan__spm.keterangan as keterangan, perumahan__spm.last_update as last_update');
        $this->db->join('perumahan_dropdown__pekerjaan_spm', 'perumahan_dropdown__pekerjaan_spm.id_pekerjaan_spm=perumahan__spm.id_pekerjaan_spm', 'left');
        $this->db->join('reg__villages', 'reg__villages.id=perumahan__spm.village_id', 'LEFT');
        $this->db->join('reg__districts', 'reg__districts.id = reg__villages.district_id', 'left');
        $this->db->join('reg__regencies', 'reg__regencies.id = reg__districts.regency_id', 'left');
        $this->db->order_by('last_update', 'asc');
        return $this->db->get('perumahan__spm')->num_rows();
    }
}

/* End of file Model_spm.php */
