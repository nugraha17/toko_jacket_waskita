<?php

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_barang');
        $this->load->model('m_admin');
    }

    public function index()
    {
        $data = array(
            'title' => 'Barang',
            'pesanan_masuk_notif' => $this->m_admin->pesanan_masuk_notif(),
            'barang' => $this->m_barang->get_all_data(),
            'isi'   => 'admin/barang/v_barang',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function add()
    {

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', array('required' => '%s Harus Di Isi !!'));
        $this->form_validation->set_rules('harga', 'Harga', 'required', array('required' => '%s Harus Di Isi !!'));
        $this->form_validation->set_rules('total_stok', 'Stok', 'required', array('required' => '%s Harus Di Isi !!'));
        $this->form_validation->set_rules('berat', 'Berat', 'required', array('required' => '%s Harus Di Isi !!'));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array('required' => '%s Harus Di Isi !!'));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '3000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Add Barang',
                    'error_upload' => $this->upload->display_errors(),
                    'isi'   => 'admin/barang/v_add',
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_barang' => $this->input->post('nama_barang'),
                    'harga' => $this->input->post('harga'),
                    'total_stok' => $this->input->post('total_stok'),
                    'stok_s' => $this->input->post('stok_s'),
                    'stok_m' => $this->input->post('stok_m'),
                    'stok_l' => $this->input->post('stok_l'),
                    'stok_xl' => $this->input->post('stok_xl'),
                    'berat' => $this->input->post('berat'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['uploads']['file_name']
                );
                $this->m_barang->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil ditambahkan !');
                redirect('barang');
            }
        }

        $data = array(
            'title' => 'Add Barang',
            'pesanan_masuk_notif' => $this->m_admin->pesanan_masuk_notif(),
            'isi'   => 'admin/barang/v_add',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function edit($id_barang = NULL)
    {


        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', array('required' => '%s Harus Di Isi !!'));
        $this->form_validation->set_rules('harga', 'Harga', 'required', array('required' => '%s Harus Di Isi !!'));
        $this->form_validation->set_rules('total_stok', 'Stok', 'required', array('required' => '%s Harus Di Isi !!'));
        $this->form_validation->set_rules('berat', 'Berat', 'required', array('required' => '%s Harus Di Isi !!'));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array('required' => '%s Harus Di Isi !!'));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '3000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Edit Barang',
                    'barang' => $this->m_barang->get_data($id_barang),
                    'error_upload' => $this->upload->display_errors(),
                    'isi'   => 'admin/barang/v_edit',
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            } else {
                //hapus gambar
                $barang = $this->m_barang->get_data($id_barang);
                if ($barang->gambar != "") {
                    unlink('./assets/gambar/' . $barang->gambar);
                }
                //end hapus gambar

                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_barang' => $id_barang,
                    'nama_barang' => $this->input->post('nama_barang'),
                    'harga'       => $this->input->post('harga'),
                    'total_stok' => $this->input->post('total_stok'),
                    'stok_s' => $this->input->post('stok_s'),
                    'stok_m' => $this->input->post('stok_m'),
                    'stok_l' => $this->input->post('stok_l'),
                    'stok_xl' => $this->input->post('stok_xl'),
                    'berat' => $this->input->post('berat'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['uploads']['file_name']
                );
                $this->m_barang->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit !');
                redirect('barang');
            }
            //jika tanpa ganti gambar
            $data = array(
                'id_barang' => $id_barang,
                'nama_barang' => $this->input->post('nama_barang'),
                'harga' => $this->input->post('harga'),
                'total_stok' => $this->input->post('total_stok'),
                'stok_s' => $this->input->post('stok_s'),
                'stok_m' => $this->input->post('stok_m'),
                'stok_l' => $this->input->post('stok_l'),
                'stok_xl' => $this->input->post('stok_xl'),
                'berat' => $this->input->post('berat'),
                'berat' => $this->input->post('berat'),
                'deskripsi' => $this->input->post('deskripsi'),
            );
            $this->m_barang->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit !');
            redirect('barang');
        }

        $data = array(
            'title' => 'Edit Barang',
            'pesanan_masuk_notif' => $this->m_admin->pesanan_masuk_notif(),
            'barang' => $this->m_barang->get_data($id_barang),
            'isi'   => 'admin/barang/v_edit',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function delete($id_barang = NULL)
    {

        //hapus gambar
        $barang = $this->m_barang->get_data($id_barang);
        if ($barang->gambar != "") {
            unlink('./assets/gambar/' . $barang->gambar);
        }
        //end hapus gambar

        $data = array('id_barang' => $id_barang);
        $this->m_barang->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil di Delete !');
        redirect('barang');
    }
}
