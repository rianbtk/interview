<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Nilai</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
				<li class="breadcrumb-item active">Nilai</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<!-- table responsive -->
			<div class="card ribbon-wrapper">
				<div class="ribbon ribbon-bookmark ribbon-default">Detail magang</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12 col-lg-3">
							<h3>Nama Asn : <?= $magang['nama'] ?></h3>
						</div>
						<div class="col-12 col-lg-3">
							<h3>Tahun Masuk : <?= $magang['tahun_ajaran'] ?></h3>
						</div>
					</div>
					<hr>
					<h4>Jenis Kegiatan Yang Di Lakukan</h4>
					<hr>
					<table class="table display table-bordered table-striped no-wrap">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Kualifikasi</th>
							</tr>
						</thead>
						<tbody>
							<?php if (empty($magangJobS)) : ?>
								<tr id="alert-data">
									<td colspan="4">
										<div class="alert alert-danger" role="alert">
											Belum ada data magang yang di ambil <a href="<?= base_url('asn/job/' . $magang_id) ?>">Klik Disini</a> untuk menambahkan Pekerjaan
										</div>
									</td>
								</tr>
							<?php else : ?>
								<?php $no = 1;
								foreach ($magangJobS as $magangJob) : ?>
									<tr>
										<td scope="row"><?= $no++ ?></td>
										<td><?= $magangJob['bidang_diminati'] ?></td>
									</tr>
								<?php endforeach ?>
							<?php endif ?>
						</tbody>
					</table>
					<h4>Data Magang</h4>
					<hr>
					<div class="table-responsive">
						<table id="all-table" data-all="all" class="table display table-bordered table-striped no-wrap">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama pelajar</th>
									<th>Jenis Kelamin</th>
									<th>Tanggal Lahir</th>
									<th>Sekolah/Kampus</th>
									<th>Tahun Masuk</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($magangPelajarS as $magangPelajar) : ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $magangPelajar['nama'] ?></td>
										<td><?= $magangPelajar['jenis_kelamin'] ?></td>
										<td><?= $magangPelajar['tanggal_lahir'] ?></td>
										<td><?= $magangPelajar['sekolah/kampus'] ?></td>
										<td><?= $magangPelajar['tahun_masuk'] ?></td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12">
			<div class="card ribbon-wrapper">
				<div class="ribbon ribbon-bookmark ribbon-default">Data Nilai</div>
				<div class="card-body">
					<div class="text-center">
						<h3>DAFTAR  NILAI MAGANG</h3>
						<h3>TAHUN AJARAN <?= $magang['tahun_ajaran'] ?> </h3>
					</div>
					<table class="table table-bordered table-hover table-responsive-xl">
						<tbody>
							<tr>
								<td rowspan="2" style="vertical-align : middle;text-align:center;">No</td>
								<td rowspan="2" style="vertical-align : middle;text-align:center;">Nama pelajar</td>
								<td colspan="<?= count($magangJobS) ?>" style="text-align: center;">Bidang Pekerjaan</td>
								<td colspan="2" style="text-align: center;">Total</td>
							</tr>
							<tr>
								<?php if (empty($magangJobS)) : ?>
									<td class="text-danger text-center">Pekerjaan tidak ditemukan!</td>
								<?php else : ?>
									<?php foreach ($magangJobS as $magangJob) : ?>
										<td><?= $magangJob['bidang_diminati'] ?></td>
									<?php endforeach ?>
								<?php endif ?>
								<td>Jumlah</td>
								<td>Nilai</td>
							</tr>
							<?php if (empty($magangPelajarS)) : ?>
								<td class="text-danger text-center" colspan="15">pelajar tidak ditemukan!</td>
							<?php else : ?>
								<?php $no = 1;
								foreach ($magangPelajarS as $magangPelajar) : ?>
									<?php $pelajar = $magangPelajar['pelajar_id']; ?>
									<tr>
										<td style="text-align: center;"><?= $no++ ?></td>
										<td><?= $magangPelajar['nama'] ?></td>
										<?php foreach ($magangJobS as $magangJob) : ?>
											<?php
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
											?>
											<td><?= isset($nilai['nilai']) ? $nilai['nilai'] : '<span class="text-danger">Belum ada nilai!</span>' ?></td>
										<?php endforeach ?>
										<?php
										$queryAs = "SELECT SUM(nilai) as jumlah, AVG(nilai) as total
												FROM `tb_nilai`
												JOIN `tb_magang` ON `tb_magang`.`id_magang` = `tb_nilai`.`magang_id`
												JOIN `tb_data_pelajar` ON `tb_data_pelajar`.`id_pelajar` = `tb_nilai`.`pelajar_id`
												JOIN `tb_data_bidang` ON `tb_data_bidang`.`id_job` = `tb_nilai`.`job_id`
												WHERE `tb_nilai`.`magang_id` = $magang_id
												AND `tb_nilai`.`pelajar_id` = $pelajar
												GROUP BY `tb_nilai`.`pelajar_id`
										";
										$cari = $this->db->query($queryAs)->row_array();
										?>
										<?php if (!empty($cari)) : ?>
											<td><?= $cari['jumlah'] ?></td>
											<td><?= round($cari['total'], 1) ?></td>
										<?php else : ?>
											<td><span class="text-danger">Belum ada total!</span></td>
											<td><span class="text-danger">Belum ada total!</span></td>
										<?php endif ?>
									</tr>
								<?php endforeach ?>
							<?php endif ?>

							<tr>
								<td colspan="2">Jumlah</td>
								<?php foreach ($magangJobS as $magangJob) : ?>
									<?php
									$job = $magangJob['job_id'];
									$queryJml = "SELECT SUM(nilai) as jumlah
												FROM `tb_nilai`
												JOIN `tb_magang` ON `tb_magang`.`id_magang` = `tb_nilai`.`magang_id`
												JOIN `tb_data_bidang` ON `tb_data_bidang`.`id_job` = `tb_nilai`.`job_id`
												WHERE `tb_nilai`.`magang_id` = $magang_id
												AND `tb_nilai`.`job_id` = $job
												GROUP BY `tb_nilai`.`job_id`
										";
									$cariTotal = $this->db->query($queryJml)->result_array();
									?>
									<?php foreach ($cariTotal as $cari) : ?>
										<td><?= $cari['jumlah'] ?></td>
									<?php endforeach ?>
								<?php endforeach ?>
							</tr>
							<tr>
								<td colspan="2">Rata-Rata Nilai</td>
								<?php foreach ($magangJobS as $magangJob) : ?>
									<?php
									$job = $magangJob['job_id'];
									$queryJml = "SELECT AVG(nilai) as rata
												FROM `tb_nilai`
												JOIN `tb_magang` ON `tb_magang`.`id_magang` = `tb_nilai`.`magang_id`
												JOIN `tb_data_bidang` ON `tb_data_bidang`.`id_job` = `tb_nilai`.`job_id`
												WHERE `tb_nilai`.`magang_id` = $magang_id
												AND `tb_nilai`.`job_id` = $job
												GROUP BY `tb_nilai`.`job_id`
										";
									$cariTotal = $this->db->query($queryJml)->result_array();
									?>
									<?php foreach ($cariTotal as $cari) : ?>
										<td><?= round($cari['rata'], 1) ?></td>
									<?php endforeach ?>
								<?php endforeach ?>
							</tr>
						</tbody>
					</table>
					<a href="<?= base_url('admin/excel/' . $magang_id) ?>" class="btn btn-secondary btn-sm">Export to Excel</a>
				</div>
			</div>
		</div>
	</div>
</div>
