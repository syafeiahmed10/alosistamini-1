<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_surat_keterangan_kumuh extends CI_Model
{
    public function get_table($limit, $start)
    {
        $this->db->join('reg_regencies', 'reg_regencies.id=surat_keterangan_kumuh.regency_id', 'LEFT');
        return $this->db->get('surat_keterangan_kumuh', $limit, $start);
    }

    public function countRow()
    {
        $this->db->join('reg_regencies', 'reg_regencies.id=surat_keterangan_kumuh.regency_id', 'LEFT');
        return $this->db->get('surat_keterangan_kumuh')->num_rows();
    }

    public function update($id)
    {
        $result = $this->db->from('surat_keterangan_kumuh');
        $result = $this->db->join('reg_regencies', 'reg_regencies.id=surat_keterangan_kumuh.regency_id', 'LEFT');
        $result = $this->db->where('id_sk', $id);
        $result = $this->db->get();
        return $result;
    }

    public function update_action($id)
    {
        $this->db->where('id_sk', $id);
        $data = [
            'regency_id' => $this->input->post('kabupaten'),
            'sk' => $this->input->post('surat_keterangan_kumuh'),
            'last_update' => now()

        ];
        $this->db->update('surat_keterangan_kumuh', $data);
    }

    public function add()
    {
        $data = [
            'regency_id' => $this->input->post('kabupaten'),
            'sk' => $this->input->post('surat_keterangan_kumuh'),
            'last_update' => now()
        ];
        $this->db->insert('surat_keterangan_kumuh', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_sk', $id);
        $this->db->delete('surat_keterangan_kumuh');
    }
}

/* End of file Model_surat_keterangan_kumuh.php */
