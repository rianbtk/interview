<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Desa_model extends CI_Model
{
	public function simpandesa()
	{
		$data = [
			'id_kel' => $this->input->post('id_kel'),
			'id_kab' => $this->input->post('id_kab'),
			'nama_desa' => $this->input->post('nama_desa')
		];
		$this->db->insert('tb_kelurahan', $data);
	}
	public function ubahdesa($id_kel)
	{
		$data = [
			'id_kel' => $this->input->post('id_kel'),
			'id_kab' => $this->input->post('id_kab'),
			'nama_desa' => $this->input->post('nama_desa')
		];
		$this->db->where('id_kel', $id_kel);
		$this->db->update('tb_kelurahan', $data);
	}
	public function hapusdata_desa($id_kel)
    {
        $this->db->where('id_kel', $id_kel);
        $this->db->delete('id_kab', 'nama_desa');
    }
}
