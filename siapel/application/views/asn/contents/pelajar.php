<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Data Magang</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('asn') ?>">ASN</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('asn/magang') ?>">Kelola magang</a></li>
				<li class="breadcrumb-item active">Data Magang</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<!-- table responsive -->
			<div class="card ribbon-wrapper">
				<div class="ribbon ribbon-bookmark ribbon-default">Data Magang Anda</div>
				<div class="col-md-12 align-self-center text-left d-none d-md-block">
					<a href="<?= base_url('asn/add_pelajar') ?>" class="btn btn-info">
						Tambah Peserta Magang
					</a>
				</div>
				<div class="card-body">
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
					<div class="row">
						<div class="col-12 col-lg-6">
							<h3>Semua Data Magang</h3>
							<hr>
							<div class="table-responsive">
								<table id="all-table" class="table display table-bordered table-striped no-wrap">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Jenis Kelamin</th>
											<th>Asal</th>
											<th>Tahun Masuk</th>
											<th style="text-align:center"></th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($pelajarS as $pelajar) : ?>
											<?php $exists = $this->db->get_where('tb_magang_pelajar', ['magang_id' => $magang_id, 'pelajar_id' => $pelajar['id_pelajar']]) ?>
											<?php if (!$exists->num_rows() > 0) : ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $pelajar['nama'] ?></td>
													<td><?= $pelajar['jenis_kelamin'] ?></td>
													<td><?= $pelajar['sekolah/kampus'] ?></td>
													<td><?= $pelajar['tahun_masuk'] ?></td>
													<td style="text-align:center">
														<form action="<?= base_url('asn/add_pelajar/' . $pelajar['id_pelajar']) ?>" method="POST">
															<input type="hidden" name="magang_id" value="<?= $magang_id ?>">
															<button type="submit" class="btn btn-secondary btn-sm">+</button>
														</form>
													</td>
												</tr>
											<?php endif ?>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<h3>Ambil Data Magang</h3>
							<hr>
							<div class="table-responsive">
								<table id="my-table" class="table display table-bordered table-striped no-wrap">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Jenis Kelamin</th>
											<th>Asal</th>
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
												<td><?= $magangPelajar['sekolah/kampus'] ?></td>
												<td><?= $magangPelajar['tahun_masuk'] ?></td>
												<td style="text-align:center">
													<form action="<?= base_url('asn/remove_pelajar/' . $magangPelajar['id_pelajar']) ?>" method="POST" onsubmit="return confirm('Jika anda menghapus pelajar ini, maka anda setuju akan hilangnya data pelajar dan nilai-nilai yang bersangkutan dengan pelajar ini. Namun anda tidak perlu khawatir, data pelajar di dalam magang lain tidak akan ikut terhapus.');">
														<input type="hidden" name="magang_id" value="<?= $magang_id ?>">
														<button type="submit" class="btn btn-secondary btn-sm">-</button>
													</form>
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
		$('#my-table').DataTable({
			"autoWidth": false,
			"responsive": true,
			"columnDefs": [{
				"targets": [-1],
				"orderable": false
			}]
		})
	});
</script>
