<?php
class Login_model extends MY_Model
{
    protected $_tabel = 'tb_user';

    public $form_rules = array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'trim|xss_clean|required'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|xss_clean|required'
        ),
    );

    public function login($login)
    {
        $login = (object)$login;
        $login->password = md5($login->password);

        $where = array(
            'username' => $login->username,
            'password' => $login->password,
            // Yang diblokir tidak boleh login.
            'is_blokir' => '0',
        );

        // User ada / cocok?
        if ($user = $this->get($where)) {
            // Buat data session
            $data = array(
                'username' => $user->username,
                'user_level' => $user->level,
                'login_status' => true,
                'user_id' => $user->id,
            );
            $this->session->set_userdata($data);

            // Return login status, sukses.
            return true;
        }
        // Return false jika gagal.
        return false;
    }

    public function logout()
    {
        $this->session->unset_userdata(
            array('username' => '', 'login_status' => false, 'user_level' => '')
        );
        $this->session->sess_destroy();
    }
}