<?php
class Login extends Public_Controller
{
    public $data = array(
        'halaman' => 'home',
    );

    public function index()
    {
        // Jika status login sudah benar, langsung alihkan ke halaman dashboard
        $login_status = $this->session->userdata('login_status');
        $user_level = $this->session->userdata('login_status');
        if ($login_status == true && $user_level == 'peserta') {
            redirect('dashboard');
        }

        // Validasi.
        if (! $this->login->validate('form_rules')) {
            $this->data['main_view'] = 'login_error';

            // Ambil error message sebagai array.(MY_Form_validation.php)
            $this->data['pesan_error'] = $this->form_validation->error_array();

            // $this->data['pesan_error'] = validation_errors();
            $this->load->view($this->layout, $this->data);
            return;
        }

        // Login
        $login = $this->input->post(null, true);
        if (! $this->login->login($login)) {
            $this->session->set_flashdata('pesan_error', 'Username atau Password salah. Atau akun Anda sedang diblokir.');
            redirect('login-error');
        }

        // Jika login benar, alihkan ke halaman dashboard.
        redirect('dashboard');
    }

    public function error()
    {
        $this->data['main_view'] = 'error';
        $this->data['title'] = 'Login Error';
        $this->load->view($this->layout, $this->data);
    }

    public function logout()
    {
        $this->login->logout();
        redirect(base_url());
    }
}