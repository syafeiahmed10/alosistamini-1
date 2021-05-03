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
        $data['title'] = 'Login Page';
        $this->load->view('template/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('template/auth_footer');
    }

    public function registration()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Registration Page';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('template/auth_footer');
        } else {
            echo 'data berhasil ditambahkan';
        }
    }
}

/* End of file Auth.php */
