<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Magang_model extends CI_Model
{
	public function getMagang($magang_id = null)
	{
		$this->db->select('*');
		$this->db->from('tb_magang a');
		$this->db->join('tb_user b', 'b.id = a.asn_id');
		$this->db->join('tb_data_tahun_ajaran c', 'c.id_ta = a.ta_id');
		if ($this->session->userdata('role') == 'asn') {
			$this->db->where('a.asn_id', $this->session->userdata('id'));
		}
		if ($magang_id != null) {
			$this->db->where('a.id_magang', $magang_id);
		}
		return $this->db->get(); // tampilkan semua data
	}
	public function getMagangJob($magang_id)
	{
		$this->db->select('*');
		$this->db->from('tb_magang_job a');
		$this->db->join('tb_magang b', 'b.id_magang = a.magang_id');
		$this->db->join('tb_user c', 'c.id = b.asn_id');
		$this->db->join('tb_data_tahun_ajaran d', 'd.id_ta = b.ta_id');
		$this->db->join('tb_data_bidang e', 'e.id_job = a.job_id');
		if ($this->session->userdata('role') == 'asn') {
			$this->db->where('b.asn_id', $this->session->userdata('id'));
		}
		$this->db->where('a.magang_id', $magang_id);
		return $this->db->get()->result_array(); // tampilkan semua data
	}
	public function getMagangPelajar($magang_id)
	{
		$this->db->select('*');
		$this->db->from('tb_magang_pelajar a');
		$this->db->join('tb_magang b', 'b.id_magang = a.magang_id');
		$this->db->join('tb_user c', 'c.id = b.asn_id');
		$this->db->join('tb_data_tahun_ajaran d', 'd.id_ta = b.ta_id');
		$this->db->join('tb_data_pelajar e', 'e.id_pelajar = a.pelajar_id');
		if ($this->session->userdata('role') == 'asn') {
			$this->db->where('b.asn_id', $this->session->userdata('id'));
		}
		$this->db->where('a.magang_id', $magang_id);
		return $this->db->get()->result_array(); // tampilkan semua data
	}
	public function simpanMagang()
	{
		$data = [
			'asn_id' => $this->session->userdata('id'),
			'ta_id' => $this->input->post('ta_id'),
			'kelas' => $this->input->post('kelas'),
		];
		$this->db->insert('tb_magang', $data);
	}
	public function simpanmagangJob($job_id)
	{
		$data = [
			'magang_id' => $this->input->post('magang_id'),
			'job_id' => $job_id
		];
		$this->db->insert('tb_magang_job', $data);

		return ($this->db->affected_rows() != 1) ? false : true;
	}
	public function hapusmagangJob($job_id)
	{
		$this->db->delete('tb_magang_job', ['job_id' => $job_id, 'magang_id' => $this->input->post('magang_id')]);
	}
	public function simpanMagangPelajar($pelajar_id, $magang_id)
	{
		$this->db->trans_start();
		$data = [
			'magang_id' => $this->input->post('magang_id'),
			'pelajar_id' => $pelajar_id
		];
		$this->db->replace('tb_magang_pelajar', $data);

		// Insert Nilai 0 pada Pekerjaan
		$magangJobS = $this->db->get_where('tb_magang_job', ['magang_id' => $magang_id])->result_array();
		foreach ($magangJobS as $magangJob) {
			$data = [
				'magang_id' => $magang_id,
				'pelajar_id' => $pelajar_id,
				'job_id' => $magangJob['job_id'],
				'nilai' => 0
			];
			$this->db->insert('tb_nilai', $data); // Insert data nilai
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
		} else {
			$this->db->trans_commit();
		}
	}
	public function hapusMagangPelajar($pelajar_id)
	{
		$this->db->delete('tb_magang_pelajar', ['pelajar_id' => $pelajar_id, 'magang_id' => $this->input->post('magang_id')]);
	}
	public function lihatNilai($magang_id)
	{
		$this->db->select('*');
		$this->db->from('tb_nilai a');
		$this->db->join('tb_magang b', 'b.id_magang = a.magang_id');
		$this->db->join('tb_data_pelajar c', 'c.id_pelajar = a.pelajar_id');
		$this->db->join('tb_data_bidang d', 'd.id_job = a.job_id');
		if ($this->session->userdata('role') == 'asn') {
			$this->db->where('b.asn_id', $this->session->userdata('id'));
		}
		$this->db->where('a.magang_id', $magang_id);
		return $this->db->get()->result_array(); // tampilkan semua data
	}
	public function magangJobExcel($magang_id)
	{
	}
}
