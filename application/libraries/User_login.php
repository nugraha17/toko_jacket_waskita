<?php

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($username, $password)
    {
        $cek= $this->ci->m_auth->login_user($username, $password);
        if ($cek) {
            $password = $cek->password;
            $username = $cek->username;
            
            //session
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('password', $password);
            
            redirect('admin');
        }else{
            $this->ci->session->set_flashdata('error','username atau password salah');
            redirect('auth/login_user');
        }
    }


    public function logout()
    {
        $this->ci->session->set_userdata('username');
        $this->ci->session->set_userdata('nama_user');
        $this->ci->session->set_userdata('level_user');
        $this->ci->session->set_flashdata('pesan', 'Anda berhasil Logout !');
        redirect('auth/login_user');
    }

}
