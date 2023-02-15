<?php

class M_barang extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_barang');
        // $this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_barang.id_kategori','left');
        $this->db->order_by('id_barang','desc');
        return $this->db->get()->result();
    }

    public function get_data($id_barang)
    {
        $this->db->select('*');
        $this->db->from('tbl_barang');
        // $this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_barang.id_kategori','left');
        $this->db->where('id_barang', $id_barang);
        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('tbl_barang', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->update('tbl_barang', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->delete('tbl_barang', $data);
    }

    public function update_stock($id_transaksi){
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        $data_transaksi = $this->db->get()->row_array();
        // dd($data_transaksi);
        if(!empty($data_transaksi)){
            $this->db->select('*');
            $this->db->from('tbl_rinci_transaksi');
            $this->db->where('no_order', $data_transaksi['no_order']);
            $detail_transaksi = $this->db->get()->result_array();
            foreach($detail_transaksi as $trx){
                $this->db->select('*');
                $this->db->from('tbl_barang');
                $this->db->where('id_barang', $trx['id_barang']);
                $data_barang = $this->db->get()->row_array();

                $this->db->where('id_barang', $trx['id_barang']);
                if(strtoupper($trx['ukuran']) == 'S'){
                    $this->db->update('tbl_barang', ['stok_s' => $data_barang['stok_s'] - $trx['qty']]);
                } else if (strtoupper($trx['ukuran']) == 'M') {
                    $this->db->update('tbl_barang', ['stok_m' => $data_barang['stok_m'] - $trx['qty']]);
                } else if (strtoupper($trx['ukuran']) == 'L') {
                    $this->db->update('tbl_barang', ['stok_l' => $data_barang['stok_l'] - $trx['qty']]);
                } else if (strtoupper($trx['ukuran']) == 'XL') {
                    $this->db->update('tbl_barang', ['stok_xl' => $data_barang['stok_xl'] - $trx['qty']]);
                }
            }
        }

    }
    
}
?>
