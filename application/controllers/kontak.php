<?php
class Kontak extends Public_Controller
{
    public $data = array(
        'halaman' => 'kontak',
        'main_view' => 'kontak_form',
    );

    public function index()
    {
        // Data input dari user.
        $kontak = (object) $this->input->post(null, true);

        // Data untuk form.
        if (! $_POST) {
            $this->data['values'] = (object) $this->kontak->default_values;
        } else {
            $this->data['values'] = $kontak;
        }

        // Validasi.
        if (! $this->kontak->validate('form_rules')) {
            // Buat captcha baru.
            $this->data['captcha'] = $this->kontak->buat_captcha();
            $this->data['form_action'] = site_url('kontak');
            $this->load->view($this->layout, $this->data);
            return;
        }

        // Proses kontak.
        if($this->kontak->simpan($kontak)) {
            $this->session->set_flashdata('pesan', 'Pesan berhasil dikirim. Balasan akan dikirim ke email Anda.'.anchor(base_url(), ' Kembali ke halaman home.', 'class="alert-link"'));
            redirect('kontak-sukses');
        } else {
            $this->session->set_flashdata('pesan_error', 'Maaf, pengiriman pesan gagal. Kami mengalami gangguan, coba ' . anchor('kontak', 'ulangi', 'class="alert-link"') .' beberapa saat lagi.');
            redirect('kontak-error');
        }
    }

    public function sukses()
    {
        $this->data['main_view'] = 'sukses';
        $this->data['title'] = 'Kontak';
        $this->load->view($this->layout, $this->data);
    }

    public function error()
    {
        $this->data['main_view'] = 'error';
        $this->data['title'] = 'Kontak Error';
        $this->load->view($this->layout, $this->data);
    }

    // Callback validasi captcha.
    public function _validate_captcha() {
        if ($this->session->userdata('captcha') == $this->input->post('captcha', true)) {
            return true;
        } else {
            $this->form_validation->set_message('_validate_captcha', 'Captcha salah.');
            return false;
        }
    }
}