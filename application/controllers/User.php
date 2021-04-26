<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {


        $data['user'] = $this->mongo_db->where([
            'email' =>
            $this->session->userdata('email')
        ])->get('user')[0];


        echo "Selamat Datang " . $data['user']['email'];
    }
}

/* End of file User.php */
