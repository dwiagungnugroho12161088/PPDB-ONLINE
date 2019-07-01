<?php
class Pengumuman_model extends MY_Model
{
    protected $_per_page = 2;

    protected $form_rules = array(
        array(
            'field' => 'judul',
            'label' => 'Judul',
            'rules' => 'trim|xss_clean|required|max_length[64]'
        ),
        array(
            'field' => 'isi',
            'label' => 'Isi',
            'rules' => 'trim|xss_clean|required'
        ),
    );

    public $default_value = array(
        'judul' => '',
        'isi' => '',
    );

    public function tambah($pengumuman)
    {
        $pengumuman = (object) $pengumuman;        
		$pengumuman->slug = url_title($pengumuman->judul, '-', TRUE);
        return $this->insert($pengumuman);
    }

    public function edit($id, $pengumuman)
    {
        $pengumuman = (object) $pengumuman;        
		$pengumuman->slug = url_title($pengumuman->judul, '-', TRUE);
        return $this->update($id, $pengumuman);
    }
}