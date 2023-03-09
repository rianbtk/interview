<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asn_model extends CI_Model
{
	public function simpanAsn()
	{
		$data = [
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('tanggal_lahir')),
			'role' => 'asn',
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'nip' => $this->input->post('nip'),
			'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
			'agama' => $this->input->post('agama'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat'),
			'created_at' => date('Y-m-d h:i:s'),
			'updated_at' => date('Y-m-d h:i:s')
		];
		$this->db->insert('tb_user', $data);
	}
	public function ubahProfil()
	{
		$cekUser = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data = [
			'password' => $this->input->post('password') == null ? $cekUser['password'] : md5($this->input->post('password')),
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'nip' => $this->input->post('nip'),
			'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
			'agama' => $this->input->post('agama'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat'),
			'updated_at' => date('Y-m-d h:i:s')
		];
		$this->db->where('id', $this->session->userdata('id'));
		$this->db->update('tb_user', $data);
	}
}
