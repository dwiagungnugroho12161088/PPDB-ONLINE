<?php
class Home extends Public_Controller
{
    public $data = array(
        'halaman' => 'home',
        'main_view' => 'home'
    );

    public function index()
    {
        $this->load->view($this->layout, $this->data);
    }
}