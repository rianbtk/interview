<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TugasPekerjaan_model extends CI_Model
{
	public function simpanTugasPekerjaan()
	{
		$data = [
			'kode_tugas' => $this->input->post('kode_tugas'),
			'bidang_diminati' => $this->input->post('bidang_diminati'),
			'created_at' => date('Y-m-d h:i:s'),
			'updated_at' => date('Y-m-d h:i:s')
		];
		$this->db->insert('tb_data_bidang', $data);
	}
	public function ubahTugasPekerjaan($id_job)
	{
		$data = [
			'kode_tugas' => $this->input->post('kode_tugas'),
			'bidang_diminati' => $this->input->post('bidang_diminati'),
			'updated_at' => date('Y-m-d h:i:s')
		];
		$this->db->where('id_job', $id_job);
		$this->db->update('tb_data_bidang', $data);
	}
}
