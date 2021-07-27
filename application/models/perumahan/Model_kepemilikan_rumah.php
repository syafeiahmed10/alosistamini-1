<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_kepemilikan_rumah extends CI_Model
{
    public function get_table($limit, $start)
    {
        $this->db->select('id_kepemilikan, village_id,jumlah_kk, rumah_milik_sendiri, rumah_sewa,rumah_bebas_sewa, rumah_dinas, rumah_lainnya, rumah_tapak, rumah_susun, tahun,keterangan, last_update');
        $this->db->select('reg__regencies.name as kabupaten');
        $this->db->select('reg__districts.name as kecamatan');


        $this->db->join('reg__villages', 'reg__villages.id=perumahan__kepemilikan_rumah.village_id', 'LEFT');
        $this->db->join('reg__districts', 'reg__districts.id = reg__villages.district_id', 'left');
        $this->db->join('reg__regencies', 'reg__regencies.id = reg__districts.regency_id', 'left');
        return $this->db->get('perumahan__kepemilikan_rumah', $limit, $start);
    }

    public function countRow()
    {

        return $this->db->get('perumahan__kepemilikan_rumah')->num_rows();;
    }
}

/* End of file Model_kepemilikan_rumah.php */
