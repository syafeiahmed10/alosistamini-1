<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_lokasi_kumuh extends CI_Model
{

    public function get_table($limit, $start)
    {
        $result = $this->db->select('reg_regencies.id as id_kabupaten,reg_regencies.name as kabupaten, kawasan_lokasi_kumuh.id_lokasi as id_lokasi, kawasan_lokasi_kumuh.lokasi as nama_lokasi,kawasan_lokasi_kumuh.luas as luas, kawasan_lokasi_kumuh.rt_rw as rt_rw, reg_villages.id as id_kelurahan, reg_villages.name as kelurahan,reg_districts.id as id_kecamatan ,reg_districts.name as kecamatan, kawasan_lokasi_kumuh.lintang as lintang, kawasan_lokasi_kumuh.bujur as bujur, kawasan_lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,  kawasan_surat_keterangan_kumuh.id_sk as id_sk,kawasan_surat_keterangan_kumuh.sk as sk,  kawasan_lokasi_kumuh.tingkat_kumuh as tingkat_kumuh');
        // $result = $this->db->from('kawasan_lokasi_kumuh');
        $result = $this->db->join('kawasan_surat_keterangan_kumuh', 'kawasan_surat_keterangan_kumuh.id_sk=kawasan_lokasi_kumuh.id_sk', 'LEFT');
        $result = $this->db->join('reg_regencies', 'reg_regencies.id=kawasan_surat_keterangan_kumuh.regency_id', 'LEFT');
        // $result = $this->db->join('reg_districts', 'reg_districts.id=kawasan_lokasi_kumuh.district_id', 'LEFT');
        $result = $this->db->join('reg_villages', 'reg_villages.id=kawasan_lokasi_kumuh.village_id', 'LEFT');
        $result = $this->db->join('reg_districts', 'reg_districts.id=reg_villages.district_id', 'LEFT');
        $result = $this->db->get('kawasan_lokasi_kumuh', $limit, $start);
        return $result;
    }

    public function countRow()
    {
        $result = $this->db->select('reg_regencies.id as id_kabupaten,reg_regencies.name as kabupaten, kawasan_lokasi_kumuh.id_lokasi as id_lokasi, kawasan_lokasi_kumuh.lokasi as nama_lokasi,kawasan_lokasi_kumuh.luas as luas, kawasan_lokasi_kumuh.rt_rw as rt_rw, reg_villages.id as id_kelurahan, reg_villages.name as kelurahan,reg_districts.id as id_kecamatan ,reg_districts.name as kecamatan, kawasan_lokasi_kumuh.lintang as lintang, kawasan_lokasi_kumuh.bujur as bujur, kawasan_lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,  kawasan_surat_keterangan_kumuh.id_sk as id_sk,kawasan_surat_keterangan_kumuh.sk as sk,  kawasan_lokasi_kumuh.tingkat_kumuh as tingkat_kumuh');
        // $result = $this->db->from('kawasan_lokasi_kumuh');
        $result = $this->db->join('kawasan_surat_keterangan_kumuh', 'kawasan_surat_keterangan_kumuh.id_sk=kawasan_lokasi_kumuh.id_sk', 'LEFT');
        $result = $this->db->join('reg_regencies', 'reg_regencies.id=kawasan_surat_keterangan_kumuh.regency_id', 'LEFT');
        // $result = $this->db->join('reg_districts', 'reg_districts.id=kawasan_lokasi_kumuh.district_id', 'LEFT');
        $result = $this->db->join('reg_villages', 'reg_villages.id=kawasan_lokasi_kumuh.village_id', 'LEFT');
        $result = $this->db->join('reg_districts', 'reg_districts.id=reg_villages.district_id', 'LEFT');
        $result = $this->db->get('kawasan_lokasi_kumuh');
        return $result->num_rows();
    }

    public function update($id = NULL)
    {
        $result = $this->db->select('reg_regencies.id as id_kabupaten, reg_regencies.name as kabupaten, kawasan_lokasi_kumuh.id_lokasi as id_lokasi, kawasan_lokasi_kumuh.lokasi as nama_lokasi,kawasan_lokasi_kumuh.luas as luas, kawasan_lokasi_kumuh.rt_rw as rt_rw, reg_villages.id as id_kelurahan, reg_villages.name as kelurahan, reg_districts.id as id_kecamatan, reg_districts.name as kecamatan, kawasan_lokasi_kumuh.lintang as lintang, kawasan_lokasi_kumuh.bujur as bujur, kawasan_lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,  kawasan_surat_keterangan_kumuh.id_sk as id_sk,kawasan_surat_keterangan_kumuh.sk as sk,  kawasan_lokasi_kumuh.tingkat_kumuh as tingkat_kumuh, kawasan_lokasi_kumuh.rt_rw as rt_rw');
        $result = $this->db->from('kawasan_lokasi_kumuh');
        $result = $this->db->join('kawasan_surat_keterangan_kumuh', 'kawasan_surat_keterangan_kumuh.id_sk=kawasan_lokasi_kumuh.id_sk', 'LEFT');
        $result = $this->db->join('reg_regencies', 'reg_regencies.id=kawasan_surat_keterangan_kumuh.regency_id', 'LEFT');
        // $result = $this->db->join('reg_districts', 'reg_districts.id=kawasan_lokasi_kumuh.district_id', 'LEFT');
        $result = $this->db->join('reg_villages', 'reg_villages.id=kawasan_lokasi_kumuh.village_id', 'LEFT');
        $result = $this->db->join('reg_districts', 'reg_districts.id=reg_villages.district_id', 'LEFT');
        $result = $this->db->where('id_lokasi', $id);
        $result = $this->db->get();
        return $result;
    }

    public function update_action($id)
    {

        $this->db->where('id_lokasi', $id);
        $id_sk = explode("|", $this->input->post('kawasan_surat_keterangan_kumuh'));
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
        $this->db->update('kawasan_lokasi_kumuh', $data);
    }

    public function add()
    {
        $id_sk = explode("|", $this->input->post('kawasan_surat_keterangan_kumuh'));
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
        $this->db->insert('kawasan_lokasi_kumuh', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_lokasi', $id);
        $this->db->delete('kawasan_lokasi_kumuh');
    }
    public function delete_selected($id)
    {
        $this->db->where('id_lokasi', $id);
        $this->db->delete('kawasan_lokasi_kumuh');
    }
}

/* End of file Model_lokasi_kumuh.php */
