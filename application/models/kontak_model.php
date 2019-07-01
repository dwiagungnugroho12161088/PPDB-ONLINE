<?php
class Kontak_model extends MY_Model
{
    public $_per_page = 2;

    public $form_rules = array(
        array(
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'trim|xss_clean|required|max_length[64]'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|xss_clean|required|max_length[64]|valid_email'
        ),
        array(
            'field' => 'judul',
            'label' => 'Judul',
            'rules' => 'trim|xss_clean|required|max_length[128]'
        ),
        array(
            'field' => 'isi',
            'label' => 'Isi Pesan',
            'rules' => 'trim|xss_clean|required'
        ),
        array(
            'field' => 'captcha',
            'label' => 'Captcha',
            'rules' => 'trim|xss_clean|required|exact_length[4]|callback__validate_captcha'
        ),
    );

    public $form_rules_admin = array(
        array(
            'field' => 'judul',
            'label' => 'Judul',
            'rules' => 'trim|xss_clean|required|max_length[128]'
        ),
        array(
            'field' => 'isi',
            'label' => 'Isi Pesan',
            'rules' => 'trim|xss_clean|required'
        ),
    );

    public $default_values = array(
        'nama' => '',
        'email' => '',
        'judul' => '',
        'isi' => '',
        'captcha' => '',
    );

    public function simpan($kontak)
    {
        $kontak = (object) $kontak;

        // Data capthcha tidak perlu disimpan di DB.
        unset($kontak->captcha);

        return $this->insert($kontak);
    }

    // Balas pesan ke email
    public function balas($kontak)
    {
        $kontak = (object) $kontak;
        $email = array(
            'alamat_email' => $kontak->email,
            'judul_email' => $kontak->isi,
            'isi_email' => $kontak->pesan,
        );

        // Balas pesan ke email dan update "is_dibalas"
        if ($this->kirim_email($email) && $this->update($kontak->id, array('is_dibalas' => '1'))) {
            return true;
        }
        return false;
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

    // Ambil jumlah seluruh record get_all.
    // Overloading MY_model, karena untuk kontak hanya tampilkan yang statusnya is_dibalas = 0
    public function get_all_num_rows()
    {
        return $this->db->where('is_dibalas', '0')->get($this->_tabel)->num_rows();
    }
}