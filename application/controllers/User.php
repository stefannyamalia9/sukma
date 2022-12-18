<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('auth');
		}
	}
	public function index()
	{
		$data['users'] = $this->Model_User->get_user();

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$user_id = $data['user']['id_username'];
		$data['nama'] = $data['user']['namaUsaha'];

		$data['title'] = 'Data User';

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('user/index', $data);
		$this->load->view('template/footer');
	}

	public function tambah_user()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['nama'] = $data['user']['namaUsaha'];
		$data['title'] = 'Tambah Data User';

		$this->form_validation->set_rules(
			'username',
			'Username',
			'required|trim|is_unique[user.username]',
			[
				'required' => 'Username Tidak Boleh Kosong',
				'is_unique' => 'Username Telah Digunakan'
			]
		);

		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim|valid_email|is_unique[user.email]',
			[
				'required' => 'Email Tidak Boleh Kosong',
				'is_unique' => 'Email Telah Digunakan',
				'valid_email' => 'Alamat email tidak valid',
			]
		);

		$this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'required|trim', [
			'required' => 'Nama Usaha Tidak Boleh Kosong'
		]);

		$this->form_validation->set_rules(
			'password',
			'Password',
			'required|trim|min_length[6]|matches[password2]',
			[
				'required' => 'Password Tidak Boleh Kosong',
				'matches' => 'Konfirmasi Password Salah',
				'min_length' => 'Minimal Password 6 Karakter'
			]
		);

		$this->form_validation->set_rules(
			'password2',
			'Password',
			'required|trim'
		);

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('user/tambah_user', $data);
			$this->load->view('template/footer');
		} else {
			$this->Model_User->tambah_user();
			$this->session->set_flashdata('pesan', 'Tambah User');
			redirect('user');
		}
	}

	public function update_user($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['nama'] = $data['user']['namaUsaha'];

        $data['title'] = 'Update User';
        $data['user'] = $this->Model_User->ambil_user($id);

		$this->form_validation->set_rules(
			'username',
			'Username',
			'required|trim',
			[
				'required' => 'Username Tidak Boleh Kosong',
			]
		);

		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim|valid_email',
			[
				'required' => 'Email Tidak Boleh Kosong',
				'valid_email' => 'Alamat email tidak valid',
			]
		);

		$this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'required|trim', [
			'required' => 'Nama Usaha Tidak Boleh Kosong'
		]);

		$this->form_validation->set_rules(
			'password',
			'Password',
			'trim|min_length[6]|matches[password2]',
			[
				'required' => 'Password Tidak Boleh Kosong',
				'matches' => 'Konfirmasi Password Salah',
				'min_length' => 'Minimal Password 6 Karakter'
			]
		);

		$this->form_validation->set_rules(
			'password2',
			'Password',
			'trim'
		);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('user/update_user', $data);
            $this->load->view('template/footer');
        } else {
            $this->Model_User->update_user($id);
            $this->session->set_flashdata('pesan', 'Update user');
            redirect('user');
        }
    }

	// Hapus Produk
	public function hapus_user($id)
	{
		$this->Model_User->hapus_user($id);
		$this->session->set_flashdata('pesan', 'Hapus User');
		redirect('user');
	}
}
