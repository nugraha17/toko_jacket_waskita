<?php

class M_home extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_barang');
        $this->db->order_by('id_barang','desc');
        return $this->db->get()->result();
    }

    public function detail_barang($id_barang)
    {
        $this->db->select('*');
        $this->db->from('tbl_barang');
        $this->db->where('id_barang', $id_barang);
        return $this->db->get()->row();
    }

    public function gambar_barang($id_barang)
    {
        $this->db->select('*');
        $this->db->from('tbl_gambar');
        $this->db->where('id_barang', $id_barang);
        return $this->db->get()->result();
    }
}

?>
