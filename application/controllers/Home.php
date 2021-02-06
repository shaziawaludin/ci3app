<?php

class Home extends CI_Controller
{
    public function index($nama = 'user')
    {
        $data['judul'] = 'Halaman home';
        $data['nama'] = $nama;
        $this->load->view('templates/header', $data);
        $this->load->view('home/index');
        $this->load->view('templates/footer');
    }
}
