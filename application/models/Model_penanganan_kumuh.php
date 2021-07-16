<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Model_penanganan_kumuh extends CI_Model
{
    public function get_table($limit, $start)
    {
        $result = $this->db->select('penanganan_lokasi_kumuh.id_penanganan as id_penanganan,reg_regencies.id as id_kabupaten,reg_regencies.name as kabupaten, lokasi_kumuh.id_lokasi as id_lokasi, lokasi_kumuh.lokasi as nama_lokasi,penanganan_lokasi_kumuh.luas_tertangani as luas_tertangani, lokasi_kumuh.rt_rw as rt_rw, reg_villages.id as id_kelurahan, reg_villages.name as kelurahan,reg_districts.id as id_kecamatan ,reg_districts.name as kecamatan, lokasi_kumuh.lintang as lintang, lokasi_kumuh.bujur as bujur, lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,  surat_keterangan_kumuh.id_sk as id_sk,surat_keterangan_kumuh.sk as sk,  lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,penanganan_lokasi_kumuh.tahun as tahun, penanganan_lokasi_kumuh.kegiatan as kegiatan,penanganan_lokasi_kumuh.nominal as nominal,penanganan_lokasi_kumuh.sumber_dana as sumber_dana');
        // $result = $this->db->from('penanganan_lokasi_kumuh');
        $result = $this->db->join('lokasi_kumuh', 'lokasi_kumuh.id_lokasi=penanganan_lokasi_kumuh.id_lokasi');
        $result = $this->db->join('surat_keterangan_kumuh', 'surat_keterangan_kumuh.id_sk=lokasi_kumuh.id_sk', 'LEFT');
        $result = $this->db->join('reg_regencies', 'reg_regencies.id=surat_keterangan_kumuh.regency_id', 'LEFT');
        // $result = $this->db->join('reg_districts', 'reg_districts.id=lokasi_kumuh.district_id', 'LEFT');
        $result = $this->db->join('reg_villages', 'reg_villages.id=lokasi_kumuh.village_id', 'LEFT');
        $result = $this->db->join('reg_districts', 'reg_districts.id=reg_villages.district_id', 'LEFT');
        $result = $this->db->get('penanganan_lokasi_kumuh', $limit, $start);
        return $result;
    }
    // onporgress
    public function countRow()
    {
        $result = $this->db->select('penanganan_lokasi_kumuh.id_penanganan as id_penanganan,reg_regencies.id as id_kabupaten,reg_regencies.name as kabupaten, lokasi_kumuh.id_lokasi as id_lokasi, lokasi_kumuh.lokasi as nama_lokasi,penanganan_lokasi_kumuh.luas_tertangani as luas_tertangani, lokasi_kumuh.rt_rw as rt_rw, reg_villages.id as id_kelurahan, reg_villages.name as kelurahan,reg_districts.id as id_kecamatan ,reg_districts.name as kecamatan, lokasi_kumuh.lintang as lintang, lokasi_kumuh.bujur as bujur, lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,  surat_keterangan_kumuh.id_sk as id_sk,surat_keterangan_kumuh.sk as sk,  lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,penanganan_lokasi_kumuh.tahun as tahun, penanganan_lokasi_kumuh.kegiatan as kegiatan,penanganan_lokasi_kumuh.nominal as nominal,penanganan_lokasi_kumuh.sumber_dana as sumber_dana');
        // $result = $this->db->from('penanganan_lokasi_kumuh');
        $result = $this->db->join('lokasi_kumuh', 'lokasi_kumuh.id_lokasi=penanganan_lokasi_kumuh.id_lokasi');
        $result = $this->db->join('surat_keterangan_kumuh', 'surat_keterangan_kumuh.id_sk=lokasi_kumuh.id_sk', 'LEFT');
        $result = $this->db->join('reg_regencies', 'reg_regencies.id=surat_keterangan_kumuh.regency_id', 'LEFT');
        // $result = $this->db->join('reg_districts', 'reg_districts.id=lokasi_kumuh.district_id', 'LEFT');
        $result = $this->db->join('reg_villages', 'reg_villages.id=lokasi_kumuh.village_id', 'LEFT');
        $result = $this->db->join('reg_districts', 'reg_districts.id=reg_villages.district_id', 'LEFT');
        $result = $this->db->get('penanganan_lokasi_kumuh')->num_rows();
        return $result;
    }

    public function update($id = NULL)
    {
        $result = $this->db->select('penanganan_lokasi_kumuh.id_penanganan as id_penanganan,reg_regencies.id as id_kabupaten, reg_regencies.name as kabupaten, lokasi_kumuh.id_lokasi as id_lokasi, lokasi_kumuh.lokasi as nama_lokasi,lokasi_kumuh.luas as luas, lokasi_kumuh.rt_rw as rt_rw, reg_villages.id as id_kelurahan, reg_villages.name as kelurahan, reg_districts.id as id_kecamatan, reg_districts.name as kecamatan, lokasi_kumuh.lintang as lintang, lokasi_kumuh.bujur as bujur, lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,  surat_keterangan_kumuh.id_sk as id_sk,surat_keterangan_kumuh.sk as sk,  lokasi_kumuh.tingkat_kumuh as tingkat_kumuh, lokasi_kumuh.rt_rw as rt_rw,penanganan_lokasi_kumuh.kegiatan as kegiatan,penanganan_lokasi_kumuh.nominal as nominal,penanganan_lokasi_kumuh.sumber_dana as sumber_dana, penanganan_lokasi_kumuh.tahun as tahun,penanganan_lokasi_kumuh.luas_tertangani as luas_tertangani');
        $result = $this->db->from('penanganan_lokasi_kumuh');
        $result = $this->db->join('lokasi_kumuh', 'lokasi_kumuh.id_lokasi=penanganan_lokasi_kumuh.id_lokasi', 'LEFT');
        $result = $this->db->join('surat_keterangan_kumuh', 'surat_keterangan_kumuh.id_sk=lokasi_kumuh.id_sk', 'LEFT');
        $result = $this->db->join('reg_regencies', 'reg_regencies.id=surat_keterangan_kumuh.regency_id', 'LEFT');
        // $result = $this->db->join('reg_districts', 'reg_districts.id=lokasi_kumuh.district_id', 'LEFT');
        $result = $this->db->join('reg_villages', 'reg_villages.id=lokasi_kumuh.village_id', 'LEFT');
        $result = $this->db->join('reg_districts', 'reg_districts.id=reg_villages.district_id', 'LEFT');
        $result = $this->db->where('id_penanganan', $id);
        $result = $this->db->get();
        return $result;
    }

    public function update_action($id)
    {

        $this->db->where('id_penanganan', $id);

        $data = [
            'id_lokasi' => $this->input->post('nama_lokasi'),
            'luas_tertangani' => (float)$this->input->post('luas_tertangani'),
            'tahun' => $this->input->post('tahun'),
            'kegiatan' => $this->input->post('kegiatan'),
            'nominal' => $this->input->post('nominal'),
            'sumber_dana' => $this->input->post('sumber_dana'),
            'last_update' => now()
        ];
        $this->db->update('penanganan_lokasi_kumuh', $data);
    }

    // onporgress

    public function add()
    {
        $data = [
            'id_lokasi' => $this->input->post('lokasi_kumuh'),
            'luas_tertangani' => $this->input->post('luas_tertangani'),
            'tahun' => $this->input->post('tahun'),
            'kegiatan' => $this->input->post('kegiatan'),
            'nominal' => $this->input->post('nominal'),
            'sumber_dana' => $this->input->post('sumber_dana'),
            'last_update' => now()
        ];
        $this->db->insert('penanganan_lokasi_kumuh', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_penanganan', $id);
        $this->db->delete('penanganan_lokasi_kumuh');
    }
    public function delete_selected($id)
    {
        $this->db->where('id_penanganan', $id);
        $this->db->delete('penanganan_lokasi_kumuh');
    }
}

/* End of file Model_penanganan_kumuh.php */
