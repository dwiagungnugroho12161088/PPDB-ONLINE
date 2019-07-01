<?php
class Biodata_model extends MY_Model
{
    protected $_tabel = 'tb_peserta';

    public $form_rules = array(
        // Data Pribadi ----------------------------------------------------
        array(
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'trim|xss_clean|required|max_length[64]'
        ),
        array(
            'field' => 'jenis_kelamin',
            'label' => 'Jenis Kelamin',
            'rules' => 'trim|xss_clean|required'
        ),
        array(
            'field' => 'agama',
            'label' => 'Agama',
            'rules' => 'trim|xss_clean|required|callback__cek_agama'
        ),
        array(
            'field' => 'tempat_lahir',
            'label' => 'Tempat Lahir',
            'rules' => 'trim|xss_clean|required|max_length[32]'
        ),
        array(
            'field' => 'tanggal_lahir',
            'label' => 'Tanggal Lahir',
            'rules' => 'trim|xss_clean|required|max_length[10]|callback__format_tanggal'
        ),
        // Tempat tinggal -------------------------------------------------------
        array(
            'field' => 'tmp_alamat',
            'label' => 'Alamat Tinggal',
            'rules' => 'trim|xss_clean|required|max_length[255]'
        ),

        // Orang tua -------------------------------------------------------
        array(
            'field' => 'ort_nama_ayah',
            'label' => 'Nama Ayah',
            'rules' => 'trim|xss_clean|required|max_length[64]'
        ),
        array(
            'field' => 'ort_alamat',
            'label' => 'Alamat Orang Tua',
            'rules' => 'trim|xss_clean|required|max_length[255]'
        ),
        // Sekolah Asal -------------------------------------------------------
        array(
            'field' => 'ska_nama',
            'label' => 'Nama Sekolah Asal',
            'rules' => 'trim|xss_clean|required|max_length[64]'
        ),

        array(
            'field' => 'ska_alamat',
            'label' => 'Alamat Sekolah Asal',
            'rules' => 'trim|xss_clean|required|max_length[255]'
        ),
        array(
            'field' => 'ska_no_ijazah',
            'label' => 'No Ijazah',
            'rules' => 'trim|xss_clean|required|max_length[32]'
        ),
        // Nilai -------------------------------------------------------
        // Bahasa Indonesia
        array(
            'field' => 'nil_bin_1',
            'label' => 'Nilai Bahasa Indonesia',
            'rules' => 'trim|xss_clean|required|max_length[3]|greater_than[0]'
        ),
        array(
            'field' => 'nil_bin_2',
            'label' => 'Nilai Matematika',
            'rules' => 'trim|xss_clean|required|max_length[3]|greater_than[0]'
        ),
        array(
            'field' => 'nil_bin_3',
            'label' => 'Nilai IPA',
            'rules' => 'trim|xss_clean|required|max_length[3]|greater_than[0]'
        ),
    );

    public function simpan($peserta)
    {
        $peserta = (object)$peserta;

        // Set status biodata.
        $peserta->status_biodata = '1';

          // Ubah tanggal lahir ke format yyyy-mm-dd
        $peserta->tanggal_lahir = ($peserta->tanggal_lahir);
         
        return $this->update($peserta->id, $peserta);
    }
    
    function get_data($table){
    return $this->db->get($table);
  }
}
