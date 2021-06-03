<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('petugas_model');
        
    }
    public function index()
    {
        // $data2['title'] = 'Petugas Page';
        $data2['user'] = $this->db->get_where('petugas', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates/petugas/header', $data2);
        $this->load->view('templates/petugas/topbar', $data2);
        // $this->load->view('templates/petugas/sidebar', $data);
        $this->load->view('petugas/index', $data2);
        $this->load->view('templates/petugas/footer');
    }

    public function tanggapan()
    {
        $data['title'] = 'Petugas Page';
        $data['user'] = $this->db->get_where('petugas', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates/petugas/header', $data);
        $this->load->view('templates/petugas/topbar', $data);
        // $this->load->view('templates/petugas/sidebar', $data);
        $this->load->view('petugas/tanggapan', $data);
        $this->load->view('templates/petugas/footer');
    }

    public function verifadmin()
    {
        $data['title'] = 'Admin Page';
        $data['user'] = $this->db->get_where('petugas', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates/petugas/header', $data);
        $this->load->view('templates/petugas/topbar', $data);
        // $this->load->view('templates/petugas/sidebar', $data);
        $this->load->view('petugas/adminverif', $data);
        $this->load->view('templates/petugas/footer');
    }


    public function validasiadmin($id)
    {

        $hasil = $this->petugas_model->getDataMasyarakatDetail($id);


        $data['title'] = 'Admin Page';
        $data['user'] = $this->db->get_where('petugas', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data2 = array('dataselected' => $hasil);
        $this->load->view('templates/petugas/header', $data);
        $this->load->view('templates/petugas/topbar', $data);
        $this->load->view('petugas/validasiadmin', $data2);
        $this->load->view('templates/petugas/footer');
    }

    public function actverifadmin()
    {
        $id = $this->input->post('id_pengaduan');
        $status = "proses";
        $data = [
            'tujuan' => htmlspecialchars($this->input->post('tujuan', true)),
            'status' => htmlspecialchars($status),
        ];

        $this->petugas_model->mvaladmin($data, $id);
        redirect('admin/verifadmin');
    }

    public function validasipetugas($id)
    {

        $hasil = $this->petugas_model->getPengaduanByIdPosisi($id);
        $hasil2 = $this->petugas_model->getTanggapanByIdPosisi($id);

        
        $this->form_validation->set_rules('tanggapan', 'Tanggapan', 'trim|required');
        if ($this->form_validation->run() == false) {
        $data['title'] = 'Admin Page';
        $data['user'] = $this->db->get_where('petugas', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data2['dataselected'] = $hasil;
        $data2['selecttanggapan'] = $hasil2;
        $this->load->view('templates/petugas/header', $data);
        $this->load->view('templates/petugas/topbar', $data);
        $this->load->view('petugas/validasipetugas', $data2);
        $this->load->view('templates/petugas/footer');
        } else {
            if($hasil2 !== NULL){
                $this->updttanggapan2();
            }else{
                $this->updttanggapan();

            }
        }
    }

    public function updttanggapan2()
    {
        $id = $this->input->post('id_pengaduan');
        $status = "selesai";
        $data = [
            'tanggapan' => htmlspecialchars($this->input->post('tanggapan', true)),
        ];
        // $data2 = [
        //     'status' => htmlspecialchars($status),
        // ];

        $this->petugas_model->mvlupdttanggapan2($data,$id);
        redirect('admin/tanggapan');
    }

    public function updttanggapan()
    {
        $id = $this->input->post('id_pengaduan');
        $status = "selesai";
        $data = [
            'tanggapan' => htmlspecialchars($this->input->post('tanggapan', true)),
            'id_pengaduan' => htmlspecialchars($this->input->post('id_pengaduan', true)),
            'id_petugas' => htmlspecialchars($this->input->post('id_petugas', true)),
        ];
        // $data2 = [
        //     'status' => htmlspecialchars($status),
        // ];

        $this->petugas_model->mvltanggapan($data,$id);
        redirect('admin/tanggapan');
    }


    public function editpetugas($id)
    {

        $hasil = $this->petugas_model->getAkunById($id);

        $data['title'] = 'Admin Page';
        $data['user'] = $this->db->get_where('petugas', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data2 = array('dataselected' => $hasil);
        $this->load->view('templates/petugas/header', $data);
        $this->load->view('templates/petugas/topbar', $data);
        $this->load->view('petugas/editpetugas', $data2);
        $this->load->view('templates/petugas/footer');
    }

    public function acteditpetugas()
    {
        $id = $this->input->post('id');
        $data = [
            'nama_petugas' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'telp' => htmlspecialchars($this->input->post('telp', true)),
        ];
        $this->petugas_model->mvlupdatepetugas($data, $id);
        redirect('admin/akun');
    }

    public function tolaktanggapan($id)
    {
        $this->petugas_model->mvltolaktanggapan($id);
        redirect('admin/tanggapan');
    }


    public function batalproses($id){
        $this->petugas_model->mvlbatalproses($id);
        redirect('admin');
    }

    public function selesaiproses($id){
        $this->petugas_model->mvlselesaipengaduan($id);
        redirect('admin');
    }

    public function bataltanggapan($id){
        $this->petugas_model->mvlbataltanggapan($id);
        redirect('admin');
    }

    public function tambahinstansi()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data2['title'] = 'Admin Page';
            $data2['user'] = $this->db->get_where('petugas', ['username' =>
            $this->session->userdata('username')])->row_array();
            $this->load->view('templates/petugas/header', $data2);
            $this->load->view('templates/petugas/topbar', $data2);
            // $this->load->view('templates/petugas/sidebar', $data);
            $this->load->view('petugas/tambahinstansi', $data2);
            $this->load->view('templates/petugas/footer');
        } else {
            $data = [
                'nama_instansi'  => htmlspecialchars($this->input->post('nama'))
            ];
            $this->petugas_model->mvlinstansi($data);
            redirect('admin/akun');
        }
    }


    public function actinstansi()
    {
        $data = [
            'nama'  => htmlspecialchars($this->input->post('nama'))
        ];
        $this->petugas_model->mvlinstansi($data);
        redirect('admin/akun');
    }

    public function akun()
    {
        $this->form_validation->set_rules('id', 'Id', 'trim|required');
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim|is_unique[masyarakat.username]',
            [
                'is_unique' => 'Username Sudah Terdaftar!'
            ]
        );
        $this->form_validation->set_rules('telp', 'Telp', 'trim|required');
        $this->form_validation->set_rules('level', 'Level', 'trim|required');
        $this->form_validation->set_rules('posisi', 'Posisi', 'trim|required');
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[3]|matches[password2]',
            [
                'matches' => 'Password dont match!',
                'min_length' => 'Password too short!'
            ]
        );
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password]');
        if ($this->form_validation->run() == false) {
            $hasil = $this->petugas_model->getInstansi();
            $data2['instansi'] = array('dataselected' => $hasil);
            // var_dump($hasil);
            $data2['title'] = 'Admin Page';
            $data2['user'] = $this->db->get_where('petugas', ['username' =>
            $this->session->userdata('username')])->row_array();
            $data2['posisi'] = $this->db->get_where('petugas', ['posisi' =>
            $this->session->userdata('posisi')])->row_array();
            // $this->load->view('templates/petugas/header', $data);
            // $this->load->view('templates/petugas/topbar', $data);
            // $this->load->view('templates/petugas/sidebar', $data);
            $this->load->view('petugas/akun', $data2);
            // $this->load->view('templates/petugas/footer');
        } else {
            $this->petugas_model->regist();
        }
    }

    public function deletePengaduanAdmin($id)
    {
        $this->petugas_model->mdldeleteadmin($id);
        redirect('admin/verifadmin');
    }

    public function deletePengaduanAdmin2($id)
    {
        $this->petugas_model->mdldeleteadmin($id);
        redirect('admin');
        var_dump($id);
    }

    public function deleteAkunPetugas($id)
    {
        $this->petugas_model->mdldeletepetugas($id);
        redirect('admin/akun');
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('posisi');
        $this->session->unset_userdata('level');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        You have been logged out!
      </div>');
        redirect('auth');
    }
}
