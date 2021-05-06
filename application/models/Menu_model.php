<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $this->db->select('user_sub_menu.*,user_menu.menu');
        $this->db->from('user_sub_menu');
        $this->db->join('user_menu', 'user_sub_menu.menu_id = user_menu.id');
        return $this->db->get()->result_array();
    }
}

/* End of file Menu_model.php */
