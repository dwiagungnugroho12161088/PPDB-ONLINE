<?php
class Pendaftaran_model extends MY_Model
{
    public $_tabel = 'tb_peserta';

    public $form_rules = array(
        array(
            'field' => 'nisn',
            'label' => 'NISN',
            'rules' => 'trim|xss_clean|required|exact_length[10]|is_unique[tb_peserta.nisn]'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|xss_clean|required|max_length[64]|is_unique[tb_peserta.email]'
        ),
        array(
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'trim|xss_clean|required|max_length[64]'
        ),
        array(
            'field' => 'nama_panggilan',
            'label' => 'Nama Panggilan',
            'rules' => 'trim|xss_clean|required|max_length[32]'
        ),
        array(
            'field' => 'captcha',
            'label' => 'Captcha',
            'rules' => 'trim|xss_clean|required|exact_length[4]|callback__validate_captcha'
        ),
    );

    public $default_values = array(
        'nisn' => '',
        'email' => '',
        'nama' => '',
        'nama_panggilan' => '',
        'captcha' => '',
    );

    public function daftar($peserta)
    {
        // Data captcha tidak perlu disimpan di DB.
        unset($peserta->captcha);

        // Generate random string username dan password untuk login user.
        $peserta->username = random_string('alnum', 8);
        $peserta->password = random_string('alnum', 8);

        // Proses insert data ke tabel tb_peserta.
        $id = $this->insert($peserta);
        if ($id) {
            $no_peserta = ($id);

            // Set data untuk ditampilkan.
            $data_session = array(
                'nomor_peserta' => $no_peserta,
                'username' => $peserta->username,
                'password' => $peserta->password,
                'email' => $peserta->email,
            );
            $this->session->set_userdata($data_session);
            return true;
        }
        return false;
    }

    public function reset_peserta()
    {
        $data_session = array(
            'nomor_peserta' => '',
            'username'  => '',
            'password'  => '',
            'email' => '',
        );
        $this->session->unset_userdata($data_session);
    }
}