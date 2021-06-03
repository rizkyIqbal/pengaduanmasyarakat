<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing_model extends CI_Model
{
    public function totalPengaduan()
    {
        $query = " SELECT id_pengaduan
        FROM pengaduan ";

        return $this->db->query($query);
    }
    public function totalPengaduanProses()
    {
        $query = " SELECT id_pengaduan
        FROM pengaduan 
        WHERE status = 'proses'";

        return $this->db->query($query);
    }
    public function totalPengaduanSelesai()
    {
        $query = " SELECT id_pengaduan
        FROM pengaduan 
        WHERE status = 'selesai'";

        return $this->db->query($query);
    }

    public function totalInstansi()
    {
        $query = " SELECT id_instansi
        FROM instansi ";

        return $this->db->query($query);
    }
}
