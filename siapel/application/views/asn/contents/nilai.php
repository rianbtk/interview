<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Detail magang</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('asn') ?>">asn</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('asn/magang') ?>">Kelola magang</a></li>
				<li class="breadcrumb-item active">Detail magang</li>
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
							<h3>Nama asn : <?= $magang['nama'] ?></h3>
						</div>
						<div class="col-12 col-lg-3">
							<h3>Tahun Ajaran : <?= $magang['tahun_ajaran'] ?></h3>
						</div>
					</div>
					<hr>
					<h4>Tugas Magang</h4>
					<hr>
					<table class="table display table-bordered table-striped no-wrap">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Pekerjaan</th>
							</tr>
						</thead>
						<tbody>
							<?php if (empty($magangJobS)) : ?>
								<tr id="alert-data">
									<td colspan="4">
										<div class="alert alert-danger" role="alert">
											Belum ada Pekerjaan yang anda ambil <a href="<?= base_url('asn/job/' . $magang_id) ?>">Klik Disini</a> untuk menambahkan Pekerjaan
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
					<h4>Input Nilai Magang</h4>
					<hr>
					<a href="<?= base_url('asn/lihat_nilai/' . $magang_id) ?>" class="btn btn-secondary btn-sm mb-2">Lihat semua nilai</a>
					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('success') ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php elseif ($this->session->flashdata('error')) : ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('error') ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>
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
									<th style="text-align:center"></th>
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
										<td style="text-align:center">
											<a href="<?= base_url('asn/input/' . $magang_id . '/' . $magangPelajar['id_pelajar']) ?>" class="btn btn-secondary btn-sm">Input Nilai</a>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/jquery/jquery.min.js"></script>
<script>
	$(function() {
		$('#all-table').DataTable({
			"autoWidth": false,
			"responsive": true,
			"columnDefs": [{
				"targets": [-1],
				"orderable": false
			}]
		})
	});
</script>
