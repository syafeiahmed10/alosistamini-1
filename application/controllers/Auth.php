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
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

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

  private function _login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['username' => $username])->row_array();
    if ($user) {
      if ($user['is_active'] == 1) {
        if (password_verify($password, $user['password'])) {
          $data = [
            'username' => $user['username'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);

          // if ($user['role_id'] == 1) {
          //     redirect('admin');
          // } else {
          //     redirect('user');
          // }
          redirect('dashboard/index');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Wrong Password
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');

          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
           username has not been Activated
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>');

        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           username is not Registered
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>');

      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('role_id');
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        You Have Been Logged Out
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>');
    redirect('auth');
  }
}

/* End of file Auth.php */
