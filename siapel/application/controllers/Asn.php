<?php
defined('BASEPATH') or exit('No direct script access allowed');
// memanggil autoload library phpoffice
require('./application/third_party/phpoffice/vendor/autoload.php');

// Memanggil namespace class yang berada di library phpoffice
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class asn extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// Load Model
		// Parameter pertama load file model, Parameter kedua adalah nama alias dari model parameter pertama
		$this->load->model('Asn_model', 'asn_m');
		$this->load->model('Magang_model', 'magang_m');
		is_logged_not_in(); // Jika sudah login, lalu mengakses halaman login maka tidak akan bisa dan akan d alihkan ke halaman asn
	}
	public function index()
	{
		$data = [
			'judul' => 'Asn | Home',
			'viewUtama' => 'asn/contents/index',
			'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(), // cek user yang login berdasarkan session username,
		];
		$this->load->view('asn/layouts/wrapperIndex', $data);
	}
	public function profil()
	{
		// Parameter pertama untuk name input, Parameter kedua bebas, Parameter ketiga aturan input
		$this->form_validation->set_rules('nama', 'Nama', 'required|max_length[25]');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('nip', 'NIP', 'required|numeric|max_length[20]');
		$this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan', 'required|max_length[25]');
		$this->form_validation->set_rules('agama', 'Agama', 'required|max_length[25]');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required|numeric|max_length[13]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[100]');
		$this->form_validation->set_rules('password', 'Password', 'min_length[5]');

		// Jika validasi gagal, akan muncul error di input dan kembali ke halaman profil
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'asn | Tambah magang',
				'viewUtama' => 'asn/contents/profil',
				'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			];
			$this->load->view('asn/layouts/wrapperForm', $data);
			// Jika validasi tidak gagal
		} else {
			$this->asn_m->ubahProfil();
			$this->session->set_flashdata('success', 'Profil berhasil diubah.'); // Membuat pesan notif jika insert data berhasil
			redirect('asn/profil'); // redirect ke halaman profil
		}
	}
	public function magang()
	{
		$data = [
			'judul' => 'asn | magang',
			'viewUtama' => 'asn/contents/magang',
			'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(), // cek user yang login berdasarkan session username,
			'magangS' => $this->magang_m->getMagang()->result_array()
		];
		$this->load->view('asn/layouts/wrapperData', $data);
	}
	public function add_magang()
	{
		// Parameter pertama untuk name input, Parameter kedua bebas, Parameter ketiga aturan input
		$this->form_validation->set_rules('ta_id', 'Tahun Ajaran', 'required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required|max_length[6]');

		// Jika validasi gagal, akan muncul error di input dan kembali ke halaman magang
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'asn | Tambah magang',
				'viewUtama' => 'asn/contents/form_magang',
				'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
				'tahun_ajaranS' => $this->db->get('tb_data_tahun_ajaran')->result_array()
			];
			$this->load->view('asn/layouts/wrapperForm', $data);
			// Jika validasi tidak gagal
		} else {
			$this->magang_m->simpanMagang(); // Insert data magang
			$this->session->set_flashdata('success', 'Data berhasil dibuat.'); // Membuat pesan notif jika insert data berhasil
			redirect('asn/magang'); // redirect ke halaman magang
		}
	}
	public function hapus($id_magang)
	{
		$this->db->delete('tb_magang', ['id_magang' => $id_magang]);
		$this->session->set_flashdata('success', 'magang berhasil dihapus.'); // Membuat pesan notif jika insert data berhasil
		redirect('asn/magang'); // redirect ke halaman magang
	}
	public function job($magang_id)
	{
		$data = [
			'judul' => 'asn | Pekerjaan',
			'viewUtama' => 'asn/contents/job',
			'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(), // cek user yang login berdasarkan session username,
			'bidang_diminatiS' => $this->db->get('tb_data_bidang')->result_array(),
			'magangJobS' => $this->magang_m->getMagangJob($magang_id),
			'magang_id' => $magang_id
		];
		$this->load->view('asn/layouts/wrapperData', $data);
	}
	public function add_job($job_id)
	{
		$magang_id = $this->input->post('magang_id');

		if ($this->magang_m->simpanmagangJob($job_id) == false) { // Insert data magang
			$this->session->set_flashdata('error', 'Pekerjaan sudah dimasukkan'); // Membuat pesan notif jika insert data berhasil
			redirect('asn/job/' . $magang_id); // redirect ke halaman magang
		}
		$this->session->set_flashdata('success', 'Pekerjaan berhasil dibuat'); // Membuat pesan notif jika insert data berhasil
		redirect('asn/job/' . $magang_id); // redirect ke halaman magang
	}
	public function remove_job($job_id)
	{
		$magang_id = $this->input->post('magang_id');

		$this->magang_m->hapusmagangJob($job_id); // Delete data magang
		$this->session->set_flashdata('success', 'Pekerjaan berhasil dihapus'); // Membuat pesan notif jika delete data berhasil
		redirect('asn/job/' . $magang_id); // redirect ke halaman magang
	}
	public function pelajar($magang_id)
	{
		$data = [
			'judul' => 'asn | pelajar',
			'viewUtama' => 'asn/contents/pelajar',
			'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(), // cek user yang login berdasarkan session username,
			'pelajarS' => $this->db->get('tb_data_pelajar')->result_array(),
			'magangPelajarS' => $this->magang_m->getMagangPelajar($magang_id),
			'magang_id' => $magang_id
		];
		$this->load->view('asn/layouts/wrapperData', $data);
	}
	public function add_pelajar($pelajar_id)
	{
		$magang_id = $this->input->post('magang_id');
		$this->magang_m->simpanMagangPelajar($pelajar_id, $magang_id);

		$this->session->set_flashdata('success', 'pelajar berhasil dibuat'); // Membuat pesan notif jika insert data berhasil
		redirect('asn/pelajar/' . $magang_id); // redirect ke halaman magang
	}
	public function remove_pelajar($pelajar_id)
	{
		$magang_id = $this->input->post('magang_id');

		$this->magang_m->hapusMagangPelajar($pelajar_id); // Delete data magang
		$this->session->set_flashdata('success', 'pelajar berhasil dihapus'); // Membuat pesan notif jika delete data berhasil
		redirect('asn/pelajar/' . $magang_id); // redirect ke halaman magang
	}
	public function nilai($magang_id)
	{
		$data = [
			'judul' => 'asn | Detail magang',
			'viewUtama' => 'asn/contents/nilai',
			'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(), // cek user yang login berdasarkan session username,
			'magang' => $this->magang_m->getMagang($magang_id)->row_array(),
			'magangJobS' => $this->magang_m->getMagangJob($magang_id),
			'magangPelajarS' => $this->magang_m->getMagangPelajar($magang_id),
			'magang_id' => $magang_id
		];
		$this->load->view('asn/layouts/wrapperData', $data);
	}
	public function input($magang_id, $pelajar_id)
	{
		$magangJobS = $this->magang_m->getMagangJob($magang_id);
		$pelajar = $this->db->get_where('tb_data_pelajar', ['id_pelajar' => $pelajar_id])->row_array();
		// Parameter pertama untuk name input, Parameter kedua bebas, Parameter ketiga aturan input
		foreach ($magangJobS as $magangJob) {
			$this->form_validation->set_rules($magangJob['id_job'], 'Input', 'numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
		}

		// Jika validasi gagal, akan muncul error di input dan kembali ke halaman magang
		if ($this->form_validation->run() == FALSE) {
			$magang_pelajar = $this->db->get_where('tb_magang_pelajar', ['magang_id' => $magang_id, 'pelajar_id' => $pelajar_id])->row_array();
			if ($magang_pelajar) {
				$data = [
					'judul' => 'asn | Input Nilai',
					'viewUtama' => 'asn/contents/input',
					'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(), // cek user yang login berdasarkan session username,
					'magang' => $this->magang_m->getMagang($magang_id)->row_array(),
					'magangJobS' => $magangJobS,
					'pelajar' => $pelajar,
					'magang_id' => $magang_id
				];
				$this->load->view('asn/layouts/wrapperForm', $data);
			}
		} else {
			foreach ($magangJobS as $magangJob) {
				$data = [
					'magang_id' => $magang_id,
					'pelajar_id' => $pelajar_id,
					'job_id' => $magangJob['job_id'],
					'nilai' => $this->input->post($magangJob['id_job'])
				];
				$this->db->replace('tb_nilai', $data); // Insert data magang
			}
			$this->session->set_flashdata('success', 'Nilai ' . $pelajar['nama'] . ' berhasil di input.'); // Membuat pesan notif jika insert data berhasil
			redirect('asn/nilai/' . $magang_id); // redirect ke halaman magang
		}
	}
	public function lihat_nilai($magang_id)
	{
		$data = [
			'judul' => 'asn | Nilai',
			'viewUtama' => 'asn/contents/lihat_nilai',
			'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(), // cek user yang login berdasarkan session username,
			'magang' => $this->magang_m->getMagang($magang_id)->row_array(),
			'magangJobS' => $this->magang_m->getMagangJob($magang_id),
			'magangPelajarS' => $this->magang_m->getMagangPelajar($magang_id),
			'lihat_nilai' => $this->magang_m->lihatNilai($magang_id),
			'magang_id' => $magang_id
		];
		$this->load->view('asn/layouts/wrapperData', $data);
	}
	public function excel($magang_id)
	{
		$magang =  $this->magang_m->getMagang($magang_id)->row_array();
		$magangJobS = $this->magang_m->getMagangJob($magang_id);
		$magangPelajarS = $this->magang_m->getMagangPelajar($magang_id);
		// Ini Instance untuk export Excel
		$excel = new Spreadsheet();

		$excel->getProperties()->setCreator('Agus Salim Hadjrianto')
			->setLastModifiedBy('RianBtk')
			->setTitle('DINAS KEPENDUDUKAN DAN CATATAN SIPIL')
			->setSubject("DAFTAR  NILAI MAGANG")
			->setCategory("Daftar Nilai");

		$excel->setActiveSheetIndex(0)
			->setCellValue('A1', 'No')
			->setCellValue('B1', 'Nama Murid');

		$no = 67;
		foreach ($magangJobS as $magangJob) {
			$excel->setActiveSheetIndex(0)
				->setCellValue(chr($no++) . '1', $magangJob['bidang_diminati']);
		}
		$excel->setActiveSheetIndex(0)
			->setCellValue(chr($no++) . '1', 'Jumlah')
			->setCellValue(chr($no++) . '1', 'Nilai');
		$column = 2;
		$urutan = 1;
		$noB = 67;
		if (is_array($magangPelajarS)) {
			foreach ($magangPelajarS as $magangPelajar) {
				$pelajar = $magangPelajar['pelajar_id'];
				$excel->setActiveSheetIndex(0)
					->setCellValue('A' . $column, $urutan++)
					->setCellValue('B' . $column, $magangPelajar['nama']);
				foreach ($magangJobS as $magangJob) {
					$job = $magangJob['job_id'];
					$query = "SELECT *
								FROM `tb_nilai`
								JOIN `tb_magang` ON `tb_magang`.`id_magang` = `tb_nilai`.`magang_id`
								JOIN `tb_data_pelajar` ON `tb_data_pelajar`.`id_pelajar` = `tb_nilai`.`pelajar_id`
								JOIN `tb_data_bidang` ON `tb_data_bidang`.`id_job` = `tb_nilai`.`job_id`
								WHERE `tb_nilai`.`magang_id` = $magang_id
								AND `tb_nilai`.`pelajar_id` = $pelajar
								AND `tb_nilai`.`job_id` = $job
								GROUP BY `tb_nilai`.`pelajar_id`
							";
					$nilai = $this->db->query($query)->row_array();
					$excel->setActiveSheetIndex(0)
						->setCellValue(chr($noB++) . $column, $nilai['nilai']);
				}
				$queryAs = "SELECT *,SUM(nilai) as jumlah, AVG(nilai) as total
								FROM `tb_nilai`
								JOIN `tb_magang` ON `tb_magang`.`id_magang` = `tb_nilai`.`magang_id`
								JOIN `tb_data_pelajar` ON `tb_data_pelajar`.`id_pelajar` = `tb_nilai`.`pelajar_id`
								JOIN `tb_data_bidang` ON `tb_data_bidang`.`id_job` = `tb_nilai`.`job_id`
								WHERE `tb_nilai`.`magang_id` = $magang_id
								AND `tb_nilai`.`pelajar_id` = $pelajar
								GROUP BY `tb_nilai`.`pelajar_id`
							";
				$cariTotal = $this->db->query($queryAs)->row_array();
				$excel->setActiveSheetIndex(0)
					->setCellValue(chr($noB++) . $column, $cariTotal['jumlah'])
					->setCellValue(chr($noB++) . $column, round($cariTotal['total'], 1));
				$noB = 67;
				$column++;
			}

			$excel->setActiveSheetIndex(0)
				->setCellValue('A' . $column, 'Jumlah');
			foreach ($magangJobS as $magangJob) {
				$job = $magangJob['job_id'];
				$queryJml = "SELECT *,SUM(nilai) as jumlah
							FROM `tb_nilai`
							JOIN `tb_magang` ON `tb_magang`.`id_magang` = `tb_nilai`.`magang_id`
							JOIN `tb_data_bidang` ON `tb_data_bidang`.`id_job` = `tb_nilai`.`job_id`
							WHERE `tb_nilai`.`magang_id` = $magang_id
							AND `tb_nilai`.`job_id` = $job
							GROUP BY `tb_nilai`.`job_id`
					";
				$cariS = $this->db->query($queryJml)->result_array();
				foreach ($cariS as $cari) {
					$excel->setActiveSheetIndex(0)
						->setCellValue(chr($noB++) . $column, $cari['jumlah']);
				}
			}
			$noB = 67;
			$excel->setActiveSheetIndex(0)
				->setCellValue('A' . ($column + 1), 'Rata-Rata Kelas');
			foreach ($magangJobS as $magangJob) {
				$job = $magangJob['job_id'];
				$queryJml = "SELECT *,AVG(nilai) as rata
							FROM `tb_nilai`
							JOIN `tb_magang` ON `tb_magang`.`id_magang` = `tb_nilai`.`magang_id`
							JOIN `tb_data_bidang` ON `tb_data_bidang`.`id_job` = `tb_nilai`.`job_id`
							WHERE `tb_nilai`.`magang_id` = $magang_id
							AND `tb_nilai`.`job_id` = $job
							GROUP BY `tb_nilai`.`job_id`
					";
				$cariR = $this->db->query($queryJml)->result_array();
				foreach ($cariR as $cari) {
					$excel->setActiveSheetIndex(0)
						->setCellValue(chr($noB++) . ($column + 1), round($cari['rata'], 1));
				}
			}
			$noB = 67;
			$excel->setActiveSheetIndex(0)
				->setCellValue('A' . ($column + 3), 'DAFTAR  NILAI MAGANG');
		}
		$writer = new Xlsx($excel);
		$fileName = bin2hex(random_bytes(12));

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
		exit;
	}
}
