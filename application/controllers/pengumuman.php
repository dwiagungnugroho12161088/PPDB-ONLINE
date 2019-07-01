<?php 
class Pengumuman extends Public_Controller
{
    public $data = array(
        'halaman' => 'pengumuman',
        'main_view' => 'pengumuman_list',
        'title' => 'Pengumuman',
    );

    public function index($offset = 0)
    {
        // Untuk fungsi word_limiter().
        $this->load->helper('text');

        $pengumuman = $this->pengumuman->sort('id', 'desc')->get_all_paged($offset);
        if ($pengumuman) {
            $this->data['pengumuman'] = $pengumuman;
            $this->data['paging'] = $this->pengumuman->paging('biasa', site_url('pengumuman/halaman/'), 3);
        } else {
            $this->data['pengumuman'] = 'Tidak ada data pengumuman.';
        }
        $this->load->view($this->layout, $this->data);
    }

    public function detail($slug = '')
    {
        $pengumuman = $this->pengumuman->get('slug', $slug);
        if ($pengumuman) {
            $this->data['pengumuman'] = $pengumuman;
        } else {
            $this->data['pengumuman'] = 'Pengumuman dengan judul yang dimaksud tidak ada.'. anchor('pengumuman', ' Kembali ke halaman pengumuman.', 'class="alert-link"');
        }
        $this->data['main_view'] = 'pengumuman_detail';
        $this->load->view($this->layout, $this->data);
    }
}