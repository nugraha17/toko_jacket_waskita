<?php

class Home extends CI_Controller

{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
    }

    public function index()
    {
        $data = array(
            'title' => 'Home',
            'barang' => $this->m_home->get_all_data(),
            'isi'   => 'v_home', 
        );
        $this->load->view('layout/v_wrapper_frontend',$data, FALSE);
    }

    public function cara_beli()
    {
        $data = array(
            'title' => 'Cara Beli',
            'isi'   => 'v_cara_beli', 
        );
        $this->load->view('layout/v_wrapper_frontend',$data, FALSE);
    }

    public function kontak()
    {
        $data = array(
            'title' => 'Kontak',
            'isi'   => 'v_kontak', 
        );
        $this->load->view('layout/v_wrapper_frontend',$data, FALSE);
    }
    public function detail_barang($id_barang)
    {
        
        $data = array(
            
            'title' => 'Detail Barang',
            'gambar' => $this->m_home->gambar_barang($id_barang),
            'barang' => $this->m_home->detail_barang($id_barang),
            'isi'   => 'v_detail_barang', 
        );
        $this->load->view('layout/v_wrapper_frontend',$data, FALSE);
    }
}

?>
