<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_rtlh extends CI_Model
{
    public function get_table($limit, $start)
    {
        $this->db->join('reg_villages', 'reg_villages.id=perumahan_rtlh.village_id', 'LEFT');
        return $this->db->get('perumahan_rtlh', $limit, $start);
    }

    public function countRow()
    {
        $this->db->join('reg_villages', 'reg_villages.id=perumahan_rtlh.village_id', 'LEFT');
        return $this->db->get('perumahan_rtlh')->num_rows;
    }
}

/* End of file Model_rtlh.php */
