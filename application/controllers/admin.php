<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{

    function __construct()
    {
        parent::  __construct();
		$this->load->model('m_model');
		$this->load->helper('my_helper');
        $this->load->library('upload');
        if ($this->session->userdata('logged_in')!=true) {
            redirect(base_url().'auth');
        }  
    }

    public function index()
    {
        $data['siswa'] = $this->m_model->get_data('siswa')->num_rows();
        $data['mapel'] = $this->m_model->get_data('mapel')->num_rows();
        $data['kelas'] = $this->m_model->get_data('kelas')->num_rows();
        $data['guru'] = $this->m_model->get_data('guru')->num_rows();
        $this->load->view('admin/index', $data);
    }

    // upload image
    public function upload_image($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './images/siswa/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '30000';
        $config['file_name'] = $kode;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($value)) {
            return array( false, '');
        } else {
            $fn = $this->upload->data();
            $nama = $fn['file_name'];
            return array( true, $nama );
        }
    }

    public function siswa()
    {
        $data['siswa'] = $this->m_model->get_data('siswa')->result();
        $this->load->view('admin/siswa', $data);
    }

    public function guru()
    {
        $data['guru'] = $this->m_model->get_data('guru')->result();
        $this->load->view('admin/guru', $data);
    }
   
    public function tambah_siswa()
    {
        $data['kelas'] = $this->m_model->get_data('kelas')->result();
        $this->load->view('admin/tambah_siswa', $data);
    }
    
    public function aksi_tambah_siswa()
    {
        $foto = $this->upload_image('foto');
      if ($foto[0] == false) {
        $data = [
            'foto' => 'user.png',
            'nama_siswa' => $this->input->post('nama'),
            'nisn' => $this->input->post('nisn'),
            'gender' => $this->input->post('gender'),
            'id_kelas' => $this->input->post('id_kelas'),
        ];
        $this->m_model->tambah_data('siswa', $data);
        redirect(base_url('admin/siswa'));
      } else {
        $data = [
            'foto' => $foto[1],
            'nama_siswa' => $this->input->post('nama'),
            'nisn' => $this->input->post('nisn'),
            'gender' => $this->input->post('gender'),
            'id_kelas' => $this->input->post('id_kelas'),
        ];
        $this->m_model->tambah_data('siswa', $data);
        redirect(base_url('admin/siswa'));
      }
      
    }


    public function tambah_guru()
    {
        $data['guru'] = $this->m_model->get_data('guru')->result();
        $this->load->view('admin/tambah_guru', $data);    
    }
    
    public function aksi_tambah_guru() 
    { 
        $data=[ 
            'nama_guru' => $this->input->post('nama'), 
            'nik' => $this->input->post('nik'), 
            'gender' => $this->input->post('gender'), 
        ]; 
        $this->m_model->tambah_data('guru', $data); 
        redirect(base_url('admin/guru'));
    }
    

    public function update_siswa($id)
    {
        $data['siswa'] = $this->m_model
            ->get_by_id('siswa', 'id_siswa', $id)
            ->result();
        $data['kelas'] = $this->m_model->get_data('kelas')->result();
        $this->load->view('admin/update_siswa', $data);
    }

    
    public function update_guru($id)
    {
        $data['guru'] = $this->m_model->get_by_id('guru', 'id', $id)->result();
        $data['guru'] = $this->m_model->get_data('guru')->result();
        $this->load->view('admin/update_guru', $data);
    }
    
    public function aksi_update_siswa()
    {
        $data = array (
            'nama_siswa' => $this->input->post('nama'),
            'nisn' => $this->input->post('nisn'),
            'gender' => $this->input->post('gender'),
            'id_kelas' => $this->input->post('kelas'),
        );
    
        $eksekusi = $this->m_model->ubah_data(
            'siswa',
            $data,
            array('id_siswa' => $this->input->post('id_siswa'))
        );
    
        if ($eksekusi)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('admin/siswa'));
        }

    // hapus 
	public function hapus_siswa($id)
	{
		$this->m_model->delete('siswa', 'id_siswa', $id);
		redirect(base_url('admin/siswa'));
	}

    // akun
    public function akun()
    {
       $data['user']=$this->m_model->get_by_id('admin', 'id', $this->session->userdata('id'))->result();
       $this->load->view('admin/akun', $data); // Anda harus menambahkan titik koma di sini
    }

    public function aksi_ubah_akun()
    {
        $password_baru = $this->input->post('password_baru');
        $konfirmasi_password = $this->input->post('konfirmasi_password');
        $email = $this->input->post('email');
        $username = $this->input->post('username');

        // data yang akan diubah
        $data = array(
            'email' => $email,
            'username' => $username,
        );

        // untuk password baru
        if (!empty($password_baru)) {
            if ($password_baru === $konfirmasi_password) {
                $data['password'] = md5($password_baru);
            } else {
                $this->session->set_flashdata('message', 'password baru dan konfirmasi password harus sama');
                redirect(base_url('admin/akun'));
            }
        }

        // untuk pembaruan data
        $this->session->set_userdata($data);
        $update_result = $this->m_model->ubah_data('admin', $data, array('id' => $this->session->userdata('id')));

        if ($update_result) {
            redirect(base_url('admin/akun'));
        } else {
            redirect(base_url('admin/akun'));
        }
    }

  }
}
?>
        