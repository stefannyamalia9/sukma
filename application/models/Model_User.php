<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_User extends CI_Model
{
	public function get_user()
	{
		return $this->db->get('user')->result_array();
	}

	// Tambah Produk
	public function tambah_user()
	{
		$data = [
			'username' 	=> htmlspecialchars($this->input->post('username')),
			'email' 	=> htmlspecialchars($this->input->post('email')),
			'tipe' 		=> 'user',
			'namaUsaha' => htmlspecialchars($this->input->post('nama_usaha')),
			'password' 	=> htmlspecialchars(password_hash($this->input->post('password'), PASSWORD_DEFAULT)),
		];

		$this->db->insert('user', $data);
	}

	// Hapus Produk

	public function hapus_user($id)
	{
		$this->db->where('id_username', $id);
		$this->db->delete('user');
	}

	public function ambil_user($id)
    {
        $query = "SELECT * FROM user WHERE id_username = $id";
        return $this->db->query($query)->row_array();
    }

	public function update_user($id)
	{
		$data = [
			'username' 	=> htmlspecialchars($this->input->post('username')),
			'email' 	=> htmlspecialchars($this->input->post('email')),
			'namaUsaha' => htmlspecialchars($this->input->post('nama_usaha')),
		];

		if($_POST['password']){
			$data['password'] = htmlspecialchars(password_hash($this->input->post('password'), PASSWORD_DEFAULT));
		}

		$this->db->where('id_username', $id);
		$this->db->update('user', $data);
	}
}
