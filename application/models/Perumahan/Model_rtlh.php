<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_rtlh extends CI_Model
{
    public function get_table($limit, $start)
    {
        $this->db->select('perumahan__rtlh.id_rtlh as id_rtlh,reg__regencies.name as kabupaten, reg__districts.name as kecamatan, reg__villages.name as kelurahan, perumahan__rtlh.unit_pbdt as unit_pbdt, perumahan__rtlh.unit_dtpfmotm as unit_dtpfmotm, perumahan__rtlh.unit_dtks as unit_dtks, perumahan__rtlh.tahun as tahun,perumahan__rtlh.keterangan as keterangan, perumahan__rtlh.last_update as last_update');
        $this->db->join('reg__villages', 'reg__villages.id=perumahan__rtlh.village_id', 'LEFT');
        $this->db->join('reg__districts', 'reg__districts.id = reg__villages.district_id', 'left');
        $this->db->join('reg__regencies', 'reg__regencies.id = reg__districts.regency_id', 'left');
        $this->db->order_by('last_update', 'asc');
        return $this->db->get('perumahan__rtlh', $limit, $start);
    }

    public function countRow()
    {
        $this->db->select('perumahan__rtlh.id_rtlh as id_rtlh,reg__regencies.name as kabupaten, reg__districts.name as kecamatan, reg__villages.name as kelurahan, perumahan__rtlh.unit_pbdt as unit_pbdt, perumahan__rtlh.unit_dtpfmotm as unit_dtpfmotm, perumahan__rtlh.unit_dtks as unit_dtks, perumahan__rtlh.tahun as tahun,perumahan__rtlh.keterangan as keterangan, perumahan__rtlh.last_update as last_update');
        $this->db->join('reg__villages', 'reg__villages.id=perumahan__rtlh.village_id', 'LEFT');
        $this->db->join('reg__districts', 'reg__districts.id = reg__villages.district_id', 'left');
        $this->db->join('reg__regencies', 'reg__regencies.id = reg__districts.regency_id', 'left');
        $this->db->order_by('last_update', 'asc');
        return $this->db->get('perumahan__rtlh')->num_rows();
    }
}

/* End of file Model_rtlh.php */
