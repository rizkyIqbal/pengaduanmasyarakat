<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('petugas_model');
        $this->load->model('user_model');
        $this->load->model('petugas_model');
    }
    public function index()
    {
        $data['title'] = 'Home Page Pengaduan';
        $data['user'] = $this->db->get_where('masyarakat', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['selesai'] = $this->user_model->getPengaduanSelesai();
        $data['array'] = $this->user_model->getPengaduan()->result_array();
        // $data['tanggapan'] = $this->user_model->getDataTanggapan($idpengaduan)->row_array();
        $this->load->view('templates/user/header' ,$data);
        $this->load->view('templates/user/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/user/footer');
    }

    public function pengaduan()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('isi', 'Isi', 'trim|required');
        // $this->form_validation->set_rules('tgl', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('manajemen', 'Manajemen', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tulis Pengaduan';
            $data['user'] = $this->db->get_where('masyarakat', ['username' =>
            $this->session->userdata('username')])->row_array();
            $data['nik'] = $this->db->get_where('masyarakat', ['nik' =>
            $this->session->userdata('nik')])->row_array();
            $data['limit'] = $this->user_model->getPengaduanLimit();
            $this->load->view('templates/user/header' , $data);
            $this->load->view('templates/user/topbar', $data);
            $this->load->view('user/form', $data);
            $this->load->view('templates/user/footer');
        } else {
            
            $foto = $_FILES['foto'];
            if ($foto = '') {
            } else {
                $config['upload_path'] = './assets/foto';
                $config['allowed_types'] = 'jpg|png|gif';
    
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto')) {
                    $data = [
                       'judul_pengaduan' => htmlspecialchars($this->input->post('judul', true)),
                'isi_laporan' => htmlspecialchars($this->input->post('isi', true)),
                'nik' => $this->session->userdata('nik'),
                'tujuan' => htmlspecialchars($this->input->post('manajemen', true)),
                'status' => "0"
            ];
                } else {
                    $foto = $this->upload->data('file_name');
                    $data = [
                        'judul_pengaduan' => htmlspecialchars($this->input->post('judul', true)),
                'isi_laporan' => htmlspecialchars($this->input->post('isi', true)),
                'nik' => $this->session->userdata('nik'),
                'tujuan' => htmlspecialchars($this->input->post('manajemen', true)),
                'status' => "0",
                'foto_pengaduan' =>$foto
                    ];
                }
            }

            $this->db->insert('pengaduan', $data);
            redirect('user/pengaduan');
        }
    }



    public function myform()
    {
        $data['title'] = 'Pengaduan Saya';
        $data['user'] = $this->db->get_where('masyarakat', ['username' =>
        $this->session->userdata('username')])->row_array();
        $username = $this->db->get_where('masyarakat', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['selesai'] = $this->user_model->getPengaduanSelesai();
        $data['array'] = $this->user_model->selectMyForm($username['username'])->result_array();
        $this->load->view('templates/user/header' , $data);
        $this->load->view('templates/user/topbar', $data);
        $this->load->view('user/myform', $data);
        // $this->load->view('templates/user/footer');
    }

    public function isiform($id)
    {
        $semua['haha'] = $this->user_model->getDataPengaduanDetail($id)->row_array();
        $semua['hehe'] = $this->user_model->getDataTanggapan($id)->row_array();
        // var_dump($semua['cok']);
        $data['title'] = 'Pengaduan Saya';
        $data['selesai'] = $this->user_model->getPengaduanSelesai();
        $data['user'] = $this->db->get_where('masyarakat', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates/user/header', $data);
        $this->load->view('templates/user/topbar', $data);
        $this->load->view('user/isiform', $semua);
        // $this->load->view('templates/user/footer');
    }


    public function profile()
    {
        $data['title'] = 'Profile Saya';
        $data['user'] = $this->db->get_where('masyarakat', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates/user/header', $data);
        $this->load->view('templates/user/topbar', $data);
        $this->load->view('user/profile', $data);
        // $this->load->view('templates/user/footer');
    }


    public function editprofile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('masyarakat', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates/user/header', $data);
        $this->load->view('templates/user/topbar', $data);
        $this->load->view('user/editprofile', $data);
        // $this->load->view('templates/user/footer');
    }

    public function updatefoto(){
        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Upload GAGAL";
                die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }
        $data = [
            'foto' => $foto
        ];

        $this->user_model->editprofile($data, $nik);
        redirect('auth');
    }

    public function actupdateprofile()
    {
        $nik = $this->input->post('nik');
        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $data = [
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'telp' => htmlspecialchars($this->input->post('telp', true)),
                ];
            } else {
                $foto = $this->upload->data('file_name');
                $data = [
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'telp' => htmlspecialchars($this->input->post('telp', true)),
                    'foto' => $foto
                ];
            }
        }
        $this->user_model->editprofile($data, $nik);
        redirect('auth');
    }

    public function hapususer($id)
    {
        $this->user_model->deleteuser($id);
        redirect('auth');
    }
}
