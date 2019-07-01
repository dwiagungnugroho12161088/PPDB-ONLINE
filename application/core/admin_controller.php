<?php
class Admin_Controller extends MY_Controller
{
    public $layout = 'admin/layout';

    public function __construct()
    {
        parent::__construct();

        session_start();

        // Cek status login user.
        $login_status = $this->session->userdata('login_status');
        $user_level = $this->session->userdata('user_level');
        $username = $this->session->userdata('username');

        // Cek status login.
        if ( ($login_status !== true) && empty($username) ) {
            redirect('admin/login');
        }

        // Pastikan hanya "administrator" yang boleh mengakses.
        if ($user_level !== 'administrator') {
            $this->session->set_flashdata('pesan_error', 'Anda tidak berhak mengakses halaman ini!');
            redirect('admin/home');
        }
    }
}