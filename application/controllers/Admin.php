<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        
        parent::__construct();
				$user = $this->session->userdata('username');
				if(!$user) {
					redirect('auth/login_user');
				}
        $this->load->model('m_admin');
        $this->load->model('m_pesanan_masuk');
        $this->load->model('m_barang');
    }

    public function index()
    {
        $data = array(
            'title' => 'Admin',
            'pesanan_masuk_notif' => $this->m_admin->pesanan_masuk_notif(),
            'pesanan_proses' => $this->m_admin->pesanan_proses(),
            'pesanan_kirim' => $this->m_admin->pesanan_kirim(),
            'pesanan_selesai' => $this->m_admin->pesanan_selesai(),
            'total_barang' => $this->m_admin->total_barang(),
            'isi'   => 'admin/v_admin',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
    

    public function setting()
    {
        $this->form_validation->set_rules('nama_toko', 'nama toko', 'required', array('required' => '%s Harus Di Isi !!'));
        $this->form_validation->set_rules('kota', 'Kota', 'required', array('required' => '%s Harus Di Isi !!'));
        $this->form_validation->set_rules('alamat_toko', 'Alamat Toko', 'required', array('required' => '%s Harus Di Isi !!'));
        $this->form_validation->set_rules('no_telpon', 'No Telpon', 'required', array('required' => '%s Harus Di Isi !!'));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Setting',
                'pesanan_masuk_notif' => $this->m_admin->pesanan_masuk_notif(),
                'setting' => $this->m_admin->data_setting(),
                'isi'    => 'admin/v_setting',
            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
        }else {
            $data = array( 
                'id'    => 1,
                'lokasi'    => $this->input->post('kota'),
                'nama_toko' => $this->input->post('nama_toko'),
                'alamat_toko'  => $this->input->post('alamat_toko'),
                'no_telpon'  => $this->input->post('no_telpon'),
            );
            $this->m_admin->edit($data);
            $this->session->set_flashdata('pesan','Settingan Berhasil di Ganti !');
            redirect('admin/setting');
        }
    }

    public function pesanan_masuk()
    {
        $data = array(
            'title' => 'Pesanan Masuk',
            'pesanan' => $this->m_pesanan_masuk->pesanan(),
            'pesanan_masuk_notif' => $this->m_admin->pesanan_masuk_notif(),
            'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
            'pesanan_dikirim' => $this->m_pesanan_masuk->pesanan_dikirim(),
            'pesanan_selesai' => $this->m_pesanan_masuk->pesanan_selesai(),
            'isi'   => 'admin/v_pesanan_masuk',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function proses($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => '1'
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan','Pesanan Berhasil Di Proses/Dikemas');
        redirect('admin/pesanan_masuk');
    }

    public function kirim($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'no_resi' => $this->input->post('no_resi'),
            'status_order' => '2'
        );
        // dd($id_transaksi);
        $this->m_barang->update_stock($id_transaksi);
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan','Pesanan Berhasil Di Kirim');
        redirect('admin/pesanan_masuk');
    }
}
