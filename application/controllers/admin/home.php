<?php
class Home extends Operator_Controller
{
    public $data = array(
        'halaman' => 'home',
        'main_view' => 'admin/home'
    );

    public function index()
    {
        $this->load->view($this->layout, $this->data);
    }
}