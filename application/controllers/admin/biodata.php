<?php
class Biodata extends Admin_Controller
{
    public $data = array(
        'halaman' => 'peserta',
        'main_view' => 'dashboard/biodata_form'
    );

    public function edit($id)
    {
        // Pastikan data biodata ada.
        if (! $this->biodata->get($id)) {
            $this->session->set_flashdata('pesan_error', 'Data peserta tidak ada. Kembali ke halaman ' . anchor('admin/peserta', 'peserta.', 'class="alert-link"'));
            redirect('admin/biodata/error');
        }

        // Data untuk form.
        if (!$_POST) {    
            $biodata = $this->biodata->get($id);
            $this->data['values'] = (object) $biodata;
        } else {
            $biodata = $this->input->post(null, true);
            $this->data['values'] = (object) $biodata;
        }

        // Validasi.
        if (! $this->biodata->validate('form_rules')) {
            $this->data['main_view'] = 'dashboard/biodata_form';
            $this->data['form_action'] = site_url('admin/biodata/edit/'.$id);
            $this->load->view($this->layout, $this->data);
            return;
        }

        // Simpan biodata.
        if ($this->biodata->simpan($biodata)) {
            $this->session->set_flashdata('pesan', 'Biodata berhasil disimpan. Kembali ke halaman ' . anchor('admin/peserta', 'peserta.', 'class="alert-link"'));
            redirect('admin/biodata/sukses');
        } else {
            $this->session->set_flashdata('pesan_error', 'Biodata berhasil disimpan. Kembali ke halaman ' . anchor('admin/peserta', 'peserta.', 'class="alert-link"'));
            redirect('admin/biodata/error');
        }
    }

    public function sukses()
    {
        $this->data['main_view'] = 'sukses';
        $this->data['title'] = 'Biodata Sukses';
        $this->load->view($this->layout, $this->data);
    }

    public function error()
    {
        $this->data['main_view'] = 'error';
        $this->data['title'] = 'Biodata Error';
        $this->load->view($this->layout, $this->data);
    }


    // Agama
    public function _cek_agama()
    {
        $agama = $this->input->post('agama');
        if (($agama != '') || (! empty($agama))) {
            return true;
        } else {
            $this->form_validation->set_message('_cek_agama', "Agama harus diisi.");
            return false;
        }
    }

    // Kalau agama = "0" (lainnya), keterangan agama harus diisi
    public function _cek_ket_agama()
    {
        $agama = $this->input->post('agama');
        $ket_agama = $this->input->post('ket_agama');

        // Apakah agama diplih (bukan "lainnnya")
        if ($agama != '0') {
            // Kalau agama dipilih, maka keterangan agama harus dikosongkan
            if (! empty($ket_agama)) {
                $this->form_validation->set_message('_cek_ket_agama', "Karena agama sudah dipilih, maka kolom keterangan agama harus dikosongkan.");
                return false;
            } else {
                return true;
            }
        } else {
            if (empty($ket_agama)) {
                $this->form_validation->set_message('_cek_ket_agama', "Karena agama adalah 'lainnya', maka kolom keterangan agama harus diisi.");
                return false;
            } else {
                return true;
            }
        }
    }

    // Cek format tanggal ( dd-mm-yyy )
    public function _format_tanggal($str)
    {
        if (!preg_match('/(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-([0-9]{4})/', $str)) {
            $this->form_validation->set_message('_format_tanggal', 'Format tanggal tidak valid. (dd-mm-yyyy)');
            return false;
        } else {
            return true;
        }
    }

    // Pekerjaan Ayah
    public function _ort_pekerjaan_ayah()
    {
        $kerja_ayah = $this->input->post('ort_pekerjaan_ayah');
        if ($kerja_ayah != '') {
            return true;
        } else {
            $this->form_validation->set_message('_ort_pekerjaan_ayah', "Pekerjaan Ayah harus diisi.");
            return false;
        }
    }

    // Kalau pekerjaan ayah = "0" (lainnya), keterangan kerja ayah harus diisi
    public function _ort_ket_pekerjaan_ayah()
    {
        $kerja_ayah = $this->input->post('ort_pekerjaan_ayah');
        $ket_kerja_ayah = $this->input->post('ort_ket_pekerjaan_ayah');
        if ($kerja_ayah != '0') {
            // Kalau pekerjaan ayah dipilih, maka keterangan pekerjaan ayah harus dikosongkan
            if (! empty($ket_kerja_ayah)) {
                $this->form_validation->set_message('_ort_ket_pekerjaan_ayah', "Karena pekerjaan ayah sudah dipilih, maka kolom keterangan pekerjaan ayah harus dikosongkan.");
                return false;
            } else {
                return true;
            }
        } else {
            if (empty($ket_kerja_ayah)) {
                $this->form_validation->set_message('_ort_ket_pekerjaan_ayah', "Karena pekerjaan ayah adalah 'lainnya', maka kolom keterangan pekerjaan ayah harus diisi.");
                return false;
            } else {
                return true;
            }
        }
    }

    // Pekerjaan Ibu
    public function _ort_pekerjaan_ibu()
    {
        $kerja_ibu = $this->input->post('ort_pekerjaan_ibu');
        if ($kerja_ibu != '') {
            return true;
        } else {
            $this->form_validation->set_message('_ort_pekerjaan_ibu', "Pekerjaan ibu harus diisi.");
            return false;
        }
    }

    // Kalau pekerjaan ibu = "lainnya", keterangan kerja ibu harus diisi
    public function _ort_ket_pekerjaan_ibu()
    {
        $kerja_ibu = $this->input->post('ort_pekerjaan_ibu');
        $ket_kerja_ibu = $this->input->post('ort_ket_pekerjaan_ibu');
        if ($kerja_ibu != '0') {
            // Kalau pekerjaan ayah dipilih, maka keterangan pekerjaan ayah harus dikosongkan
            if (! empty($ket_kerja_ibu)) {
                $this->form_validation->set_message('_ort_ket_pekerjaan_ibu', "Karena pekerjaan ibu sudah dipilih, maka kolom keterangan pekerjaan ibu harus dikosongkan.");
                return false;
            } else {
                return true;
            }
        } else {
            if (empty($ket_kerja_ibu)) {
                $this->form_validation->set_message('_ort_ket_pekerjaan_ibu', "Karena kerja ibu adalah 'lainnya', maka kolom keterangan kerja ibu harus diisi.");
                return false;
            } else {
                return true;
            }
        }
    }

    // Tinggal dengan
    public function _tmp_tinggal_dengan()
    {
        $tinggal = $this->input->post('tmp_tinggal_dengan');
        if ($tinggal != '') {
            return true;
        } else {
            $this->form_validation->set_message('_tmp_tinggal_dengan', "Tinggal dengan harus diisi.");
            return false;
        }
    }

    // Kalau tinggal dengan = 'lainnya', field keterangan tinggal harus diisi
    public function _tmp_ket_tinggal_dengan()
    {
        $tinggal_dengan = $this->input->post('tmp_tinggal_dengan');
        $ket_tinggal_dengan = $this->input->post('tmp_ket_tinggal_dengan');

        if ($tinggal_dengan != '0') {
            // Kalau tinggal dengan dipilih, maka keterangan tinggal dengan harus dikosongkan
            if (! empty($ket_tinggal_dengan)) {
                $this->form_validation->set_message('_tmp_ket_tinggal_dengan', "Karena tinggal dengan sudah dipilih, maka kolom keterangan tinggal dengan harus dikosongkan.");
                return false;
            } else {
                return true;
            }
        } else {
            if (empty($ket_tinggal_dengan)) {
                $this->form_validation->set_message('_tmp_ket_tinggal_dengan', "Karena tinggal dengan adalah 'lainnya', maka kolom keterangan tinggal dengan harus diisi.");
                return false;
            } else {
                return true;
            }
        }
    }

    // Kendaraan
    public function _tmp_kendaraan()
    {
        $kendaraan = $this->input->post('tmp_kendaraan');
        if ($kendaraan != '') {
            return true;
        } else {
            $this->form_validation->set_message('_tmp_kendaraan', "Kendaraan harus diisi.");
            return false;
        }
    }
}