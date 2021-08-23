<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_surat_keterangan_kumuh extends CI_Model
{
    public function get_table($limit, $start)
    {
        $this->db->join('reg__regencies', 'reg__regencies.id=kawasan__surat_keterangan_kumuh.regency_id', 'LEFT');
        $this->db->join('kawasan_dropdown__status_sk', 'kawasan_dropdown__status_sk.id_ssk = kawasan__surat_keterangan_kumuh.id_ssk', 'left');
        $this->db->order_by('last_update', 'desc');
        return $this->db->get('kawasan__surat_keterangan_kumuh', $limit, $start);
    }

    public function countRow()
    {
        $this->db->join('reg__regencies', 'reg__regencies.id=kawasan__surat_keterangan_kumuh.regency_id', 'LEFT');
        return $this->db->get('kawasan__surat_keterangan_kumuh')->num_rows();
    }

    public function update($id)
    {
        $result = $this->db->from('kawasan__surat_keterangan_kumuh');
        $result = $this->db->join('reg__regencies', 'reg__regencies.id=kawasan__surat_keterangan_kumuh.regency_id', 'LEFT');
        $result = $this->db->join('kawasan_dropdown__status_sk', 'kawasan_dropdown__status_sk.id_ssk = kawasan__surat_keterangan_kumuh.id_ssk', 'left');
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
            'tahun' => $this->input->post('tahun'),
            'id_ssk' => $this->input->post('status_sk'),
            'last_update' => now()

        ];
        $this->db->update('kawasan__surat_keterangan_kumuh', $data);
    }

    public function add()
    {
        $data = [
            'regency_id' => $this->input->post('kabupaten'),
            'sk' => $this->input->post('surat_keterangan_kumuh'),
            'tahun' => $this->input->post('tahun'),
            'id_ssk' => $this->input->post('status_sk')

        ];
        $this->db->insert('kawasan__surat_keterangan_kumuh', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_sk', $id);
        $this->db->delete('kawasan__surat_keterangan_kumuh');
    }
}

/* End of file Model_surat_keterangan_kumuh.php */
