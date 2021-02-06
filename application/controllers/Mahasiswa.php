<?php

class Mahasiswa extends CI_Controller
{
    function __construct() // method yang dijalankan setiap kali class diinstansiasi
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
    }
    public function index()
    {
        $data['judul'] = 'daftar mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');
    }
}
