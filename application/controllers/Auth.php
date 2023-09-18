<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
		$this->load->helper('my_helper');
	}

	public function index()
	{
		$this->load->view('auth/login');
	}

	public function aksi_login()
	{
		$email = $this->input->post('email', true);
		$password = $this->input->post('password', true);
		$data = [ 'email' => $email, ];
		$query = $this->m_model->getwhere('admin', $data);
		$result = $query->row_array();

		if (!empty($result) && md5($password) === $result['password']) {
			$data = [
				'logged_in' => TRUE,
				'email' => $result['email'],
				'username' => $result['username'],
				'role' => $result['role'],
				'id' => $result['id'],
			];
			$this->session->set_userdata($data);
			if ($this->session->userdata('role') == 'admin') {
				redirect(base_url()."admin");
			} else {
				redirect(base_url()."auth");
			}
		} else {
			redirect(base_url()."auth");
		}
	}

	function logout() {
		$this->session->sess_destroy(); // Menggunakan sess_destroy() untuk mengakhiri sesi
		redirect(base_url('auth'));
	}
	public function register()
    {
        $this->load->view('auth/register');
    }

    public function aksi_register()
    {
        $email = $this->input->post('email', true);
        $username = $this->input->post('username', true);
        $password = md5($this->input->post('password', true));
        $role = 'admin'; // Sesuaikan dengan role yang diinginkan

        $data = [
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'role' => $role,
        ];

        // Simpan data ke database
        $this->m_model->tambah_data('admin', $data);

        redirect(base_url() . 'auth/login');
    }
	
}