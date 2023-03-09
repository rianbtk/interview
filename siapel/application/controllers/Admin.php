<?php
defined('BASEPATH') or exit('No direct script access allowed');
// memanggil autoload library phpoffice
require('./application/third_party/phpoffice/vendor/autoload.php');

// Memanggil namespace class yang berada di library phpoffice
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// Load Model
		// Parameter pertama load file model, Parameter kedua adalah nama alias dari model parameter pertama
		$this->load->model('Asn_model', 'asn_m');
		$this->load->model('Pelajar_model', 'pelajar_m');
		$this->load->model('TugasPekerjaan_model', 'job_m');
		$this->load->model('Kecamatan_model', 'kec_m');
		$this->load->model('Desa_model', 'kel_m');
		$this->load->model('TahunAjaran_model', 'ta_m');
		$this->load->model('Magang_model', 'magang_m');
		is_logged_not_in(); // Jika sudah login, lalu mengakses halaman login maka tidak akan bisa dan akan d alihkan ke halaman admin
	}
	public function index()
	{
		$data = [
			'judul' => 'Admin | Home',
			'viewUtama' => 'admin/contents/index',
			'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(), // cek user yang login berdasarkan session username,
		];
		$this->load->view('admin/layouts/wrapperIndex', $data);
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
				'judul' => 'Admin | Tambah magang',
				'viewUtama' => 'admin/contents/profil',
				'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			];
			$this->load->view('admin/layouts/wrapperForm', $data);
			// Jika validasi tidak gagal
		} else {
			$this->asn_m->ubahProfil();
			$this->session->set_flashdata('success', 'Profil berhasil diubah.'); // Membuat pesan notif jika insert data berhasil
			redirect('admin/profil'); // redirect ke halaman profil
		}
	}
	public function asn()
	{
		$data = [
			'judul' => 'Admin | Kelola ASN',
			'viewUtama' => 'admin/contents/asn',
			'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(), // cek user yang login berdasarkan session username,
			'AsnS' => $this->db->get_where('tb_user', ['role' => 'asn'])->result_array()
		];
		$this->load->view('admin/layouts/wrapperData', $data);
	}
	public function add_asn()
	{
		// Parameter pertama untuk name input, Parameter kedua bebas, Parameter ketiga aturan input
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_dash|max_length[25]');
		$this->form_validation->set_rules('nama', 'Nama', 'required|max_length[25]');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('nip', 'NIP', 'required|numeric|max_length[20]');
		$this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan', 'required|max_length[25]');
		$this->form_validation->set_rules('agama', 'Agama', 'required|max_length[25]');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required|numeric|max_length[13]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[100]');

		// Jika validasi gagal, akan muncul error di input dan kembali ke halaman asn
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Admin',
				'viewUtama' => 'admin/contents/form_asn',
				'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			];
			$this->load->view('admin/layouts/wrapperForm', $data);
			// Jika validasi tidak gagal
		} else {
			$this->asn_m->simpanasn(); // Insert data asn
			$this->session->set_flashdata('success', 'Data berhasil dibuat.'); // Membuat pesan notif jika insert data berhasil
			redirect('admin/asn'); // redirect ke halaman asn
		}
	}
	public function pelajar()
	{
		$data = [
			'judul' => 'Admin | Kelola PEMA',
			'viewUtama' => 'admin/contents/pelajar',
			'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(), // cek user yang login berdasarkan session username,
			'pelajarS' => $this->db->get('tb_data_pelajar')->result_array()
		];
		$this->load->view('admin/layouts/wrapperData', $data);
	}

	public function add_pelajar()
	{
		// Parameter pertama untuk name input, Parameter kedua bebas, Parameter ketiga aturan input
		$this->form_validation->set_rules('nama', 'Nama', 'required|max_length[25]');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('sekolah/kampus', 'Sekolah/Kampus', 'required|max_length[13]');
		$this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk', 'required|max_length[4]');

		// Jika validasi gagal, akan muncul error di input dan kembali ke halaman pelajar
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Admin',
				'viewUtama' => 'admin/contents/form_pelajar',
				'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			];
			$this->load->view('admin/layouts/wrapperForm', $data);
			// Jika validasi tidak gagal
		} else {
			$this->pelajar_m->simpanpelajar(); // Insert data pelajar
			$this->session->set_flashdata('success', 'Data berhasil dibuat.'); // Membuat pesan notif jika insert data berhasil
			redirect('admin/pelajar'); // redirect ke halaman pelajar
		}
	}

	public function update_pelajar($id_pelajar)
	{
		// Parameter pertama untuk name input, Parameter kedua bebas, Parameter ketiga aturan input
		$this->form_validation->set_rules('nama', 'Nama', 'required|max_length[25]');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('sekolah/kampus', 'Sekolah/Kampus', 'required|max_length[13]');
		$this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk', 'required|max_length[4]');

		// Jika validasi gagal, akan muncul error di input dan kembali ke halaman pelajar
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Admin',
				'viewUtama' => 'admin/contents/form_pelajar',
				'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
				'pelajar' => $this->db->get_where('tb_data_pelajar', ['id_pelajar' => $id_pelajar])->row_array()
			];
			$this->load->view('admin/layouts/wrapperForm', $data);
			// Jika validasi tidak gagal
		} else {
			$this->pelajar_m->ubahPelajar($id_pelajar); // Insert data pelajar
			$this->session->set_flashdata('success', 'Data berhasil diubah.'); // Membuat pesan notif jika insert data berhasil
			redirect('admin/pelajar'); // redirect ke halaman pelajar
		}
	}

	public function bidang_diminati()
	{
		$data = [
			'judul' => 'Admin | Kelola Pekerjaan',
			'viewUtama' => 'admin/contents/bidang_diminati',
			'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(), // cek user yang login berdasarkan session username,
			'tugasPekerjaanS' => $this->db->get('tb_data_bidang')->result_array()
		];
		$this->load->view('admin/layouts/wrapperData', $data);
	}
	public function add_bidang_diminati()
	{
		// Parameter pertama untuk name input, Parameter kedua bebas, Parameter ketiga aturan input
		$this->form_validation->set_rules('kode_tugas', 'Kode Pekerjaan', 'required|max_length[10]|is_unique[tb_data_bidang.kode_tugas]');
		$this->form_validation->set_rules('bidang_diminati', 'Pekerjaan', 'required|max_length[25]');

		// Jika validasi gagal, akan muncul error di input dan kembali ke halaman bidang_diminati
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Admin',
				'viewUtama' => 'admin/contents/form_bidang_diminati',
				'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			];
			$this->load->view('admin/layouts/wrapperForm', $data);
			// Jika validasi tidak gagal
		} else {
			$this->job_m->simpantugasPekerjaan(); // Insert data bidang_diminati
			$this->session->set_flashdata('success', 'Data berhasil dibuat.'); // Membuat pesan notif jika insert data berhasil
			redirect('admin/bidang_diminati'); // redirect ke halaman bidang_diminati
		}
	}
	public function update_bidang_diminati($id_job)
	{
		// Parameter pertama untuk name input, Parameter kedua bebas, Parameter ketiga aturan input
		$this->form_validation->set_rules('kode_tugas', 'Kode Pekerjaan', 'required|max_length[10]');
		$this->form_validation->set_rules('bidang_diminati', 'Pekerjaan', 'required|max_length[25]');

		// Jika validasi gagal, akan muncul error di input dan kembali ke halaman bidang_diminati
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Admin',
				'viewUtama' => 'admin/contents/form_bidang_diminati',
				'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
				'bidang_diminati' => $this->db->get_where('tb_data_bidang', ['id_job' => $id_job])->row_array()
			];
			$this->load->view('admin/layouts/wrapperForm', $data);
			// Jika validasi tidak gagal
		} else {
			$this->job_m->ubahtugasPekerjaan($id_job); // Insert data bidang_diminati
			$this->session->set_flashdata('success', 'Data berhasil diubah.'); // Membuat pesan notif jika insert data berhasil
			redirect('admin/bidang_diminati'); // redirect ke halaman bidang_diminati
		}
	}
	public function kecamatan()
	{
		$data = [
			'judul' => 'Admin | Kelola Kecamatan',
			'viewUtama' => 'admin/contents/kecamatan',
			'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(), // cek user yang login berdasarkan session username,
			'kecamatanS' => $this->db->get('tb_kecamatan')->result_array()
		];
		$this->load->view('admin/layouts/wrapperData', $data);
	}
	public function add_kecamatan()
	{
		// Parameter pertama untuk name input, Parameter kedua bebas, Parameter ketiga aturan input
		$this->form_validation->set_rules('id_kec', 'Id Kecamatan', 'required|max_length[10]|is_unique[tb_kecamatan.id_kec]');
		$this->form_validation->set_rules('nama_kecamatan', 'Kecamatan', 'required|max_length[25]');

		// Jika validasi gagal, akan muncul error di input dan kembali ke halaman kecamatan
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Admin',
				'viewUtama' => 'admin/contents/form_kecamatan',
				'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			];
			$this->load->view('admin/layouts/wrapperForm', $data);
			// Jika validasi tidak gagal
		} else {
			$this->kec_m->simpanKecamatan(); // Insert data kecamatan
			$this->session->set_flashdata('success', 'Data berhasil dibuat.'); // Membuat pesan notif jika insert data berhasil
			redirect('admin/kecamatan'); // redirect ke halaman kecamatan
		}
	}
	public function update_kecamatan($id_kec)
	{
		// Parameter pertama untuk name input, Parameter kedua bebas, Parameter ketiga aturan input
		$this->form_validation->set_rules('id_kec', 'Id Kecamatan', 'required|max_length[10]');
		$this->form_validation->set_rules('id_kab', 'Id Kabupaten', 'required|max_length[10]');
		$this->form_validation->set_rules('nama_kecamatan', 'Kecamatan', 'required|max_length[25]');

		// Jika validasi gagal, akan muncul error di input dan kembali ke halaman kecamatan
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Admin',
				'viewUtama' => 'admin/contents/form_kecamatan',
				'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
				'kecamatanS' => $this->db->get_where('tb_kecamatan', ['id_kec' => $id_kec])->row_array()
			];
			$this->load->view('admin/layouts/wrapperForm', $data);
			// Jika validasi tidak gagal
		} else {
			$this->kec_m->ubahKecamatan($id_kec); // Insert data kecamatan
			$this->session->set_flashdata('success', 'Data berhasil diubah.'); // Membuat pesan notif jika insert data berhasil
			redirect('admin/kecamatan'); // redirect ke halaman kecamatan
		}
	}

	public function hapusdata_kecamatan($id_kec)
    {
        $this->kec_m->hapusdata_kecamatan($id_kec);
        $this->session->set_flashdata('flash-data', 'dihapus');

        redirect('admin/kecamatan', 'refresh');
    }
	public function desa()
	{
		$data = [
			'judul' => 'Admin | Kelola desa',
			'viewUtama' => 'admin/contents/desa',
			'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(), // cek user yang login berdasarkan session username,
			'desaS' => $this->db->get('tb_kelurahan')->result_array()
		];
		$this->load->view('admin/layouts/wrapperData', $data);
	}
	public function add_desa()
	{
		// Parameter pertama untuk name input, Parameter kedua bebas, Parameter ketiga aturan input
		$this->form_validation->set_rules('id_kel', 'Id desa', 'required|max_length[10]|is_unique[tb_kelurahan.id_kel]');
		$this->form_validation->set_rules('nama_desa', 'desa', 'required|max_length[25]');

		// Jika validasi gagal, akan muncul error di input dan kembali ke halaman desa
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Admin',
				'viewUtama' => 'admin/contents/form_desa',
				'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			];
			$this->load->view('admin/layouts/wrapperForm', $data);
			// Jika validasi tidak gagal
		} else {
			$this->kel_m->simpandesa(); // Insert data desa
			$this->session->set_flashdata('success', 'Data berhasil dibuat.'); // Membuat pesan notif jika insert data berhasil
			redirect('admin/desa'); // redirect ke halaman desa
		}
	}
	public function update_desa($id_kel)
	{
		// Parameter pertama untuk name input, Parameter kedua bebas, Parameter ketiga aturan input
		$this->form_validation->set_rules('id_kel', 'Id Kelurahan', 'required|max_length[10]');
		$this->form_validation->set_rules('id_kec', 'Id Kecamatan', 'required|max_length[10]');
		$this->form_validation->set_rules('nama_desa', 'desa', 'required|max_length[25]');

		// Jika validasi gagal, akan muncul error di input dan kembali ke halaman desa
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Admin',
				'viewUtama' => 'admin/contents/form_desa',
				'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
				'desaS' => $this->db->get_where('tb_kelurahan', ['id_kel' => $id_kel])->row_array()
			];
			$this->load->view('admin/layouts/wrapperForm', $data);
			// Jika validasi tidak gagal
		} else {
			$this->kel_m->ubahdesa($id_kel); // Insert data desa
			$this->session->set_flashdata('success', 'Data berhasil diubah.'); // Membuat pesan notif jika insert data berhasil
			redirect('admin/desa'); // redirect ke halaman desa
		}
	}

	public function hapusdata_desa($id_kel)
    {
        $this->kel_m->hapusdata_desa($id_kel);
        $this->session->set_flashdata('flash-data', 'dihapus');

        redirect('admin/desa', 'refresh');
    }
	public function tahun_ajaran()
	{
		$data = [
			'judul' => 'Admin | Kelola Tahun Ajaran',
			'viewUtama' => 'admin/contents/tahun_ajaran',
			'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(), // cek user yang login berdasarkan session username,
			'tahunAjaranS' => $this->db->get('tb_data_tahun_ajaran')->result_array()
		];
		$this->load->view('admin/layouts/wrapperData', $data);
	}
	public function add_tahun_ajaran()
	{
		// Parameter pertama untuk name input, Parameter kedua bebas, Parameter ketiga aturan input
		$this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required|max_length[15]');
		$this->form_validation->set_rules('', '', 'required|numeric|max_length[5]');

		// Jika validasi gagal, akan muncul error di input dan kembali ke halaman tahun_ajaran
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Admin',
				'viewUtama' => 'admin/contents/form_tahun_ajaran',
				'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			];
			$this->load->view('admin/layouts/wrapperForm', $data);
			// Jika validasi tidak gagal
		} else {
			$this->ta_m->simpanTahunAjaran(); // Insert data tahun_ajaran
			$this->session->set_flashdata('success', 'Data berhasil dibuat.'); // Membuat pesan notif jika insert data berhasil
			redirect('admin/tahun_ajaran'); // redirect ke halaman tahun_ajaran
		}
	}
	public function update_tahun_ajaran($id_ta)
	{
		// Parameter pertama untuk name input, Parameter kedua bebas, Parameter ketiga aturan input
		$this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required|max_length[15]');
		$this->form_validation->set_rules('', '', 'required|numeric|max_length[5]');

		// Jika validasi gagal, akan muncul error di input dan kembali ke halaman tahun_ajaran
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Admin',
				'viewUtama' => 'admin/contents/form_tahun_ajaran',
				'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
				'tahun_ajaran' => $this->db->get_where('tb_data_tahun_ajaran', ['id_ta' => $id_ta])->row_array()
			];
			$this->load->view('admin/layouts/wrapperForm', $data);
			// Jika validasi tidak gagal
		} else {
			$this->ta_m->ubahTahunAjaran($id_ta); // Insert data tahun_ajaran
			$this->session->set_flashdata('success', 'Data berhasil diubah.'); // Membuat pesan notif jika insert data berhasil
			redirect('admin/tahun_ajaran'); // redirect ke halaman tahun_ajaran
		}
	}
	public function magang()
	{
		$data = [
			'judul' => 'Admin | magang',
			'viewUtama' => 'admin/contents/magang',
			'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(), // cek user yang login berdasarkan session username,
			'magangS' => $this->magang_m->getMagang()->result_array()
		];
		$this->load->view('admin/layouts/wrapperData', $data);
	}
	public function lihat_nilai($magang_id)
	{
		$data = [
			'judul' => 'Admin | Nilai',
			'viewUtama' => 'admin/contents/lihat_nilai',
			'cekUser' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(), // cek user yang login berdasarkan session username,
			'magang' => $this->magang_m->getMagang($magang_id)->row_array(),
			'magangJobS' => $this->magang_m->getMagangJob($magang_id),
			'magangPelajarS' => $this->magang_m->getMagangPelajar($magang_id),
			'lihat_nilai' => $this->magang_m->lihatNilai($magang_id),
			'magang_id' => $magang_id
		];
		$this->load->view('admin/layouts/wrapperData', $data);
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
				$queryAs = "SELECT SUM(nilai) as jumlah, AVG(nilai) as total
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
				$queryJml = "SELECT SUM(nilai) as jumlah
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
				$queryJml = "SELECT AVG(nilai) as rata
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
