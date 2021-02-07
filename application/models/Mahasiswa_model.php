<?php

class Mahasiswa_model extends CI_Model
{
    public function getAllMahasiswa()
    {
        return $this->db->get('mahasiswa')->result_array();
    }
    public function tambahData()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nim" => $this->input->post('nim', true),
            "jurusan" => $this->input->post('jurusan', true)
        ];

        $this->db->insert('mahasiswa', $data);
    }

    public function ubahData($id)
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nim" => $this->input->post('nim', true),
            "jurusan" => $this->input->post('jurusan', true)
        ];

        $this->db->update('mahasiswa', $data, ['id' => $id]);
    }

    public function hapusDataMahasiswa($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mahasiswa');
    }

    public function getMahasiswaById($id)
    {
        return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
    }

    public function getRows()
    {
        return $this->db->get('mahasiswa')->num_rows();
    }

    public function getMahasiswa($limit, $start)
    {
        return $this->db->get('mahasiswa', $limit, $start)->result_array();
    }


    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword', true);
        return $this->db->like('nama', $keyword)
            ->or_like('LOWER(jurusan)', strtolower($keyword))
            ->or_like('nim', $keyword)
            ->get('mahasiswa')->result_array();
    }
}
