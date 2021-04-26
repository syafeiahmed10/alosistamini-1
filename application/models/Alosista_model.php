<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alosista_model extends CI_Model
{

    // ====================================================QUERY UNTUK DROPDOWN==========================================================================
    public function dropdown_kabupaten_jateng()
    {
        $this->db->where('province_id', 33);
        return $this->db->get('reg_regencies')->result_array();
    }

    public function dropdown_sk_kumuh()
    {
        return $this->get_sk_kumuh();
    }

    public function dropdown_lokasi_kumuh()
    {
        return $this->get_lokasi_kumuh();
    }


    // public function getLingkupAdministratif()
    // {
    //     $this->db->from('reg_villages');

    //     $this->db->join('reg_districts', 'reg_districts.id = reg_villages.district_id', 'left');
    //     $this->db->join('reg_regencies', 'reg_regencies.id = reg_districts.regency_id', 'left');
    //     $this->db->join('reg_provinces', 'reg_provinces.id = reg_regencies.province_id', 'left');

    //     $this->db->select('reg_villages.id as id_kelurahan, reg_villages.name as kelurahan, reg_districts.id as id_kecamatan, reg_districts.name as kecamatan, reg_regencies.id as id_kabupaten, reg_regencies.name kabupaten ');
    //     $this->db->where('reg_provinces.id', 33);

    //     return $this->db->get()->result_array();
    // }
    // ====================================================END QUERY UNTUK DROPDOWN==========================================================================


    // ========================================================QUERY TABEL================================================================================
    public function get_sk_kumuh()
    {
        return $this->db->from('surat_keterangan_kumuh')->join('reg_regencies', 'reg_regencies.id=surat_keterangan_kumuh.regency_id', 'LEFT')->get()->result_array();
    }
    public function get_lokasi_kumuh()
    {
        $this->db->select('lokasi_kumuh.id_lokasi as id_lokasi, lokasi_kumuh.lokasi as lokasi,lokasi_kumuh.luas as luas, lokasi_kumuh.lingkup_administratif as lingkup_administratif, lokasi_kumuh.lng as lng, lokasi_kumuh.lat as lat, lokasi_kumuh.tingkat_kumuh as tingkat_kumuh,  surat_keterangan_kumuh.id_sk as id_sk,surat_keterangan_kumuh.sk as sk, reg_regencies.name as kabupaten, lokasi_kumuh.tingkat_kumuh as tingkat_kumuh');
        return $this->db->from('lokasi_kumuh')->join('surat_keterangan_kumuh', 'surat_keterangan_kumuh.id_sk=lokasi_kumuh.id_sk', 'LEFT')->join('reg_regencies', 'reg_regencies.id=surat_keterangan_kumuh.regency_id', 'LEFT')->get();
    }

    public function get_penanganan_kumuh()
    {
        $this->db->from('penanganan_lokasi_kumuh as p');
        $this->db->join('lokasi_kumuh as l', 'l.id_lokasi = p.id_lokasi', 'left');
        $this->db->join('surat_keterangan_kumuh as s', 's.id_sk = l.id_sk', 'left');
        $this->db->join('reg_regencies as r', 'r.id = s.regency_id', 'left');
        $this->db->select('p.id_penanganan as id_penanganan, p.proposal as proposal, p.kegiatan as kegiatan, p.tahun as tahun_penanganan, p.sumber_dana as dana, p.luas_tertangani as luas_tertangani, l.lokasi as lokasi, l.lingkup_administratif, s.sk as sk, r.name as kabupaten, p.lng as lng, p.lat as lat');
        return $this->db->get()->result_array();
    }
    // ========================================================END QUERY TABEL=============================================================================





    // ========================================================QUERY CRUD SK=================================================================================
    public function add_sk_kumuh()
    {
        $object = [
            'regency_id' => $this->input->post('kabupaten'),
            'sk' => $this->input->post('surat_keterangan'),
            'tahun' => $this->input->post('tahun')
        ];

        $this->db->insert('surat_keterangan_kumuh', $object);
    }

    public function del_sk_kumuh($id_sk)
    {
        $this->db->where('id_sk', $id_sk)->delete('surat_keterangan_kumuh');
    }

    public function edit_sk_kumuh_get($id_sk)
    {
        return $this->db->from('surat_keterangan_kumuh')->join('reg_regencies', 'reg_regencies.id=surat_keterangan_kumuh.regency_id', 'LEFT')->where('id_sk', $id_sk)->get()->row_array();
    }
    public function edit_sk_kumuh_action($id_sk)
    {
        $this->db->where('id_sk', $id_sk);

        $object = [
            'regency_id' => $this->input->post('kabupaten'),
            'sk' => $this->input->post('surat_keterangan'),
            'tahun' => $this->input->post('tahun')
        ];
        $this->db->update('surat_keterangan_kumuh', $object);
    }

    // ======================================================== END QUERY CRUD SK=================================================================================

    // ======================================================== QUERY CRUD LOKASI=================================================================================
    public function add_lokasi_kumuh()
    {


        $object = [
            'id_sk' => $this->input->post('sk'),
            'lokasi' => $this->input->post('lokasi'),
            'luas' => (float)$this->input->post('luas'),
            'lingkup_administratif' => $this->input->post('lingkup_administratif'),
            'lng' => $this->input->post('lng'),
            'lat' => $this->input->post('lat'),
            'tingkat_kumuh' => $this->input->post('tingkat_kumuh')

        ];

        $this->db->insert('lokasi_kumuh', $object);
    }

    public function del_lokasi_kumuh($id_lokasi)
    {
        $this->db->where('id_lokasi', $id_lokasi)->delete('lokasi_kumuh');
    }

    public function edit_lokasi_kumuh_get($id_lokasi)
    {
        $this->db->where('id_lokasi', $id_lokasi);
        return $this->get_lokasi_kumuh()->row_array();
    }
    public function edit_lokasi_kumuh_action($id_lokasi)
    {
        $this->db->where('id_lokasi', $id_lokasi);

        $object = [
            'id_sk' => $this->input->post('surat_keterangan'),
            'lokasi' => $this->input->post('nama_lokasi'),
            'luas' => (float)$this->input->post('luas'),
            'lng' => $this->input->post('lng'),
            'lat' => $this->input->post('lat'),
            'lingkup_administratif' => $this->input->post('lingkup_administratif'),
            'tingkat_kumuh' => $this->input->post('tingkat_kumuh')
        ];
        $this->db->update('lokasi_kumuh', $object);
    }
    // ======================================================== END QUERY CRUD LOKASI=================================================================================

    // ========================================================QUERY CRUD PENANGANAN==================================================================================
    public function add_penanganan_kumuh()
    {


        $object = [
            'id_lokasi' => $this->input->post('lokasi'),
            'proposal' => $this->input->post('proposal'),
            'luas_tertangani' => (float)$this->input->post('luas_tertangani'),
            'kegiatan' => $this->input->post('kegiatan'),
            'tahun' => $this->input->post('tahun_penanganan'),
            'sumber_dana' => $this->input->post('sumber_dana'),
            'lng' => $this->input->post('lng'),
            'lat' => $this->input->post('lat')

        ];

        $this->db->insert('penanganan_lokasi_kumuh', $object);
    }

    public function del_penanganan_kumuh($id_penanganan)
    {
        $this->db->where('id_penanganan', $id_penanganan)->delete('penanganan_lokasi_kumuh');
    }
}

/* End of file Alosista_model.php */
