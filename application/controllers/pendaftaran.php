<?php
class Pendaftaran extends Public_Controller
{
    public $data = array(
        'halaman' => 'pendaftaran',
        'main_view' => 'pendaftaran_form',
        'title'  => 'Pendaftaran',
    );

    public function index()
    {
        // Hapus data session user yang sudah berhasil daftar.
        $this->pendaftaran->reset_peserta();

        // Data input dari user.
        $peserta = (object) $this->input->post(null, true);

        // Data untuk form.
        if (! $_POST) {
            $this->data['values'] = (object) $this->pendaftaran->default_values;
        } else {
            $this->data['values'] = $peserta;
        }

        // Validasi.
        if (! $this->pendaftaran->validate('form_rules')) {
            // Buat captcha baru.
            $this->data['captcha'] = $this->pendaftaran->buat_captcha();
            $this->load->view($this->layout, $this->data);
            return;
        }

        // Proses pendaftaran.
        if($this->pendaftaran->daftar($peserta)) {
            redirect('pendaftaran-sukses');
        } else {
            $this->session->set_flashdata('pesan_error', 'Maaf, pendaftaran gagal. Kami mengalami gangguan, coba ' . anchor('pendaftaran', 'ulangi', 'class="alert-link"') .' beberapa saat lagi.');
            redirect('pendaftaran-error');
        }
    }

    // Pendaftaran sukses, tampilkan info akun pendaftar.
    public function sukses()
    {
        $this->data['main_view'] = 'pendaftaran_sukses';
        $this->load->view($this->layout, $this->data);
    }

    // Jika pendaftaran error, tampilkan informasi mengenai error.
    public function error()
    {
        $this->data['main_view'] = 'error';
        $this->data['title'] = 'Pendaftaran Error';
        $this->load->view($this->layout, $this->data);
    }

    // Callback validasi captcha.
    public function _validate_captcha()
    {
        // Jika nilai captcha di session sama dengan input user, maka betul.
        if ($this->session->userdata('captcha') == $this->input->post('captcha', true)) {
            return true;
        } else {
            $this->form_validation->set_message('_validate_captcha', 'Captcha salah.');
            return false;
        }
    }
}