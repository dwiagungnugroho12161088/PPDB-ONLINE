<?php
class Lupa_Password_model extends MY_Model
{
    protected $_tabel = 'tb_peserta';
    public $form_rules = array(
        array(
            'field' => 'no_peserta',
            'label' => 'Nomor Peserta',
            'rules' => 'trim|xss_clean|required|exact_length[2]'
        ),
        array(
            'field' => 'nisn',
            'label' => 'NISN',
            'rules' => 'trim|xss_clean|required|exact_length[10]'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|xss_clean|required|max_length[64]'
        ),
        array(
            'field' => 'captcha',
            'label' => 'Captcha',
            'rules' => 'trim|xss_clean|required|exact_length[4]|callback__validate_captcha'
        ),
    );

    public $default_values = array(
        'no_peserta' => '',
        'nisn' => '',
        'email' => '',
        'captcha' => '',
    );

    public function reset($where)
    {
        // Reset username dan password di DB berdasarkan $where.
        $data = array(
            'username' => random_string('alnum', 8),
            'password' => random_string('alnum', 8),
        );
        $reset_username_password = $this->reset_user_password($where, $data);

        // Kirim username dan password baru ke email yang terdaftar.
        $pesan = 'Username : <strong>' . $data['username'] . '</strong><br>';
        $pesan .= 'Password : <strong>' . $data['password'] . '</strong>';
        $email = array(
            'alamat_email' => $where['email'],
            'judul_email' => 'Username dan Password Baru',
            'isi_email' => $pesan,
        );
        $kirim_email = $this->kirim_email($email);

        if ($reset_username_password && $kirim_email) {
            return true;
        }

        return false;
    }

    // Reset username dan password di tb_peserta.
    protected function reset_user_password($where, $data)
    {        
        return $this->update($where, $data);
    }

    // Kirim email.
    protected function kirim_email($email)
    {
        $this->load->library('email');
        $email = (object) $email;
        $this->email->from(config_item('ppdb_email_panitia'), config_item('ppdb_email_nama'));
        $this->email->to($email->alamat_email);
        $this->email->subject($email->judul_email);
        $this->email->message($email->isi_email);
        return $this->email->send();
    }
}