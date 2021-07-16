<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_lokasi_kumuh extends CI_Model
{

    public function get_table($limit, $start)
    {
        $result = $this->db->select('reg_regencies.id as id_kabupaten,reg_regencies.name as kabupaten, lokasi_kumuh.id_lokasi as id_lokasi, lokasi_kumuh.lokasi as nama_lokasi,lokasi_kumuh.luas as luas, lokasi_kumuh.rt_rw as rt_rw, reg_villages.id as id_kelurahan, reg_villages.name as kelurahan,reg_districts.id as id_kecamatan ,reg_districts.name as kecamatan, lokasi_kumuh.lintang as lintang, lokasi_kumuh.bujur as bujur, lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,  surat_keterangan_kumuh.id_sk as id_sk,surat_keterangan_kumuh.sk as sk,  lokasi_kumuh.tingkat_kumuh as tingkat_kumuh');
        // $result = $this->db->from('lokasi_kumuh');
        $result = $this->db->join('surat_keterangan_kumuh', 'surat_keterangan_kumuh.id_sk=lokasi_kumuh.id_sk', 'LEFT');
        $result = $this->db->join('reg_regencies', 'reg_regencies.id=surat_keterangan_kumuh.regency_id', 'LEFT');
        // $result = $this->db->join('reg_districts', 'reg_districts.id=lokasi_kumuh.district_id', 'LEFT');
        $result = $this->db->join('reg_villages', 'reg_villages.id=lokasi_kumuh.village_id', 'LEFT');
        $result = $this->db->join('reg_districts', 'reg_districts.id=reg_villages.district_id', 'LEFT');
        $result = $this->db->get('lokasi_kumuh', $limit, $start);
        return $result;
    }

    public function countRow()
    {
        $result = $this->db->select('reg_regencies.id as id_kabupaten,reg_regencies.name as kabupaten, lokasi_kumuh.id_lokasi as id_lokasi, lokasi_kumuh.lokasi as nama_lokasi,lokasi_kumuh.luas as luas, lokasi_kumuh.rt_rw as rt_rw, reg_villages.id as id_kelurahan, reg_villages.name as kelurahan,reg_districts.id as id_kecamatan ,reg_districts.name as kecamatan, lokasi_kumuh.lintang as lintang, lokasi_kumuh.bujur as bujur, lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,  surat_keterangan_kumuh.id_sk as id_sk,surat_keterangan_kumuh.sk as sk,  lokasi_kumuh.tingkat_kumuh as tingkat_kumuh');
        // $result = $this->db->from('lokasi_kumuh');
        $result = $this->db->join('surat_keterangan_kumuh', 'surat_keterangan_kumuh.id_sk=lokasi_kumuh.id_sk', 'LEFT');
        $result = $this->db->join('reg_regencies', 'reg_regencies.id=surat_keterangan_kumuh.regency_id', 'LEFT');
        // $result = $this->db->join('reg_districts', 'reg_districts.id=lokasi_kumuh.district_id', 'LEFT');
        $result = $this->db->join('reg_villages', 'reg_villages.id=lokasi_kumuh.village_id', 'LEFT');
        $result = $this->db->join('reg_districts', 'reg_districts.id=reg_villages.district_id', 'LEFT');
        $result = $this->db->get('lokasi_kumuh');
        return $result->num_rows();
    }

    public function update($id = NULL)
    {
        $result = $this->db->select('reg_regencies.id as id_kabupaten, reg_regencies.name as kabupaten, lokasi_kumuh.id_lokasi as id_lokasi, lokasi_kumuh.lokasi as nama_lokasi,lokasi_kumuh.luas as luas, lokasi_kumuh.rt_rw as rt_rw, reg_villages.id as id_kelurahan, reg_villages.name as kelurahan, reg_districts.id as id_kecamatan, reg_districts.name as kecamatan, lokasi_kumuh.lintang as lintang, lokasi_kumuh.bujur as bujur, lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,  surat_keterangan_kumuh.id_sk as id_sk,surat_keterangan_kumuh.sk as sk,  lokasi_kumuh.tingkat_kumuh as tingkat_kumuh, lokasi_kumuh.rt_rw as rt_rw');
        $result = $this->db->from('lokasi_kumuh');
        $result = $this->db->join('surat_keterangan_kumuh', 'surat_keterangan_kumuh.id_sk=lokasi_kumuh.id_sk', 'LEFT');
        $result = $this->db->join('reg_regencies', 'reg_regencies.id=surat_keterangan_kumuh.regency_id', 'LEFT');
        // $result = $this->db->join('reg_districts', 'reg_districts.id=lokasi_kumuh.district_id', 'LEFT');
        $result = $this->db->join('reg_villages', 'reg_villages.id=lokasi_kumuh.village_id', 'LEFT');
        $result = $this->db->join('reg_districts', 'reg_districts.id=reg_villages.district_id', 'LEFT');
        $result = $this->db->where('id_lokasi', $id);
        $result = $this->db->get();
        return $result;
    }

    public function update_action($id)
    {

        $this->db->where('id_lokasi', $id);
        $id_sk = explode("|", $this->input->post('surat_keterangan_kumuh'));
        $this->load->helper('alosista_helper');
        $data = [
            'id_sk' => $id_sk[1],
            'lokasi' => $this->input->post('nama_lokasi'),
            'luas' => (float)$this->input->post('luas'),
            'rt_rw' => $this->input->post('rt_rw'),
            'village_id' => $this->input->post('kelurahan'),
            'bujur' => get_digit_after_dot_lat_long($this->input->post('bujur')),
            'lintang' => get_digit_after_dot_lat_long($this->input->post('lintang')),
            'tingkat_kumuh' => $this->input->post('tingkat_kumuh'),
            'last_update' => now()
        ];
        $this->db->update('lokasi_kumuh', $data);
    }

    public function add()
    {
        $id_sk = explode("|", $this->input->post('surat_keterangan_kumuh'));
        $this->load->helper('alosista_helper');

        $data = [
            'id_sk' => $id_sk[1],
            'lokasi' => $this->input->post('nama_lokasi'),
            'luas' => (float)$this->input->post('luas'),
            'rt_rw' => $this->input->post('rt_rw'),
            'village_id' => $this->input->post('kelurahan'),
            'bujur' => get_digit_after_dot_lat_long($this->input->post('bujur')),
            'lintang' => get_digit_after_dot_lat_long($this->input->post('lintang')),
            'tingkat_kumuh' => $this->input->post('tingkat_kumuh'),
            'last_update' => now()
        ];
        $this->db->insert('lokasi_kumuh', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_lokasi', $id);
        $this->db->delete('lokasi_kumuh');
    }
    public function delete_selected($id)
    {
        $this->db->where('id_lokasi', $id);
        $this->db->delete('lokasi_kumuh');
    }
}

/* End of file Model_lokasi_kumuh.php */
