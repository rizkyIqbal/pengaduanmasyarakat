<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('landing_model');
    }
    public function index()
    {
        $data['semua'] = $this->landing_model->totalPengaduan()->num_rows();
        $data['proses'] = $this->landing_model->totalPengaduanProses()->num_rows();
        $data['selesai'] = $this->landing_model->totalPengaduanSelesai()->num_rows();
        $data['instansi'] = $this->landing_model->totalInstansi()->num_rows();
        $this->load->view('landing/index', $data);
    }
}
