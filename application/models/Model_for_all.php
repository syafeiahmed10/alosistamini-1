<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_for_all extends CI_Model
{
    public function get_kabupaten_jateng()
    {
        $result = $this->db->where('province_id', 33);
        $result = $this->db->get('reg__regencies');
        return $result;
    }

    public function get_surat_keterangan_kumuh()
    {
        $result = $this->db->from('kawasan__surat_keterangan_kumuh');
        $result = $this->db->join('reg__regencies', 'reg__regencies.id=kawasan__surat_keterangan_kumuh.regency_id', 'LEFT');
        $result = $this->db->get();
        return $result;
    }

    public function get_kecamatan($id)
    {
        $result = $this->db->from('reg__districts');
        $result = $this->db->where('regency_id', $id);
        $result = $this->db->get();
        return $result;
    }

    public function get_status_sk()
    {
        $result = $this->db->get('kawasan_dropdown__status_sk');
        return $result;
    }

    public function dropdown_kelurahan($id)
    {
        $result = $this->db->from('reg__villages');
        $result = $this->db->where('district_id', $id);
        $result = $this->db->get();
        return $result;
    }

    public function dropdown_lokasi_kumuh()
    {
        $result = $this->db->from('kawasan__lokasi_kumuh');
        $result = $this->db->join('kawasan__surat_keterangan_kumuh', 'kawasan__surat_keterangan_kumuh.id_sk=kawasan__lokasi_kumuh.id_sk', 'LEFT');
        $result = $this->db->get();
        return $result;
    }
}

/* End of file Model_for_all.php */
