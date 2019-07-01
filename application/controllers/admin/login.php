<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Login_model', 'login');
    }

    public function index()
    {
        // Validasi.
        if (! $this->login->validate('form_rules')) {
            $data['validation_errors'] = $this->form_validation->error_array();
            $this->load->view('admin/login_form', $data);
            return;
        }

        // Login
        $login = $this->input->post(null, true);
        if (! $this->login->login($login)) {
            $this->session->set_flashdata('pesan_error', 'Username atau Password salah. Atau akun Anda sedang diblokir.');
            redirect('admin/login-error');
        }

        redirect('admin');
    }

    public function error()
    {
        $this->load->view('admin/login_form');
    }

    public function logout()
    {
        $this->login->logout();
        redirect('admin');
    }
}