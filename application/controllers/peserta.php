<?php
class Peserta extends Public_Controller
{
    public $data = array(
        'halaman' => 'peserta',
        'main_view' => 'peserta_list',
    );

	public function index($offset = null)
	{ 
        $peserta = $this->peserta->get_all_paged($offset);
        if ($peserta) {
            $this->data['peserta'] = $peserta;
            $this->data['paging'] = $this->peserta->paging('biasa', site_url('peserta/halaman/'), 3);
        } else {
            $this->data['peserta'] = 'Tidak ada data peserta.';
        }
        $this->data['form_action'] = site_url('peserta/cari');
        $this->load->view($this->layout, $this->data);
	}

    public function cari($offset = 0)
    {
        $peserta = $this->peserta->cari($offset);
        if ($peserta) {
            $this->data['peserta'] = $peserta;
            $this->data['paging'] = $this->peserta->paging('pencarian', site_url('peserta/cari/'), 3);
        } else {
            $this->data['peserta'] = 'Data tidak ditemukan.'. anchor('peserta', ' Tampilkan semua peserta.', 'class="alert-link"');
        }
        $this->data['form_action'] = site_url('peserta/cari');
        $this->load->view($this->layout, $this->data);
    }    
}