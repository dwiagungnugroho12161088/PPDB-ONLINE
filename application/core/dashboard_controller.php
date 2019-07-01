<?php
class Dashboard_Controller extends MY_Controller
{
    public $layout = 'layout';

    public function __construct()
    {
        parent::__construct();

        session_start();

        // Cek status login user.
        $login_status = $this->session->userdata('login_status');
        $user_level = $this->session->userdata('user_level');
        if (($login_status !== true) && ($user_level !== 'peserta'))
        {
            redirect(base_url());
        }
    }
}