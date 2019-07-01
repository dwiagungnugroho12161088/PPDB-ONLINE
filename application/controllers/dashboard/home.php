<?php
class Home extends Dashboard_Controller
{
    public $data = array(
        'halaman' => 'home',
        'main_view' => 'dashboard/home'
    );

    public function index()
    {
        $this->load->view($this->layout, $this->data);
    }
}
