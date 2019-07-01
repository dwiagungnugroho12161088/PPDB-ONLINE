<?php
class Kontak extends Operator_Controller
{
    public $data = array(
        'halaman' => 'kontak',
        'main_view' => 'admin/kontak_list',
        'title' => 'Data Kontak',
    );

    public function index($offset = 0)
    {
        $kontak = $this->kontak->get_all_paged(array('is_dibalas' => '0'), $offset);
        if ($kontak) {
            $this->data['kontak'] = $kontak;
            $this->data['paging'] = $this->kontak->paging('biasa', site_url('admin/kontak/halaman/'), 4);
        } else {
            $this->data['kontak'] = 'Tidak ada data kontak.';
        }
        $this->load->view($this->layout, $this->data);
    }
    
	public function sukses()
	{
	 $this->data['main_view'] = 'sukses';
	 $this->data['title'] = 'Data Kontak';
	 $this->load->view($this->layout, $this->data);
	}

    public function error()
    {
        $this->data['main_view'] = 'error';
        $this->data['title'] = 'Data Kontak';
        $this->load->view($this->layout, $this->data);
    }

    public function balas($id)
    {
        // Pastikan data kontak ada.
        if (! $this->kontak->get($id)) {
            $this->session->set_flashdata('pesan_error', 'Data kontak tidak ada. Kembali ke halaman ' . anchor('admin/kontak', 'kontak.', 'class="alert-link"'));
            redirect('admin/kontak/error');
        }
        
        // Data untuk form.
        if (!$_POST) {
            $kontak = $this->kontak->get($id);
            $this->data['values'] = (object)$kontak;
        } else {
            $kontak = $this->input->post(null, true);
            $this->data['values'] = (object)$kontak;
        }

        // Validasi.
        if (! $this->kontak->validate('form_rules_admin')) {
            $this->data['main_view'] = 'admin/kontak_balas_form';
            $this->load->view($this->layout, $this->data);
            return;
        }

        // Proses balas.
        if ($this->kontak->balas($kontak)) {
            $this->session->set_flashdata('pesan', 'Pesan berhasil dibalas. Kembali ke halaman '. anchor('admin/kontak', 'kontak.', 'class="alert-link"'));
            redirect('admin/kontak/sukses');
        } else {
            $this->session->set_flashdata('pesan_error', 'Pesan gagal dibalas. Kembali ke halaman '. anchor('admin/kontak', 'kontak.', 'class="alert-link"'));
            redirect('admin/kontak/error');
        }
    }
}