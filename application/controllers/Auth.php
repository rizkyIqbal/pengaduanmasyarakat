<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('auth_model');
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth/auth_header', $data);
            $this->load->view('templates/auth/auth_topbar');
            $this->load->view('auth/login');
            $this->load->view('templates/auth/auth_footer');
        } else {
            $this->auth_model->login();
        }
    }

    // private function _login()
    // {
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');
    //     $level1 = "user";
    //     $level2 = "petugas";
    //     $level3 = "petugas";

    //     $user = $this->db->get_where('masyarakat', ['username' => $username])->row_array();
    //     $user2 = $this->db->get_where('petugas', ['username' => $username])->row_array();

    // if ($user) {
    //     if ($user['is_active'] == 1) {
    //         if (password_verify($password, $user['password'])) {
    //             $data = [
    //                 'username' => $user['username'],
    //                 $level1 => $user['level']
    //             ];
    //             $this->session->set_userdata($data);
    //             if ($user['level'] == "user") {
    //                 redirect('user');
    //             } else {
    //                 redirect('user');
    //             }
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //                     Wrong Password!
    //                   </div>');
    //             redirect('auth');
    //         }
    //     } else {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //         Email is not been activated!
    //       </div>');
    //         redirect('auth');
    //     }
    // } else {
    //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //     Email is not registered!
    //   </div>');
    //     redirect('auth');
    // }

    // if ($user !== NULL) {
    //     if (password_verify($password, $user['password'])) {
    //         $data = [
    //             'username' => $user['username'],
    //             'nik' => $user['nik'],
    //             $level1 => $user['level']
    //         ];
    //         $this->session->set_userdata($data);
    //         if ($user['level'] == "user") {
    //             redirect('user');
    //         } else {
    //             echo ('MBALEK USER');
    //         }
    //     } else {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //     Wrong Password!
    //   </div>');
    //         redirect('auth');
    //     }
    // } else {
    //     if ($user2 !== NULL) {
    //         $data2 = [
    //             'username' => $user2['username'],
    //             $level2 => $user2['level']
    //         ];
    //         $this->session->set_userdata($data2);
    //         if ($user2['level'] == "petugas") {
    //             echo ('KENEK PETUGAS');
    //         } else {
    //             echo ('IKI ADMIN');
    //         }
    //     }
    // }


    // echo "<pre>";
    // print_r($user->result_array());





    // $this->load->model('login');
    // $data = $this->Login->get_data_by_store_proc();
    // echo "<pre>";
    // print_r($data->result_array());


    // $insert_user_stored_proc = "CALL getUsername()";
    // $result = $this->db->query($insert_user_stored_proc);
    // if ($result !== NULL) {
    //     echo "<pre>";
    //     print_r($result->result_array());
    //     return TRUE;
    // }
    // return FALSE;
    // echo "<pre>";
    // print_r($result->result_array());

    // $data = "yes";
    // $insert_user_stored_proc = "CALL `getUsername`(1)";
    // $result = $this->db->query($insert_user_stored_proc)->result_array();
    // return $result;
    // if ($result !== NULL) {
    //     return $result->result_array();
    // }
    // return FALSE;


    // $query = $this->db->query("SET @p0='yes';CALL `getUsername`(@p0)");
    // $query2 = $this->db->query("CALL `getUsername`(@p0)");
    // return $query->result_array();

    // $user = $this->db->get_where('masyarakat', ['username' => $username, 'password' => $password])->row_array();
    // if ($user) {
    //     echo ($user['username']);
    // }
    // }

    public function registration()
    {
        $this->form_validation->set_rules(
            'nik',
            'Nik',
            'required|trim|is_unique[masyarakat.nik]',
            [
                'is_unique' => 'NIK Sudah Terdaftar!',
            ]
        );
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim|is_unique[masyarakat.username]',
            [
                'is_unique' => 'This Email has already registered'
            ]
        );

        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[3]|matches[password2]',
            [
                'matches' => 'Password dont match!',
                'min_length' => 'Password too short!'
            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';
            $this->load->view('templates/auth/auth_header', $data);
            $this->load->view('templates/auth/auth_topbar');
            $this->load->view('auth/registration');
            $this->load->view('templates/auth/auth_footer');
        } else {
            $this->auth_model->regist();
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nik');
        $this->session->unset_userdata('level');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        You have been logged out!
      </div>');
        redirect('auth');
    }
}
