<?php
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    } else {
        $level = $ci->session->userdata('level');
        $akses = $ci->uri->segment(1);
        if ($level == "petugas") {
            echo ('petugas');
            if ($akses <> "admin") {
                redirect('auth/blocked');
            }
        } elseif ($level == "admin") {
            if ($akses <> "admin") {
                redirect('auth/blocked');
            }
        } else{
            if ($akses <> "user") {
                redirect('auth/blocked');
            }
        }
    }
}