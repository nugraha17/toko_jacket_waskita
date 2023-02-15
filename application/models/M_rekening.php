<?php

class M_rekening extends CI_Model
{

    public function rekening()
    {
        $this->db->select('*');
        $this->db->from('tbl_rekening');
        $this->db->order_by('id_rekening','desc');
        return $this->db->get()->result();
    }

    public function edit_rekening($data)
    {
        $this->db->where('id_rekening', $data['id_rekening']);
        $this->db->update('tbl_rekening', $data);
    }

    public function add($data)
    {
        $this->db->insert('tbl_rekening', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_rekening', $data['id_rekening']);
        $this->db->delete('tbl_rekening', $data);
    }

}
?>