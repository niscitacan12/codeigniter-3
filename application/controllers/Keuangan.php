<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
		$this->load->helper('my_helper');
        if ($this->session->userdata('logged_in') != true && $this->session->userdata('role') != 'keuangan') {
           redirect(base_url() . 'auth');
        }
	}

	public function index()
	{
		$this->load->view('keuangan/index');
	}

    // untuk pembayaran
    public function pembayaran()
    {
        $data['pembayaran'] = $this->m_model->get_data('pembayaran')->result();
        $this->load->view('keuangan/pembayaran', $data);
    }

    // untuk tambah pembayaran
    public function tambah_bayar()
    {
        $data['pembayaran'] = $this->m_model->get_data('pembayaran')->result();
        $data['siswa'] = $this->m_model->get_data('siswa')->result();
        $this->load->view('keuangan/tambah_bayar', $data);
    }

    // untuk aksi tambah pembayaran
    public function aksi_tambah_bayar()
	{
		$data = [
			'id_siswa'         => $this->input->post('id_siswa'),
			'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
			'total_pembayaran' => $this->input->post('total_pembayaran'),
			];
		$this->m_model->tambah_data('pembayaran', $data);
		redirect(base_url('Keuangan/pembayaran'));
	}

    // untuk ubah bayar
    public function ubah_bayar($id)
    {
        $data['pembayaran'] = $this->m_model->get_by_id('pembayaran', 'id_siswa', $id)->result();
        $this->load->view('keuangan/ubah_bayar', $data);
    }

}
?>    