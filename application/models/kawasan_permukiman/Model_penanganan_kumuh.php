<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Model_penanganan_kumuh extends CI_Model
{
    public function get_table($limit, $start)
    {
        $result = $this->db->select('kawasan__penanganan_lokasi_kumuh.id_penanganan as id_penanganan,reg_regencies.id as id_kabupaten,reg_regencies.name as kabupaten, kawasan__lokasi_kumuh.id_lokasi as id_lokasi, kawasan__lokasi_kumuh.lokasi as nama_lokasi,kawasan__penanganan_lokasi_kumuh.luas_tertangani as luas_tertangani, kawasan__lokasi_kumuh.rt_rw as rt_rw, reg_villages.id as id_kelurahan, reg_villages.name as kelurahan,reg_districts.id as id_kecamatan ,reg_districts.name as kecamatan, kawasan__lokasi_kumuh.lintang as lintang, kawasan__lokasi_kumuh.bujur as bujur, kawasan__lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,  kawasan__surat_keterangan_kumuh.id_sk as id_sk,kawasan__surat_keterangan_kumuh.sk as sk,  kawasan__lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,kawasan__penanganan_lokasi_kumuh.tahun as tahun, kawasan__penanganan_lokasi_kumuh.kegiatan as kegiatan,kawasan__penanganan_lokasi_kumuh.nominal as nominal,kawasan__penanganan_lokasi_kumuh.sumber_dana as sumber_dana, kawasan__penanganan_lokasi_kumuh.last_update as last_update')->order_by('last_update', 'desc');
        // $result = $this->db->from('kawasan__penanganan_lokasi_kumuh');
        $result = $this->db->join('kawasan__lokasi_kumuh', 'kawasan__lokasi_kumuh.id_lokasi=kawasan__penanganan_lokasi_kumuh.id_lokasi');
        $result = $this->db->join('kawasan__surat_keterangan_kumuh', 'kawasan__surat_keterangan_kumuh.id_sk=kawasan__lokasi_kumuh.id_sk', 'LEFT');
        $result = $this->db->join('reg_regencies', 'reg_regencies.id=kawasan__surat_keterangan_kumuh.regency_id', 'LEFT');
        // $result = $this->db->join('reg_districts', 'reg_districts.id=kawasan__lokasi_kumuh.district_id', 'LEFT');
        $result = $this->db->join('reg_villages', 'reg_villages.id=kawasan__lokasi_kumuh.village_id', 'LEFT');
        $result = $this->db->join('reg_districts', 'reg_districts.id=reg_villages.district_id', 'LEFT');

        $result = $this->db->get('kawasan__penanganan_lokasi_kumuh', $limit, $start);
        return $result;
    }
    // onporgress
    public function countRow()
    {
        $result = $this->db->select('kawasan__penanganan_lokasi_kumuh.id_penanganan as id_penanganan,reg_regencies.id as id_kabupaten,reg_regencies.name as kabupaten, kawasan__lokasi_kumuh.id_lokasi as id_lokasi, kawasan__lokasi_kumuh.lokasi as nama_lokasi,kawasan__penanganan_lokasi_kumuh.luas_tertangani as luas_tertangani, kawasan__lokasi_kumuh.rt_rw as rt_rw, reg_villages.id as id_kelurahan, reg_villages.name as kelurahan,reg_districts.id as id_kecamatan ,reg_districts.name as kecamatan, kawasan__lokasi_kumuh.lintang as lintang, kawasan__lokasi_kumuh.bujur as bujur, kawasan__lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,  kawasan__surat_keterangan_kumuh.id_sk as id_sk,kawasan__surat_keterangan_kumuh.sk as sk,  kawasan__lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,kawasan__penanganan_lokasi_kumuh.tahun as tahun, kawasan__penanganan_lokasi_kumuh.kegiatan as kegiatan,kawasan__penanganan_lokasi_kumuh.nominal as nominal,kawasan__penanganan_lokasi_kumuh.sumber_dana as sumber_dana');
        // $result = $this->db->from('kawasan__penanganan_lokasi_kumuh');
        $result = $this->db->join('kawasan__lokasi_kumuh', 'kawasan__lokasi_kumuh.id_lokasi=kawasan__penanganan_lokasi_kumuh.id_lokasi');
        $result = $this->db->join('kawasan__surat_keterangan_kumuh', 'kawasan__surat_keterangan_kumuh.id_sk=kawasan__lokasi_kumuh.id_sk', 'LEFT');
        $result = $this->db->join('reg_regencies', 'reg_regencies.id=kawasan__surat_keterangan_kumuh.regency_id', 'LEFT');
        // $result = $this->db->join('reg_districts', 'reg_districts.id=kawasan__lokasi_kumuh.district_id', 'LEFT');
        $result = $this->db->join('reg_villages', 'reg_villages.id=kawasan__lokasi_kumuh.village_id', 'LEFT');
        $result = $this->db->join('reg_districts', 'reg_districts.id=reg_villages.district_id', 'LEFT');
        $result = $this->db->get('kawasan__penanganan_lokasi_kumuh')->num_rows();
        return $result;
    }

    public function update($id = NULL)
    {
        $result = $this->db->select('kawasan__penanganan_lokasi_kumuh.id_penanganan as id_penanganan,reg_regencies.id as id_kabupaten, reg_regencies.name as kabupaten, kawasan__lokasi_kumuh.id_lokasi as id_lokasi, kawasan__lokasi_kumuh.lokasi as nama_lokasi,kawasan__lokasi_kumuh.luas as luas, kawasan__lokasi_kumuh.rt_rw as rt_rw, reg_villages.id as id_kelurahan, reg_villages.name as kelurahan, reg_districts.id as id_kecamatan, reg_districts.name as kecamatan, kawasan__lokasi_kumuh.lintang as lintang, kawasan__lokasi_kumuh.bujur as bujur, kawasan__lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,  kawasan__surat_keterangan_kumuh.id_sk as id_sk,kawasan__surat_keterangan_kumuh.sk as sk,  kawasan__lokasi_kumuh.tingkat_kumuh as tingkat_kumuh, kawasan__lokasi_kumuh.rt_rw as rt_rw,kawasan__penanganan_lokasi_kumuh.kegiatan as kegiatan,kawasan__penanganan_lokasi_kumuh.nominal as nominal,kawasan__penanganan_lokasi_kumuh.sumber_dana as sumber_dana, kawasan__penanganan_lokasi_kumuh.tahun as tahun,kawasan__penanganan_lokasi_kumuh.luas_tertangani as luas_tertangani');
        $result = $this->db->from('kawasan__penanganan_lokasi_kumuh');
        $result = $this->db->join('kawasan__lokasi_kumuh', 'kawasan__lokasi_kumuh.id_lokasi=kawasan__penanganan_lokasi_kumuh.id_lokasi', 'LEFT');
        $result = $this->db->join('kawasan__surat_keterangan_kumuh', 'kawasan__surat_keterangan_kumuh.id_sk=kawasan__lokasi_kumuh.id_sk', 'LEFT');
        $result = $this->db->join('reg_regencies', 'reg_regencies.id=kawasan__surat_keterangan_kumuh.regency_id', 'LEFT');
        // $result = $this->db->join('reg_districts', 'reg_districts.id=kawasan__lokasi_kumuh.district_id', 'LEFT');
        $result = $this->db->join('reg_villages', 'reg_villages.id=kawasan__lokasi_kumuh.village_id', 'LEFT');
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
        $this->db->update('kawasan__penanganan_lokasi_kumuh', $data);
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
        $this->db->insert('kawasan__penanganan_lokasi_kumuh', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_penanganan', $id);
        $this->db->delete('kawasan__penanganan_lokasi_kumuh');
    }
    public function delete_selected($id)
    {
        $this->db->where('id_penanganan', $id);
        $this->db->delete('kawasan__penanganan_lokasi_kumuh');
    }
}

/* End of file Model_penanganan_kumuh.php */
