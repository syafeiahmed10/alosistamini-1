<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_surat_keterangan_kumuh extends CI_Model
{
    public function get()
    {
        $result = $this->db->from('surat_keterangan_kumuh');
        $result = $this->db->join('reg_regencies', 'reg_regencies.id=surat_keterangan_kumuh.regency_id', 'LEFT');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function add()
    {
        $data = [
            'regency_id' => $this->input->post('kabupaten'),
            'sk' => $this->input->post('surat_keterangan_kumuh')
        ];
        $this->db->insert('surat_keterangan_kumuh', $data);
    }
}

/* End of file Model_surat_keterangan_kumuh.php */
