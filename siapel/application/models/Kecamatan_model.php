<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kecamatan_model extends CI_Model
{
	public function simpanKecamatan()
	{
		$data = [
			'id_kec' => $this->input->post('id_kec'),
			'id_kab' => $this->input->post('id_kab'),
			'nama_kecamatan' => $this->input->post('nama_kecamatan')
		];
		$this->db->insert('tb_kecamatan', $data);
	}
	public function ubahKecamatan($id_kec)
	{
		$data = [
			'id_kec' => $this->input->post('id_kec'),
			'id_kab' => $this->input->post('id_kab'),
			'nama_kecamatan' => $this->input->post('nama_kecamatan')
		];
		$this->db->where('id_kec', $id_kec);
		$this->db->update('tb_kecamatan', $data);
	}
	public function hapusdata_kecamatan($id_kec)
    {
        $this->db->where('id_kec', $id_kec);
        $this->db->delete('id_kab', 'nama_kecamatan');
    }
}
