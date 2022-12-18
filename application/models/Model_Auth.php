<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Auth extends CI_Model
{
	public function registrasi()
	{
		$data = [
			"username" => htmlspecialchars($this->input->post('username')),
			"email" => htmlspecialchars($this->input->post('email')),
			"namaUsaha" => htmlspecialchars($this->input->post('namaUsaha')),
			"password" => htmlspecialchars(password_hash($this->input->post('password1'), PASSWORD_DEFAULT))
		];
		$this->db->insert('user', $data);
	}

	public function cek_email($email)
	{
		$sql = "select * from user where email = '".$email."' ";
		return $this->db->query($sql)->num_rows();

	}

	public function reset_password($email, $password)
	{
		$this->db->where('email', $email);
		$up = $this->db->update('user', [
			'password' => htmlspecialchars(password_hash($this->input->post('password'), PASSWORD_DEFAULT))
		]);

		return $up;
	}
}
