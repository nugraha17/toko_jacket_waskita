<?php

class M_auth extends CI_Model
{
    public function login_user($username, $password, $type = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where(array(
            'username' => $username,
            'password' => $password
        ));
				$cek = $this->db->get()->row();
				if($cek) {
					$id_pelanggan = $cek->id_user;
					$nama_pelanggan = $cek->nama_user;
					$email = $cek->username;
					$level_user = $cek->level_user;
					$this->session->set_userdata('id_admin', $id_pelanggan);
					$this->session->set_userdata('nama_admin', $nama_pelanggan);
					$this->session->set_userdata('username', $email);
					redirect('admin');
				}
				$this->session->set_flashdata('error','email atau password salah');
				if($type == 'pelanggan') {
					redirect('pelanggan/login');
				} else {
					redirect('auth/login_user');
				}
    }

    public function login_pelanggan($email, $password)
    {
        $this->db->select('*');
        $this->db->from('tbl_pelanggan');
        $this->db->where(array(
            'email' => $email,
            'password' => $password
        ));
        return $this->db->get()->row();
    }
}

?>
