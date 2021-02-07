<?php

class Mahasiswa extends CI_Controller
{
    function __construct() // method yang dijalankan setiap kali class diinstansiasi
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
    }
    public function index()
    {


        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost/ci3app/mahasiswa/index/';
        $config['total_rows'] = $this->Mahasiswa_model->getRows();
        $config['per_page'] = 8;

        $config['num_links'] = 5;
        $data['start'] = $this->uri->segment(3);

        $config['full_tag_open'] = '<nav class="mt-3"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';


        $config['attributes'] = ['class' => 'page-link'];


        $this->pagination->initialize($config);
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswa($config['per_page'], $data['start']);



        $data['judul'] = 'daftar mahasiswa';

        // $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
        // if (!empty($_POST['keyword'])) {
        //     $data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
        // }
        // $data['judul'] = $this->input->post('keyword');

        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form tambah data';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Mahasiswa_model->tambahData();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('mahasiswa');
        }
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah data';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        $data['jurusan'] = ['Informatika', 'Sistem Informasi', "Teknik tambang"];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mahasiswa_model->ubahData($id);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('mahasiswa');
        }
    }

    public function hapus($id)
    {
        $this->Mahasiswa_model->hapusDataMahasiswa($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('mahasiswa');
    }

    public function detail($id)
    {

        $data['judul'] = 'detail data mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/detail', $data);
        $this->load->view('templates/footer');
    }
}
