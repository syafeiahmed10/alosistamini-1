<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_pembangunan_rumah extends CI_Model
{
    public function get_table($limit, $start)
    {
        $this->db->select('perumahan__pembangunan_rumah.id_pembangunan as id_pembangunan, reg__regencies.name as kabupaten, reg__districts.name as kecamatan, reg__villages.name as kelurahan, perumahan__pembangunan_rumah.unit as unit, perumahan_dropdown__mbr.mbr as mbr, perumahan_dropdown__imb.imb as imb, perumahan_dropdown__pelaksana.pelaksana as pelaksana, perumahan__pembangunan_rumah.tahun as tahun, perumahan__pembangunan_rumah.keterangan as keterangan,  perumahan__pembangunan_rumah.last_update as last_update ');
        $this->db->join('perumahan_dropdown__imb', 'perumahan_dropdown__imb.id_imb=perumahan__pembangunan_rumah.id_imb', 'LEFT');
        $this->db->join('perumahan_dropdown__mbr', 'perumahan_dropdown__mbr.id_mbr=perumahan__pembangunan_rumah.id_mbr', 'LEFT');
        $this->db->join('perumahan_dropdown__pelaksana', 'perumahan_dropdown__pelaksana.id_pelaksana=perumahan__pembangunan_rumah.id_pelaksana', 'LEFT');
        $this->db->join('reg__villages', 'reg__villages.id=perumahan__pembangunan_rumah.village_id', 'LEFT');
        $this->db->join('reg__districts', 'reg__districts.id = reg__villages.district_id', 'left');
        $this->db->join('reg__regencies', 'reg__regencies.id = reg__districts.regency_id', 'left');
        return $this->db->get('perumahan__pembangunan_rumah', $limit, $start);
    }

    public function countRow()
    {
        $this->db->join('reg__villages', 'reg__villages.id=perumahan__pembangunan_rumah.village_id', 'LEFT');
        $this->db->join('perumahan_dropdown__imb', 'perumahan_dropdown__imb.id_imb=perumahan__pembangunan_rumah.id_imb', 'LEFT');
        $this->db->join('perumahan_dropdown__mbr', 'perumahan_dropdown__mbr.id_mbr=perumahan__pembangunan_rumah.id_mbr', 'LEFT');
        $this->db->join('perumahan_dropdown__pelaksana', 'perumahan_dropdown__pelaksana.id_pelaksana=perumahan__pembangunan_rumah.id_pelaksana', 'LEFT');
        return $this->db->get('perumahan__pembangunan_rumah')->num_rows();;
    }
}

/* End of file Model_pembangunan_rumah.php */
