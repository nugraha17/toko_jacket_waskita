<?php

class Rekening extends CI_Controller
{

    public function __construct()
    {
        
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_rekening');
    }

    public function index()
    {
        $data = array(
            'title' => 'Rekening',
            'pesanan_masuk_notif' => $this->m_admin->pesanan_masuk_notif(),
            'rekening' => $this->m_rekening->rekening(),
            'isi'   => 'admin/v_rekening', 
        );
        $this->load->view('layout/v_wrapper_backend',$data, FALSE);
    }

    public function edit_rekening($id_rekening  = NULL)
    {
        $data = array(
            'id_rekening'   => $id_rekening,
            'nama_bank'     => $this->input->post('nama_bank'),
            'no_rek'        => $this->input->post('no_rek'),
            'atas_nama'     => $this->input->post('atas_nama'),
        );
        $this->m_rekening->edit_rekening($data);
        $this->session->set_flashdata('pesan','Data Berhasil di edit !');
        redirect('rekening');
    }

    public function add()
    {
        $data = array(
            'nama_bank'     => $this->input->post('nama_bank'),
            'no_rek'        => $this->input->post('no_rek'),
            'atas_nama'     => $this->input->post('atas_nama'),
        );
        $this->m_rekening->add($data);
        $this->session->set_flashdata('pesan','Data Berhasil ditambahkan !');
        redirect('rekening');
    }

    public function delete ($id_rekening = NULL)
    {
        $data=array('id_rekening' => $id_rekening);
        $this->m_rekening->delete($data);
        $this->session->set_flashdata('pesan','Data Berhasil di Hapus !');
        redirect('rekening');
    }
}