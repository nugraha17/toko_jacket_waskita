<?php

class Pelanggan_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($email, $password)
    {
        $cek= $this->ci->m_auth->login_pelanggan($email, $password);
        if ($cek) {
            $id_pelanggan = $cek->id_pelanggan;
            $nama_pelanggan = $cek->nama_pelanggan;
            $email = $cek->email;
            $level_user = $cek->level_user;
            //session
            $this->ci->session->set_userdata('id_pelanggan', $id_pelanggan);
            $this->ci->session->set_userdata('nama_pelanggan', $nama_pelanggan);
            $this->ci->session->set_userdata('email', $email);
            redirect('home');
        }else{
						$cek = $this->ci->m_auth->login_user($email, $password, 'pelanggan');
						if($cek) {
							$id_pelanggan = $cek->id_user;
							$nama_pelanggan = $cek->nama_user;
							$email = $cek->username;
							$level_user = $cek->level_user;
							$this->ci->session->set_userdata('id_admin', $id_pelanggan);
							$this->ci->session->set_userdata('nama_admin', $nama_pelanggan);
							$this->ci->session->set_userdata('username', $email);
							redirect('admin');
						}
            
						$this->ci->session->set_flashdata('error','email atau password salah');
            redirect('pelanggan/login');
        }
    }

    public function proteksi_halaman()
    {
        if($this->ci->session->userdata('nama_pelanggan') == ''){
            $this->ci->session->set_flashdata('error', 'Anda belum Login !');
            redirect('pelanggan/login');
        }
    }

    public function logout()
    {
        $this->ci->session->set_userdata('id_pelanggan');
        $this->ci->session->set_userdata('nama_pelanggan');
        $this->ci->session->set_userdata('email');
        $this->ci->session->set_flashdata('pesan', 'Anda berhasil Logout !');
        redirect('pelanggan/login');
    }

}
