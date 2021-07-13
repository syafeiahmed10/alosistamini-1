<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters(' <small class="text-danger pl-3">', ' </small>');
    }

    public function index()
    {
        // CEK SESSION APAKAH SESSION UDAH KE SET
        // KALAU UDAH KE SET, REDIRECT... JANGAN BOLEH MASUK KE HALAMAN AUTH
        // if ($this->session->userdata('username')) {
        //     redirect('user');
        // }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Email', 'trim|required');

        // CEK APAKAH ISIAN FORM NYA UDAH BENER
        // KALAU UDAH BENER PROSES ISIAN DENGAN PANGGIL FUNGSI LOGIN
        if ($this->form_validation->run() == TRUE) {
            $this->_login();
        } else {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        }
    }
}

/* End of file Auth.php */
