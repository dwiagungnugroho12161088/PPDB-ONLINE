<?php
class Peserta extends Operator_Controller
{
    public $data = array(
        'halaman' => 'peserta',
        'main_view' => 'admin/peserta_list',
        'title' => 'Data Peserta',
    );

    public function index($offset = 0)
    {
        $peserta = $this->peserta->get_all_paged($offset);
        if ($peserta) {
            $this->data['peserta'] = $peserta;
            $this->data['paging'] = $this->peserta->paging('biasa', site_url('admin/peserta/halaman/'), 4);
        } else {
            $this->data['peserta'] = 'Tidak ada data peserta.';
        }
        $this->load->view($this->layout, $this->data);
    }

    public function cari($offset = 0)
    {
        $peserta = $this->peserta->cari($offset);
        if ($peserta) {
            $this->data['peserta'] = $peserta;
            $this->data['paging'] = $this->peserta->paging('pencarian', site_url('admin/peserta/cari/'), 4);
        } else {
            $this->data['peserta'] = 'Data tidak ditemukan.'. anchor('admin/peserta', ' Tampilkan semua peserta.', 'class="alert-link"');
        }
        $this->load->view($this->layout, $this->data);
    }

    public function cetak($id)
    {
        // Pastikan data peserta ada.
        $peserta = $this->peserta->get($id);
        if (! $peserta) {
            $this->session->set_flashdata('pesan_error', 'Data peserta tidak ada. Kembali ke halaman ' . anchor('admin/peserta', 'peserta.', 'class="alert-link"'));
            redirect('admin/peserta/error');
        }
        $data['peserta'] = $peserta;

        // Template untuk PDF, return view sbg string
        $html = $this->load->view('dashboard/biodata_pdf', $data, true);
        // Nomor perserta (untuk nama file)
        $no_peserta = ($id);

       $paper_size  = 'A4'; // ukuran kertas
         $orientation = 'landscape'; //tipe format kertas potrait atau landscape
         $html = $this->output->get_output();

         $this->dompdf->set_paper($paper_size, $orientation);
         //Convert to PDF
         $this->dompdf->load_html($html);
         $this->dompdf->render();
         $this->dompdf->stream("laporan_data_anggota.pdf", array('Attachment'=>0));
         // nama file pdf yang di hasilkan
    
    }

    public function sukses()
    {
        $this->data['main_view'] = 'sukses';
        $this->data['title'] = 'Data Peserta';
        $this->load->view($this->layout, $this->data);
    }

    public function error()
    {
        $this->data['main_view'] = 'error';
        $this->data['title'] = 'Data Peserta';
        $this->load->view($this->layout, $this->data);
    }

    public function hapus($id)
    {
        // Pastikan hanya admin yang bisa menghapus data kontak.
        if ($this->session->userdata('user_level') != 'administrator') {
            $this->session->set_flashdata('pesan_error', 'Anda tidak berhak menghapus data peserta. Kembali ke halaman ' . anchor('admin/peserta', 'peserta.', 'class="alert-link"'));
            redirect('admin/peserta/error');
        }

        // Pastikan data peserta ada.
        if (! $this->peserta->get($id)) {
            $this->session->set_flashdata('pesan_error', 'Data peserta tidak ada. Kembali ke halaman ' . anchor('admin/peserta', 'peserta.', 'class="alert-link"'));
            redirect('admin/peserta/error');
        }

        // Hapus
        if ($this->peserta->delete($id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus. Kembali ke halaman '. anchor('admin/peserta', 'peserta.', 'class="alert-link"'));
            redirect('admin/peserta/sukses');
        } else {
            $this->session->set_flashdata('pesan_error', 'Data gagal dihapus. Kembali ke halaman '. anchor('admin/peserta', 'peserta.', 'class="alert-link"'));
            redirect('admin/peserta/error');
        }
    }

    // Ubah status verifikasi
    public function ubah_status_verifikasi($id)
    {
        // Pastikan data peserta ada.
        $peserta = $this->peserta->get($id);
        if (! $peserta) {
            $this->session->set_flashdata('pesan_error', 'Data peserta tidak ada. Kembali ke halaman ' . anchor('admin/peserta', 'peserta.', 'class="alert-link"'));
            redirect('admin/peserta/error');
        }

        // Ubah status verifikasi
        if ($this->peserta->ubah_status_verifikasi($id, $peserta->status_verifikasi)) {
            $this->session->set_flashdata('pesan', 'Status verifikasi berhasil diubah. Kembali ke halaman ' . anchor('admin/peserta', 'peserta.', 'class="alert-link"'));
            redirect('admin/peserta/sukses');
        } else {
            $this->session->set_flashdata('pesan', 'Status verifikasi gagal diubah. Kembali ke halaman ' . anchor('admin/peserta', 'peserta.', 'class="alert-link"'));
            redirect('admin/peserta/error');
        }
    }

    // Ubah status verifikasi
    public function ubah_status_seleksi($id)
    {
        // Pastikan data peserta ada.
        $peserta = $this->peserta->get($id);
        if (! $peserta) {
            $this->session->set_flashdata('pesan_error', 'Data peserta tidak ada. Kembali ke halaman ' . anchor('admin/peserta', 'peserta.', 'class="alert-link"'));
            redirect('admin/peserta/error');
        }

        // Pastikan data sudah diverifikasi.
        if (! $peserta->status_verifikasi) {
            $this->session->set_flashdata('pesan_error', 'Data siswa <strong>belum diverifikasi</strong>. Untuk menentukan hasil-seleksi, data siswa harus diverifikasi dahulu. Kembali ke halaman ' . anchor('admin/peserta', 'peserta.', 'class="alert-link"'));
            redirect('admin/peserta/error');
        }

        // Ubah status seleksi
        if ($this->peserta->ubah_status_seleksi($id, $peserta->status_seleksi)) {
            $this->session->set_flashdata('pesan', 'Status seleksi berhasil diubah. Kembali ke halaman ' . anchor('admin/peserta', 'peserta.', 'class="alert-link"'));
            redirect('admin/peserta/sukses');
        } else {
            $this->session->set_flashdata('pesan', 'Status seleksi gagal diubah. Kembali ke halaman ' . anchor('admin/peserta', 'peserta.', 'class="alert-link"'));
            redirect('admin/peserta');
        }
    }

    // Ubah status verifikasi
    public function ubah_status_pendaftaran($id)
    {
        // Pastikan data peserta ada.
        $peserta = $this->peserta->get($id);
        if (! $peserta) {
            $this->session->set_flashdata('pesan_error', 'Data peserta tidak ada. Kembali ke halaman ' . anchor('admin/peserta', 'peserta.', 'class="alert-link"'));
            redirect('admin/peserta/error');
        }

        // Ubah status verifikasi
        if ($this->peserta->ubah_status_pendaftaran($id, $peserta->status_pendaftaran)) {
            $this->session->set_flashdata('pesan', 'Status pendaftaran berhasil diubah. Kembali ke halaman ' . anchor('admin/peserta', 'peserta.', 'class="alert-link"'));
            redirect('admin/peserta/sukses');
        } else {
            $this->session->set_flashdata('pesan', 'Status pendaftaran gagal diubah. Kembali ke halaman ' . anchor('admin/peserta', 'peserta.', 'class="alert-link"'));
            redirect('admin/peserta/error');
        }
    }
}