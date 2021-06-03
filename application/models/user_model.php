<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function editprofile($data, $nik)
    {
        $this->db->where('nik', $nik);
        $this->db->update('masyarakat', $data);
    }

    public function getPengaduan()
    {
        $query = "SELECT *
        FROM `pengaduan` JOIN `masyarakat` 
        ON `pengaduan`.`nik` = `masyarakat`.`nik`
        ORDER BY `pengaduan`.`update_date` desc
        ";

        return $this->db->query($query);
    }

    public function selectMyForm($username){
        $query = "SELECT *
        FROM pengaduan JOIN masyarakat 
        ON pengaduan.nik = masyarakat.nik
        WHERE username= '$username'
        ORDER BY pengaduan.id_pengaduan desc
        ";
        return $this->db->query($query);
    }

    public function getDataPengaduanDetail($id)
    {
        $query = "SELECT *
        FROM pengaduan JOIN masyarakat 
        ON pengaduan.nik = masyarakat.nik
        JOIN petugas ON petugas.posisi = pengaduan.tujuan
        WHERE pengaduan.id_pengaduan = '$id'
        ORDER BY pengaduan.id_pengaduan desc
        ";

        return $this->db->query($query);
    }

    public function totalPengaduanById($datanik)
    {
        $query = " SELECT id_pengaduan
        FROM pengaduan 
        WHERE nik = '$datanik'";

        return $this->db->query($query);
        // $data =  $this->db->query($query)->;
        // $jumlah = mysqli_num_rows($data);
        // return $jumlah;
    }

    public function totalPengaduanSelesai($datanik)
    {
        $query = " SELECT id_pengaduan
        FROM pengaduan 
        WHERE nik = '$datanik'
        AND status = 'selesai'";

        return $this->db->query($query);
        // $data =  $this->db->query($query)->;
        // $jumlah = mysqli_num_rows($data);
        // return $jumlah;
    }

    public function totalPengaduanDitolak($datanik)
    {
        $query = " SELECT id_pengaduan
        FROM pengaduan 
        WHERE nik = '$datanik'
        AND status = 'ditolak'";

        return $this->db->query($query);
        // $data =  $this->db->query($query)->;
        // $jumlah = mysqli_num_rows($data);
        // return $jumlah;
    }


    public function getDataTanggapan($id)
    {

        $query = "SELECT *
         FROM pengaduan JOIN petugas 
         ON pengaduan.tujuan = petugas.posisi
         JOIN tanggapan ON pengaduan.id_pengaduan = tanggapan.id_pengaduan
         WHERE pengaduan.id_pengaduan = '$id'
         ORDER BY pengaduan.id_pengaduan desc
         ";
        $query2 = "SELECT *
        FROM tanggapan JOIN petugas 
        ON tanggapan.id_petugas = petugas.id_petugas
        WHERE pengaduan.id_pengaduan = '$id'
        ";
        $query3 = "SELECT *
            FROM pengaduan
            INNER JOIN tanggapan ON pengaduan.id_pengaduan = tanggapan.id_pengaduan
            WHERE pengaduan.id_pengaduan = '$id'";

        return $this->db->query($query3);
    }

    public function getDataTanggapan2($idpengaduan)
    {
        $query = "SELECT *
            FROM pengaduan
            INNER JOIN tanggapan ON pengaduan.id_pengaduan = tanggapan.id_pengaduan
            WHERE pengaduan.id_pengaduan = '$idpengaduan'";

        return $this->db->query($query);
    }

    public function getPengaduanSelesai()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('masyarakat', 'masyarakat.nik = pengaduan.nik');
        $this->db->where('pengaduan.status', "selesai");
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getPengaduanLimit()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('masyarakat', 'masyarakat.nik = pengaduan.nik');
        $this->db->where('pengaduan.status', "selesai");
        $this->db->order_by('pengaduan.created_date ', 'DESC');
        $this->db->limit(4);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function deleteuser($id)
    {
        $this->db->where('nik', $id);
        $this->db->delete('masyarakat');
    }
}
