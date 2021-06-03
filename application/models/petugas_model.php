<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas_model extends CI_Model
{
    public function regist()
    {
        $data = [
            'id_petugas' => htmlspecialchars($this->input->post('id', true)),
            'nama_petugas' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'telp' => htmlspecialchars($this->input->post('telp', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'posisi' => htmlspecialchars($this->input->post('posisi', true)),
            'level' => htmlspecialchars($this->input->post('level', true)),
        ];

        $this->db->insert('petugas', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Congratulations! Your account has been created. 
        Please Login
      </div>');
        redirect('admin/akun');
    }

    public function mvaladmin($data, $id)
    {
        $this->db->where('id_pengaduan', $id);
        $this->db->update('pengaduan', $data);
    }

    public function mvlinstansi($data)
    {
        $this->db->trans_start();
        $this->db->insert('instansi', $data);
        // $this->db->trans_complete();
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return FALSE;
          }else{

              $this->db->trans_complete();
              return TRUE;
             redirect('admin/akun');
          }
    }

    public function mvltolaktanggapan($id)
    {
        $status = "ditolak";
        $data = [
            'status' => htmlspecialchars($status),
        ];
        $this->db->where('id_pengaduan', $id);
        $this->db->update('pengaduan', $data);
    }

    public function mvlbatalproses($id){
        $status = "0";
        $data = [
            'status' => htmlspecialchars($status),
        ];
        $this->db->where('id_pengaduan', $id);
        $this->db->update('pengaduan', $data);
    }

    public function mvlselesaipengaduan($id){
        $status = "selesai";
        $data = [
            'status' => htmlspecialchars($status),
        ];
        $this->db->where('id_pengaduan', $id);
        $this->db->update('pengaduan', $data);
    }

    public function mvlbataltanggapan($id){
        $status = "proses";
        $data = [
            'status' => htmlspecialchars($status),
        ];
        $this->db->where('id_pengaduan', $id);
        $this->db->update('pengaduan', $data);
    }

    public function mvltanggapan($data, $id)
    {
        $this->db->insert('tanggapan', $data);
        $this->db->where('id_pengaduan', $id);
        // $this->db->update('pengaduan', $data2);
    }

    public function mvlupdttanggapan($data, $id)
    {
        $this->db->where('id_pengaduan', $id);
        $this->db->update('tanggapan', $data);
        // $this->db->update('pengaduan', $data2);
    }

    public function mvlupdttanggapan2($data, $id)
    {
        $this->db->where('id_pengaduan', $id);
        $this->db->update('tanggapan', $data);
        // $this->db->update('pengaduan', $data2);
    }

    public function mvlupdatepetugas($data, $id)
    {
        $this->db->where('id_petugas', $id);
        $this->db->update('petugas', $data);
    }

    public function getDataMasyarakatDetail($id)
    {
        $query = "SELECT *
        FROM pengaduan JOIN masyarakat 
        ON pengaduan.nik = masyarakat.nik
        WHERE pengaduan.id_pengaduan = '$id'
        AND status = '0'
        ORDER BY pengaduan.id_pengaduan desc
        ";
        return $this->db->query($query)->row_array();
    }

    public function getAkunById($id)
    {
        $query = "SELECT *
        FROM petugas 
        WHERE id_petugas = '$id'
        ";
        return $this->db->query($query)->row_array();
    }

    public function getInstansi()
    {
        $query = "SELECT *
        FROM instansi 
        ";
        return $this->db->query($query);
    }

    public function getInstansiNama()
    {
        $query = "SELECT nama_instansi
        FROM instansi 
        ";
        return $this->db->query($query);
    }

    public function getPengaduanByIdPosisi($id)
    {
        $query = "SELECT *
        FROM pengaduan JOIN masyarakat 
        ON pengaduan.nik = masyarakat.nik
        WHERE pengaduan.id_pengaduan = '$id'
        ";
        return $this->db->query($query)->row_array();
    }

    public function getTanggapanByIdPosisi($id)
    {
        $query = "SELECT *
        FROM tanggapan JOIN pengaduan 
        ON tanggapan.id_pengaduan = pengaduan.id_pengaduan
        WHERE tanggapan.id_pengaduan = '$id'
        ";
        return $this->db->query($query)->row_array();
    }

    public function getInstansiNama2()
    {
        $query = "SELECT nama_instansi
        FROM instansi 
        ";
        return $this->db->query($query);
    }


    public function mdldeleteadmin($id)
    {
        $this->db->where('id_pengaduan', $id);
        $this->db->delete('pengaduan');
    }

    public function mdldeletepetugas($id)
    {
        $this->db->where('id_petugas', $id);
        $this->db->delete('petugas');
    }

    // public function getDataMasyarakatUsername($id)
    // {
    //     $query = "SELECT *
    //     FROM pengaduan JOIN masyarakat 
    //     ON pengaduan.nik = masyarakat.nik
    //     WHERE id_pengaduan = '$id'
    //     AND status = '0'
    //     ORDER BY pengaduan.id_pengaduan desc
    //     ";
    //     return $this->db->query($query)->result_array();
    // }
}
