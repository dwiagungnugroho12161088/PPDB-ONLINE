<?php
class Hasil_seleksi_model extends MY_Model
{
    public $_tabel = 'tb_peserta';

    public $form_rules = array(
        array(
            'field' => 'no_peserta',
            'label' => 'Nomor Peserta',
            'rules' => 'trim|xss_clean|required|exact_length[8]'
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
    );

    public $default_values = array(
        'no_peserta' => '',
        'nisn' => '',
        'email' => '',
    );

    public function is_lulus($where)
    {
        $id = get_no_peserta_value($where->no_peserta);
        $where = array(
            'id' => $id,
            'nisn' => $where->nisn,
            'email' => $where->email,
        );

        return $this->db->select('id, nisn, nama, ska_nama, status_seleksi')
                        ->where($where)
                        ->limit(1)
                        ->get($this->_tabel)->row();
    }
}