<?php
class Pengumuman extends Admin_Controller
{
    public $data = array(
        'halaman' => 'pengumuman',
        'main_view' => 'pengumuman_list',
        'title' => 'Pengumuman',
    );

    public function index($offset = 0)
    {
        $this->load->helper('text');

        $pengumuman = $this->pengumuman->sort('id', 'desc')->get_all_paged($offset);
        if ($pengumuman) {
            $this->data['pengumuman'] = $pengumuman;
            $this->data['paging'] = $this->pengumuman->paging('biasa', site_url('admin/pengumuman/halaman/'), 4);
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
            $this->data['pengumuman'] = 'Pengumuman dengan judul yang dimaksud tidak ada.'. anchor('admin/pengumuman', ' Kembali ke halaman pengumuman.', 'class="alert-link"');
        }

        $this->data['main_view'] = 'pengumuman_detail';
        $this->load->view($this->layout, $this->data);
    }

    public function tambah()
    {
        $this->data['main_view'] = 'admin/pengumuman_form';
        $this->data['form_action'] = site_url('admin/pengumuman/tambah');

        // Data untuk form.
        if (! $_POST) {
            $pengumuman = $this->pengumuman->default_value;
        } else {
            $pengumuman = $this->input->post(null, true);
        }

        // Validasi.
        if (! $this->pengumuman->validate('form_rules')) {
            $this->data['values'] = (object) $pengumuman;
            $this->load->view($this->layout, $this->data);
            return;
        }

        // Simpan ke DB.
        if ($this->pengumuman->tambah($pengumuman)) {
            $this->session->set_flashdata('pesan', 'Pengumuman berhasil disimpan. Kembali ke halaman ' . anchor('admin/pengumuman', 'pengumuman.', 'class="alert-link"'));
            redirect('admin/pengumuman/sukses');
        } else {
            $this->session->set_flashdata('pesan_error', 'Pengumuman gagal disimpan. Kembali ke halaman ' . anchor('admin/pengumuman', 'pengumuman.', 'class="alert-link"'));
            redirect('admin/pengumuman/error');
        }
    }

    public function sukses()
    {
        $this->data['main_view'] = 'sukses';
        $this->data['title'] = 'Pengumuman Sukses';
        $this->load->view($this->layout, $this->data);
    }

    public function error()
    {
        $this->data['main_view'] = 'error';
        $this->data['title'] = 'Pengumuman Error';
        $this->load->view($this->layout, $this->data);
    }

    public function edit($id = null)
    {
        // Pastikan data pengumuman ada.
        $pengumuman = $this->pengumuman->get($id);
        if (! $pengumuman) {
            $this->session->set_flashdata('pesan_error', 'Data pengumuman tidak ada. Kembali ke halaman ' . anchor('admin/pengumuman', 'pengumuman.', 'class="alert-link"'));
            redirect('admin/pengumuman/error');
        }

        // Data untuk form.
        if (!$_POST) {
            $data = $pengumuman;
        } else {
            $data = $this->input->post(null, true);
        }
        $this->data['values'] = (object) $data;

        // Validasi.
        if (! $this->pengumuman->validate('form_rules')) {
            $this->data['main_view'] = 'admin/pengumuman_form';
            $this->data['form_action'] = site_url('admin/pengumuman/edit/'.$id);
            $this->load->view($this->layout, $this->data);
            return;
        }

        // Simpan pengumuman.
        if ($this->pengumuman->edit($id, $data)) {
            $this->session->set_flashdata('pesan', 'pengumuman berhasil disimpan. Kembali ke halaman ' . anchor('admin/pengumuman', 'pengumuman.', 'class="alert-link"'));
            redirect('admin/pengumuman/sukses');
        } else {
            $this->session->set_flashdata('pesan_error', 'pengumuman berhasil disimpan. Kembali ke halaman ' . anchor('admin/pengumuman', 'pengumuman.', 'class="alert-link"'));
            redirect('admin/pengumuman/error');
        }
    }

    public function hapus($id)
    {
        if ($this->pengumuman->delete($id)) {
            $this->session->set_flashdata('pesan', 'Pengumuman berhasil dihapus. Kembali ke halaman ' . anchor('admin/pengumuman', 'pengumuman.', 'class="alert-link"'));
            redirect('admin/pengumuman/sukses');
        } else {
            $this->session->set_flashdata('pesan', 'Pengumuman gagal dihapus. Kembali ke halaman ' . anchor('admin/pengumuman', 'pengumuman.', 'class="alert-link"'));
            redirect('admin/pengumuman/error');
        }
    }
}