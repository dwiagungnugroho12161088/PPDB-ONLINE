<?php
class User_model extends MY_Model
{
    protected $form_rules = array(
        array(
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'trim|xss_clean|required|max_length[32]'
        ),
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'trim|xss_clean|required|max_length[32]|callback__username_unik'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|xss_clean|callback__is_password_required|max_length[32]|matches[passconf]'
        ),
        array(
            'field' => 'passconf',
            'label' => 'Konfirmasi Password',
            'rules' => 'trim|xss_clean|callback__is_passconf_required|max_length[32]|matches[password]'
        ),
        array(
            'field' => 'level',
            'label' => 'Level',
            'rules' => 'trim|xss_clean|required'
        ),
        array(
            'field' => 'is_blokir',
            'label' => 'Status Blokir',
            'rules' => 'trim|xss_clean|required'
        ),
    );

    public $default_value = array(
        'nama' => '',
        'username' => '',
        'password' => '',
        'passconf' => '',
        'level' => '',
        'is_blokir' => '',
    );

    public function tambah($user)
    {
        $user = (object) $user;
        unset($user->passconf);
        $user->password = md5($user->password);
        return $this->insert($user);
    }

    public function edit($id, $user)
    {
        $user = (object) $user;
        unset($user->passconf);

        // Cek password
        if (empty($user->password)) {
            unset($user->password);
        } else {
            $user->password = md5($user->password);
        }
        return $this->update($id, $user);
    }
}