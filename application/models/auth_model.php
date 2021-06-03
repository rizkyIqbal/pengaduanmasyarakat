<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $level1 = "user";
        $level2 = "petugas";
        // $level3 = "petugas";

        $user = $this->db->get_where('masyarakat', ['username' => $username])->row_array();
        $user2 = $this->db->get_where('petugas', ['username' => $username])->row_array();

        if ($user !== NULL) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'nik' => $user['nik'],
                    $level1 => $user['level']
                ];
                $this->session->set_userdata($data);
                redirect('user');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Wrong Password!
          </div>');
                redirect('auth');
            }
        } else {
            if ($user2 !== NULL) {
                $data2 = [
                    'username' => $user2['username'],
                    'level' => $user2['level'],
                    'posisi' => $user2['posisi'],
                ];
                $this->session->set_userdata($data2);
                if ($user2['level'] == "petugas") {
                    redirect('admin');
                } else {
                    redirect('admin');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Akun Tidak Terdaftar!
          </div>');
                redirect('auth');
            }
        }
    }

    public function regist()
    {
        $level = "user";
        $data = [
            'nik' => htmlspecialchars($this->input->post('nik', true)),
            'nama' => htmlspecialchars($this->input->post('name', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'telp' => htmlspecialchars($this->input->post('telp', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'level' => $level,
        ];

        $this->db->insert('masyarakat', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Congratulations! Your account has been created. 
        Please Login
      </div>');
        redirect('auth');
    }
}
