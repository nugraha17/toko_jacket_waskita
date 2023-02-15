<?php

class M_admin extends CI_Model
{
    public function total_barang(){
        return $this->db->get('tbl_barang')->num_rows();
    }

    public function total_kategori(){
        return $this->db->get('tbl_kategori')->num_rows();
    }

    public function total_pelanggan(){
        return $this->db->get('tbl_user')->num_rows();
    }
    
    public function pesanan_masuk_notif()
    {
        $this->db->where('status_bayar=0');
        return $this->db->get('tbl_transaksi')->num_rows();   
    }

    public function pesanan_proses()
    {
        $this->db->where('status_order=1');
        return $this->db->get('tbl_transaksi')->num_rows();   
    }

    public function pesanan_kirim()
    {
        $this->db->where('status_order=2');
        return $this->db->get('tbl_transaksi')->num_rows();   
    }

    public function pesanan_selesai()
    {
        $this->db->where('status_order=3');
        return $this->db->get('tbl_transaksi')->num_rows();   
    }

    public function data_setting()
    {
        $this->db->select('*');
        $this->db->from('tbl_setting');
        $this->db->where('id', 1);
        return $this->db->get()->row();

    }

    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('tbl_setting', $data);
    }

    
}



?>