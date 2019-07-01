<?php
class Login_model extends MY_Model
{
    public $_tabel = 'tb_peserta';

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
        $login = (object) $login;

        // Cari data peserta di DB.
        $where = array(
            'username' => $login->username,
            'password' => $login->password,
            // Hanya yang status pendaftaran masih aktif yang boleh login
            'status_pendaftaran' => '1',
        );
        $peserta = $this->get($where);

        if ($peserta) {
            // Buat data session jika login benar.
            $data_session = array(
                'nama_panggilan' => $peserta->nama_panggilan,
                'no_peserta' => $peserta->id,
                'login_status' => true,
                'user_level' => 'peserta',
            );
            $this->session->set_userdata($data_session);

            // Return true jika login sukses.
            return true;
        }

        // Return false jika login salah.
        return false;
    }

    public function logout()
    {
        $this->session->unset_userdata(
            array(
                'nama_panggilan' => '',
                'no_peserta' => '',
                'login_status' => false,
                'user_level' => ''
            )
        );
        $this->session->sess_destroy();
    }
}