<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_lokasi_kumuh extends CI_Model
{

    public function get_table($limit, $start)
    {
        $result = $this->db->select('reg__regencies.id as id_kabupaten,reg__regencies.name as kabupaten, kawasan__lokasi_kumuh.id_lokasi as id_lokasi, kawasan__lokasi_kumuh.lokasi as nama_lokasi,kawasan__lokasi_kumuh.luas as luas, kawasan__lokasi_kumuh.rt_rw as rt_rw, reg__villages.id as id_kelurahan, reg__villages.name as kelurahan,reg__districts.id as id_kecamatan ,reg__districts.name as kecamatan, kawasan__lokasi_kumuh.lintang as lintang, kawasan__lokasi_kumuh.bujur as bujur, kawasan__lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,  kawasan__surat_keterangan_kumuh.id_sk as id_sk,kawasan__surat_keterangan_kumuh.sk as sk,  kawasan__lokasi_kumuh.tingkat_kumuh as tingkat_kumuh, kawasan__lokasi_kumuh.last_update as last_update')->order_by('last_update', 'desc');
        // $result = $this->db->from('kawasan__lokasi_kumuh');
        $result = $this->db->join('kawasan__surat_keterangan_kumuh', 'kawasan__surat_keterangan_kumuh.id_sk=kawasan__lokasi_kumuh.id_sk', 'LEFT');
        $result = $this->db->join('reg__regencies', 'reg__regencies.id=kawasan__surat_keterangan_kumuh.regency_id', 'LEFT');
        // $result = $this->db->join('reg__districts', 'reg__districts.id=kawasan__lokasi_kumuh.district_id', 'LEFT');
        $result = $this->db->join('reg__villages', 'reg__villages.id=kawasan__lokasi_kumuh.village_id', 'LEFT');
        $result = $this->db->join('reg__districts', 'reg__districts.id=reg__villages.district_id', 'LEFT');

        $result = $this->db->get('kawasan__lokasi_kumuh', $limit, $start);

        return $result;
    }

    // public function get_table()
    // {
    //     $result = $this->db->select('reg__regencies.id as id_kabupaten,reg__regencies.name as kabupaten, kawasan__lokasi_kumuh.id_lokasi as id_lokasi, kawasan__lokasi_kumuh.lokasi as nama_lokasi,kawasan__lokasi_kumuh.luas as luas, kawasan__lokasi_kumuh.rt_rw as rt_rw, reg__villages.id as id_kelurahan, reg__villages.name as kelurahan,reg__districts.id as id_kecamatan ,reg__districts.name as kecamatan, kawasan__lokasi_kumuh.lintang as lintang, kawasan__lokasi_kumuh.bujur as bujur, kawasan__lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,  kawasan__surat_keterangan_kumuh.id_sk as id_sk,kawasan__surat_keterangan_kumuh.sk as sk,  kawasan__lokasi_kumuh.tingkat_kumuh as tingkat_kumuh, kawasan__lokasi_kumuh.last_update as last_update')->order_by('last_update', 'desc');
    //     // $result = $this->db->from('kawasan__lokasi_kumuh');
    //     $result = $this->db->join('kawasan__surat_keterangan_kumuh', 'kawasan__surat_keterangan_kumuh.id_sk=kawasan__lokasi_kumuh.id_sk', 'LEFT');
    //     $result = $this->db->join('reg__regencies', 'reg__regencies.id=kawasan__surat_keterangan_kumuh.regency_id', 'LEFT');
    //     // $result = $this->db->join('reg__districts', 'reg__districts.id=kawasan__lokasi_kumuh.district_id', 'LEFT');
    //     $result = $this->db->join('reg__villages', 'reg__villages.id=kawasan__lokasi_kumuh.village_id', 'LEFT');
    //     $result = $this->db->join('reg__districts', 'reg__districts.id=reg__villages.district_id', 'LEFT');

    //     $result = $this->db->get('kawasan__lokasi_kumuh');

    //     return $result;
    // }

    public function countRow()
    {
        $result = $this->db->select('reg__regencies.id as id_kabupaten,reg__regencies.name as kabupaten, kawasan__lokasi_kumuh.id_lokasi as id_lokasi, kawasan__lokasi_kumuh.lokasi as nama_lokasi,kawasan__lokasi_kumuh.luas as luas, kawasan__lokasi_kumuh.rt_rw as rt_rw, reg__villages.id as id_kelurahan, reg__villages.name as kelurahan,reg__districts.id as id_kecamatan ,reg__districts.name as kecamatan, kawasan__lokasi_kumuh.lintang as lintang, kawasan__lokasi_kumuh.bujur as bujur, kawasan__lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,  kawasan__surat_keterangan_kumuh.id_sk as id_sk,kawasan__surat_keterangan_kumuh.sk as sk,  kawasan__lokasi_kumuh.tingkat_kumuh as tingkat_kumuh');
        // $result = $this->db->from('kawasan__lokasi_kumuh');
        $result = $this->db->join('kawasan__surat_keterangan_kumuh', 'kawasan__surat_keterangan_kumuh.id_sk=kawasan__lokasi_kumuh.id_sk', 'LEFT');
        $result = $this->db->join('reg__regencies', 'reg__regencies.id=kawasan__surat_keterangan_kumuh.regency_id', 'LEFT');
        // $result = $this->db->join('reg__districts', 'reg__districts.id=kawasan__lokasi_kumuh.district_id', 'LEFT');
        $result = $this->db->join('reg__villages', 'reg__villages.id=kawasan__lokasi_kumuh.village_id', 'LEFT');
        $result = $this->db->join('reg__districts', 'reg__districts.id=reg__villages.district_id', 'LEFT');
        $result = $this->db->get('kawasan__lokasi_kumuh');
        return $result->num_rows();
    }

    public function update($id = NULL)
    {
        $result = $this->db->select('reg__regencies.id as id_kabupaten, reg__regencies.name as kabupaten, kawasan__lokasi_kumuh.id_lokasi as id_lokasi, kawasan__lokasi_kumuh.lokasi as nama_lokasi,kawasan__lokasi_kumuh.luas as luas, kawasan__lokasi_kumuh.rt_rw as rt_rw, reg__villages.id as id_kelurahan, reg__villages.name as kelurahan, reg__districts.id as id_kecamatan, reg__districts.name as kecamatan, kawasan__lokasi_kumuh.lintang as lintang, kawasan__lokasi_kumuh.bujur as bujur, kawasan__lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,  kawasan__surat_keterangan_kumuh.id_sk as id_sk,kawasan__surat_keterangan_kumuh.sk as sk,  kawasan__lokasi_kumuh.tingkat_kumuh as tingkat_kumuh, kawasan__lokasi_kumuh.rt_rw as rt_rw');
        $result = $this->db->from('kawasan__lokasi_kumuh');
        $result = $this->db->join('kawasan__surat_keterangan_kumuh', 'kawasan__surat_keterangan_kumuh.id_sk=kawasan__lokasi_kumuh.id_sk', 'LEFT');
        $result = $this->db->join('reg__regencies', 'reg__regencies.id=kawasan__surat_keterangan_kumuh.regency_id', 'LEFT');
        // $result = $this->db->join('reg__districts', 'reg__districts.id=kawasan__lokasi_kumuh.district_id', 'LEFT');
        $result = $this->db->join('reg__villages', 'reg__villages.id=kawasan__lokasi_kumuh.village_id', 'LEFT');
        $result = $this->db->join('reg__districts', 'reg__districts.id=reg__villages.district_id', 'LEFT');
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
        $this->db->update('kawasan__lokasi_kumuh', $data);
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
        $this->db->insert('kawasan__lokasi_kumuh', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_lokasi', $id);
        $this->db->delete('kawasan__lokasi_kumuh');
    }
    public function delete_selected($id)
    {
        $this->db->where('id_lokasi', $id);
        $this->db->delete('kawasan__lokasi_kumuh');
    }
}

/* End of file Model_lokasi_kumuh.php */
