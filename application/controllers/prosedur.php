<?php
class Prosedur extends Public_Controller
{
    public $data = array(
        'halaman' => 'prosedur',
        'main_view' => 'prosedur',
        'title' => 'Prosedur PPDB',
    );

    public function index()
    {
        $this->load->view($this->layout, $this->data);
    }
}