<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_for_all extends CI_Model
{
    public function get_kabupaten()
    {
        $result = $this->db->where('province_id', 33);
        $result = $this->db->get('reg_regencies');
        return $result->result_array();
    }
}

/* End of file Model_for_all.php */
