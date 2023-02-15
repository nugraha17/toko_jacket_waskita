<?php

class Belanja extends CI_Controller

{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
        $this->load->model('m_barang');
    }

    public function index()
    {
        if (empty($this->cart->contents())) {
            redirect('home');
        }

        $data = array(
            'title' => 'Keranjang Belanja',
            'isi'   => 'v_belanja',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function add()
    {
        $redirect_page = $this->input->post('redirect_page');
		$barang = $this->m_barang->get_data($this->input->post('id'));
		if($_POST['qty'] > $barang->{'stok_'.strtolower($_POST['ukuran'])}) {
			$this->session->set_flashdata('error', 'Kuantity melebihi batas!');
			redirect($redirect_page, 'refresh');
		}

        foreach ($this->cart->contents() as $items) {
            if($items['ukuran'] == $this->input->post('ukuran') && $items['product_id'] == $this->input->post('id')){
                $this->cart->update([
                    'rowid' => $items['rowid'],
                    'qty' => $items['qty'] + $this->input->post('qty')
                ]);
				$this->session->set_flashdata('success', 'Keranjang Berhasil di Update!');
                redirect($redirect_page, 'refresh');
            }
        }

        $data = array(
            'id'            => rand(10000,99999),
            'product_id'    => $this->input->post('id'),
            'qty'           => $this->input->post('qty'),
            'ukuran'        => $this->input->post('ukuran'),
            'price'         => $this->input->post('price'),
            'name'          => $this->input->post('name'),
        );
        $this->cart->insert($data);
		$this->session->set_flashdata('success', 'Keranjang Berhasil di Update!');
        redirect($redirect_page, 'refresh');
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('belanja');
    }

    public function clear()
    {
        $this->cart->destroy();
        redirect('belanja');
    }

    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid' => $items['rowid'],
                'qty'   => $this->input->post($i . '[qty]'),
                //'ukuran'   => $this->input->post('ukuran'),
            );
            $this->cart->update($data);
            $i++;
        }
        $this->session->set_flashdata('pesan', 'Keranjang Berhasil di Update !');
        redirect('belanja');
    }

    public function cekout()
    {
        // dd($this->cart->contents());
        $this->pelanggan_login->proteksi_halaman();
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required', array(
            'required' => '%s Harus Di isi !!'
        ));
        $this->form_validation->set_rules('kota', 'Kota', 'required', array(
            'required' => '%s Harus Di isi !!'
        ));
        $this->form_validation->set_rules('expedisi', 'Expedisi', 'required', array(
            'required' => '%s Harus Di isi !!'
        ));
        $this->form_validation->set_rules('paket', 'Paket', 'required', array(
            'required' => '%s Harus Di isi !!'
        ));

        if ($this->form_validation->run() ==  FALSE) {
            $data = array(
                'title' => 'ChekOut Belanja',
                'isi'   => 'v_cekout',
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            $data = array(
                'id_pelanggan'  => $this->session->userdata('id_pelanggan'),
                'no_order'      => $this->input->post('no_order'),
                'tgl_order'     => date('Y-m-d'),
                'nama_penerima' => $this->input->post('nama_penerima'),
                'hp_penerima'   => $this->input->post('hp_penerima'),
                'provinsi'      => $this->input->post('provinsi'),
                'kota'          => $this->input->post('kota'),
                'alamat'        => $this->input->post('alamat'),
                'kode_pos'      => $this->input->post('kode_pos'),
                'expedisi'      => $this->input->post('expedisi'),
                'paket'         => $this->input->post('paket'),
                'estimasi'      => $this->input->post('estimasi'),
                'ongkir'        => $this->input->post('ongkir'),
                'berat'         => $this->input->post('berat'),
                'grand_total'   => $this->input->post('grand_total'),
                'total_bayar'   => $this->input->post('total_bayar'),
                'status_bayar'  => '0',
                'status_order'  => '0',
            );
            $this->m_transaksi->simpan_transaksi($data);
            //simpan ke tabel rinci transaksi
            $i = 1;
            foreach ($this->cart->contents() as $items) {
                $data_rinci= array(
                    'no_order'      => $this->input->post('no_order'),
                    'id_barang'     => $items['product_id'],
                    'qty'           => $items['qty'],
                    'ukuran'        => $items['ukuran']
                );
                $this->m_transaksi->simpan_rinci_transaksi($data_rinci);
            }
            
            $this->session->set_flashdata('pesan', 'Pesanan berhasil di proses');
            $this->cart->destroy();
            redirect('pesanan_saya');
        }
    }
}
