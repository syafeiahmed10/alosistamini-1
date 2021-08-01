<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_dashboard extends CI_Model
{
    public function get_sisa_kumuh()
    {
        $query = $this->db->query("SELECT name, SUM(luas) as luas, SUM(luas_tertangani) as luas_tertangani, SUM(luas)-SUM(luas_tertangani) as sisa FROM kawasan__lokasi_kumuh LEFT JOIN kawasan__surat_keterangan_kumuh ON kawasan__lokasi_kumuh.id_sk = kawasan__surat_keterangan_kumuh.id_sk LEFT JOIN reg__regencies ON reg__regencies.id = kawasan__surat_keterangan_kumuh.regency_id LEFT JOIN kawasan__penanganan_lokasi_kumuh ON kawasan__penanganan_lokasi_kumuh.id_lokasi = kawasan__lokasi_kumuh.id_lokasi GROUP BY name");
        return $query;
    }
}

/* End of file Model_dashboard.php */
