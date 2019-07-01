<?php
class Peserta_model extends MY_Model
{
    protected $_per_page = 2;

    public function cari($offset)
    {
        $this->get_real_offset($offset);
        $kata_kunci = $this->input->get('kata_kunci', true);
        $id = get_no_peserta_value($kata_kunci);

        return $this->db->where("(id = '$id' OR nisn LIKE '%$kata_kunci%' OR nama LIKE '%$kata_kunci%')")
                        ->limit($this->_per_page, $this->_offset)
                        ->order_by('id', 'ASC')
                        ->get($this->_tabel)
                        ->result();
    }

    public function cari_num_rows()
    {
        $kata_kunci = $this->input->get('kata_kunci', true);
        $id = get_no_peserta_value($kata_kunci);

        return $this->db->where("(id = '$id' OR nisn LIKE '%$kata_kunci%' OR nama LIKE '%$kata_kunci%')")
                        ->order_by('id', 'ASC')
                        ->get($this->_tabel)
                        ->num_rows();
    }

    public function ubah_status_verifikasi($id, $status)
    {
        if ($status == '0') {
            $this->db->set('status_verifikasi', '1');
        } else {
            $this->db->set('status_verifikasi', '0');
        }
        $this->db->where('id', $id);
        return $this->db->update($this->_tabel);
    }

    public function ubah_status_seleksi($id, $status)
    {
        if ($status == '0') {
            $this->db->set('status_seleksi', '1');
        } else {
            $this->db->set('status_seleksi', '0');
        }
        $this->db->where('id', $id);
        return $this->db->update($this->_tabel);
    }

    public function ubah_status_pendaftaran($id, $status)
    {
        if ($status == '0') {
            $this->db->set('status_pendaftaran', '1');
        } else {
            $this->db->set('status_pendaftaran', '0');
        }
        $this->db->where('id', $id);
        return $this->db->update($this->_tabel);
    }
}