<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Halaman Login';
            $this->load->view('reuse_template/auth_header', $data);
            $this->load->view('auth/view_login');
            $this->load->view('reuse_template/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->mongo_db->where(['email' => $email])->get('user');
        // var_dump($user);
        // die;
        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user[0]['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user[0]['password'])) {
                    $data = [
                        'email' => $user[0]['email'],
                        'role_id' => $user[0]['role_id']
                    ];
                    $this->session->set_userdata($data);

                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Password Anda Salah
          </div>');

                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email Belum Teraktivasi
          </div>');

                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email Belum Terdaftar
          </div>');

            redirect('auth');
        }
    }

    public function registrasi()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        // gapake is unique
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'trim|required|min_length[3]|matches[password2]',
            [
                'matches' => 'password tidak sama',
                'min_length' => 'password terlalu pendek'
            ]

        );
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');



        if ($this->form_validation->run() == FALSE) {
            # code...

            $data['title'] = 'Halaman Registrasi';
            $this->load->view('reuse_template/auth_header', $data);
            $this->load->view('auth/view_registrasi');
            $this->load->view('reuse_template/auth_footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' =>  time()

            ];

            $this->mongo_db->insert('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            User Anda Berhasil Ditambahkan, silahkan login
          </div>');

            redirect('auth');
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anda Telah Logout
          </div>');
        redirect('auth');
    }
}

/* End of file Auth.php */
