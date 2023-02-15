<?php 

class Laporan extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('m_laporan');
        $this->load->model('m_admin');
    }

    public function index()
    {
        $data = array(
            'title' => 'Laporan Penjualan',
            'pesanan_masuk_notif' => $this->m_admin->pesanan_masuk_notif(),
            'isi'   => 'admin/laporan/v_laporan',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function lap_harian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Penjualan Harian',
            'pesanan_masuk_notif' => $this->m_admin->pesanan_masuk_notif(),
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_harian($tanggal, $bulan, $tahun),
            'isi'   => 'admin/laporan/v_lap_harian',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function lap_bulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Penjualan Bulanan',
            'pesanan_masuk_notif' => $this->m_admin->pesanan_masuk_notif(),
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_bulanan($bulan, $tahun),
            'isi'   => 'admin/laporan/v_lap_bulanan',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function lap_tahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Penjualan Bulanan',
            'pesanan_masuk_notif' => $this->m_admin->pesanan_masuk_notif(),
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_tahunan($tahun),
            'isi'   => 'admin/laporan/v_lap_tahunan',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
}


?>