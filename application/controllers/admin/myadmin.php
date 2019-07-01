<?php
class Myadmin extends Operator_Controller
{
    public $data = array(
        'halaman' => 'myadmin',        
        'title' => 'My Admin',
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Myadmin_model', 'myadmin');
    }

    public function index()
    {
        // Pastikan data user ada.
        $id = $this->session->userdata('user_id');
        $user = $this->myadmin->get($id);
        if (! $user) {
            $this->session->set_flashdata('pesan_error', 'Apa yang Anda Lakukan???. Kembali ke halaman ' . anchor('admin', 'home.', 'class="alert-link"'));
            redirect('admin/myadmin/error');
        }

        // Data untuk form.
        if (!$_POST) {
            $data = (object) $user;
            $data->password = '';
            $data->passconf = '';
        } else {
            $data = (object) $this->input->post(null, true);
        }
        $this->data['values'] = $data;

        // Validasi.
        if (! $this->myadmin->validate('form_rules')) {
            $this->data['main_view'] = 'admin/myadmin_form';
            $this->data['form_action'] = site_url('admin/myadmin');
            $this->load->view($this->layout, $this->data);
            return;
        }

        // Simpan user.
        if ($this->myadmin->edit($id, $data)) {
            $this->session->set_userdata('username', $data->username);
            $this->session->set_flashdata('pesan', 'Data berhasil disimpan. Kembali ke halaman ' . anchor('admin', 'home.', 'class="alert-link"'));
            redirect('admin/myadmin/sukses');
        } else {
            $this->session->set_flashdata('pesan_error', 'Data berhasil disimpan. Kembali ke halaman ' . anchor('admin', 'home.', 'class="alert-link"'));
            redirect('admin/myadmin/error');
        }
    }

    public function sukses()
    {
        $this->data['main_view'] = 'sukses';
        $this->data['title'] = 'My Admin';
        $this->load->view($this->layout, $this->data);
    }

    public function error()
    {
        $this->data['main_view'] = 'error';
        $this->data['title'] = 'My Admin';
        $this->load->view($this->layout, $this->data);
    }

   
    public function _is_passconf_required()
    {
        $password = $this->input->post('password');
        if (! empty($password)) {
            $passconf = $this->input->post('passconf', true);
            if (empty($passconf)) {
                $this->form_validation->set_message('_is_passconf_required', '%s harus diisi.');
                return false;
            }
        }
        return true;
    }

    
    public function _username_unik()
    {
        $id = $this->session->userdata('user_id');
        $this->db->where('username', $this->input->post('username'));
        !$id || $this->db->where('id !=', intval($id));
        $user = $this->myadmin->get_all();

        if (count($user)) {
            $this->form_validation->set_message('_username_unik', '%s sudah digunakan.');
            return false;
        }
        return true;
    }
}