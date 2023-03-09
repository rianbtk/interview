<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelajar_model extends CI_Model
{
	public function simpanPelajar()
	{
		$data = [
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'sekolah/kampus' => $this->input->post('sekolah/kampus'),
			'tahun_masuk' => $this->input->post('tahun_masuk'),
			'created_at' => date('Y-m-d h:i:s'),
			'updated_at' => date('Y-m-d h:i:s')
		];
		$this->db->insert('tb_data_pelajar', $data);
	}
	public function ubahPelajar($id_pelajar)
	{
		$data = [
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'sekolah/kampus' => $this->input->post('sekolah/kampus'),
			'tahun_masuk' => $this->input->post('tahun_masuk'),
			'updated_at' => date('Y-m-d h:i:s')
		];
		$this->db->where('id_pelajar', $id_pelajar);
		$this->db->update('tb_data_pelajar', $data);
	}
}
