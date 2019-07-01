<?php
class User extends Admin_Controller
{
    public $data = array(
        'halaman' => 'user',
        'main_view' => 'admin/user_list',
        'title' => 'Data User',
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/User_model', 'user');
    }

    public function index()
    {
        $user = $this->user->get_all();
        if ($user) {
            $this->data['user'] = $user;
        } else {
            $this->data['user'] = 'Tidak ada data user.';
        }
        $this->load->view($this->layout, $this->data);
    }
    
    public function tambah()
    {
        $this->data['main_view'] = 'admin/user_form';
        $this->data['form_action'] = site_url('admin/user/tambah');

        // Data untuk form.
        if (! $_POST) {
            $user = (object) $this->user->default_value;
            $user->password = '';
            $user->passconf = '';
        } else {
            $user = $this->input->post(null, true);
        }

        // Validasi.
        if (! $this->user->validate('form_rules')) {
            $this->data['values'] = (object) $user;
            $this->load->view($this->layout, $this->data);
            return;
        }

        // Simpan ke DB.
        if ($this->user->tambah($user)) {
            $this->session->set_flashdata('pesan', 'user berhasil disimpan. Kembali ke halaman ' . anchor('admin/user', 'user.', 'class="alert-link"'));
            redirect('admin/user/sukses');
        } else {
            $this->session->set_flashdata('pesan_error', 'user gagal disimpan. Kembali ke halaman ' . anchor('admin/user', 'user.', 'class="alert-link"'));
            redirect('admin/user/error');
        }
    }

    public function edit($id = null)
    {
        // Pastikan data user ada.
        $user = $this->user->get($id);
        if (! $user) {
            $this->session->set_flashdata('pesan_error', 'Data user tidak ada. Kembali ke halaman ' . anchor('admin/user', 'user.', 'class="alert-link"'));
            redirect('admin/user/error');
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
        if (! $this->user->validate('form_rules')) {
            $this->data['main_view'] = 'admin/user_form';
            $this->data['form_action'] = site_url('admin/user/edit/'.$id);
            $this->load->view($this->layout, $this->data);
            return;
        }

        // Simpan user.
        if ($this->user->edit($id, $data)) {
            $this->session->set_flashdata('pesan', 'user berhasil disimpan. Kembali ke halaman ' . anchor('admin/user', 'user.', 'class="alert-link"'));
            redirect('admin/user/sukses');
        } else {
            $this->session->set_flashdata('pesan_error', 'user berhasil disimpan. Kembali ke halaman ' . anchor('admin/user', 'user.', 'class="alert-link"'));
            redirect('admin/user/error');
        }
    }

    public function sukses()
    {
        $this->data['main_view'] = 'sukses';
        $this->data['title'] = 'Data User';
        $this->load->view($this->layout, $this->data);
    }

    public function error()
    {
        $this->data['main_view'] = 'error';
        $this->data['title'] = 'Data User';
        $this->load->view($this->layout, $this->data);
    }

    public function hapus($id)
    {
        // Pastikan data user ada.
        if (! $this->user->get($id)) {
            $this->session->set_flashdata('pesan_error', 'Data user tidak ada. Kembali ke halaman ' . anchor('admin/user', 'user.', 'class="alert-link"'));
            redirect('admin/user/error');
        }

        // Hapus
        if ($this->user->delete($id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus. Kembali ke halaman '. anchor('admin/user', 'user.', 'class="alert-link"'));
            redirect('admin/user/sukses');
        } else {
            $this->session->set_flashdata('pesan_error', 'Data gagal dihapus. Kembali ke halaman '. anchor('admin/user', 'user.', 'class="alert-link"'));
            redirect('admin/user/error');
        }
    }

    // Kolom "password" harus diisi hanya untuk proses tambah.
    // Jika "id" ada di URL (edit), maka password tidak "required"
    public function _is_password_required()
    {
        $id = $this->uri->segment(4);
        if (empty($id)) {
            $password = $this->input->post('password', true);
            if (empty($password)) {
                $this->form_validation->set_message('_is_password_required', '%s harus diisi.');
                return false;
            }
        }
        return true;
    }

    // Jika "password" diisi, maka "passconf" harus diisi
    public function _is_passconf_required()
    {
        $password = $this->input->post('password', true);
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
        $id = $this->uri->segment(4);
        $this->db->where('username', $this->input->post('username'));
        !$id || $this->db->where('id !=', $id);
        $user = $this->user->get_all();

        if (count($user)) {
            $this->form_validation->set_message('_username_unik', '%s sudah digunakan.');
            return false;
        }
        return true;
    }
}