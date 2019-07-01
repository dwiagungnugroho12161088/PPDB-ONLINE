<?php
class Hasil_seleksi extends Public_Controller
{
    public $data = array(
        'halaman' => 'hasil-seleksi',
        'main_view' => 'hasil_seleksi_form',
        'title'  => 'Hasil Seleksi',
    );

    // Jika tahap PSB masih "pendaftaran", redirect ke halaman home.
    // Kalau sudah "pengumuman", tampilkan form untuk melihat hasil seleksi.
    public function __construct()
    {
        parent::__construct();
        if (config_item('ppdb_tahap_ppdb') == 'pendaftaran') {
            redirect(base_url());
        }
    }

    public function index()
    {
        // Data input dari user.
        $input = (object) $this->input->post(null, true);

        // Data untuk form.
        if (! $_POST) {
            $this->data['values'] = (object) $this->hasil_seleksi->default_values;
        } else {
            $this->data['values'] = $input;
        }

        // Validasi.
        if (! $this->hasil_seleksi->validate('form_rules')) {
            $this->data['form_action'] = 'hasil-seleksi';
            $this->load->view($this->layout, $this->data);
            return;
        }

        // Cek status kelulusan.
        $hasil = $this->hasil_seleksi->is_lulus($input);
        if(count($hasil) > 0) {
            $this->data['hasil'] = (object) $hasil;
            $this->data['main_view'] = 'hasil_seleksi';
            $this->load->view($this->layout, $this->data);
            return;
        } else {
            $this->session->set_flashdata('pesan_error', 'Informasi yang Anda masukkan salah atau sedang terjadi gangguan, coba ' . anchor('hasil-seleksi', 'ulangi', 'class="alert-link"') .' beberapa saat lagi.');
            redirect('hasil-seleksi-error');
        }
    }

    // Gagal mendapatkan data hasil seleksi, tampilkan halalman error.
    public function error()
    {
        $this->data['main_view'] = 'error';
        $this->data['title'] = 'Hasil Seleksi Error';
        $this->load->view($this->layout, $this->data);
    }
}