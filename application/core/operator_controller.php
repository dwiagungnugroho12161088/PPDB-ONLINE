<?php
class Operator_Controller extends MY_Controller
{
    // Layout untuk "Operator"
    public $layout = 'admin/layout';

    public function __construct()
    {
        parent::__construct();

        session_start();

        // Cek status login user.
        $username = $this->session->userdata('username');
        $user_level = $this->session->userdata('user_level');
        $login_status = $this->session->userdata('login_status');

        if ( ($login_status !== true) && empty($username) && ( ($user_level !== 'operator') || ($user_level !== 'administrator') ) ) {
            redirect('admin/login');
        }
    }
}