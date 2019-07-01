<?php
class Myadmin_model extends MY_Model
{
    protected $_tabel = 'tb_user';
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
            'rules' => 'trim|xss_clean|max_length[32]|matches[passconf]'
        ),
        array(
            'field' => 'passconf',
            'label' => 'Konfirmasi Password',
            'rules' => 'trim|xss_clean|max_length[32]|callback__is_passconf_required|matches[password]'
        ),
    );

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