<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Pekerjaan</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('asn') ?>">asn</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('asn/magang') ?>">Kelola magang</a></li>
				<li class="breadcrumb-item active">Pekerjaan</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<!-- table responsive -->
			<div class="card ribbon-wrapper">
				<div class="ribbon ribbon-bookmark ribbon-default">Data Pekerjaan Anda</div>
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
							<h3>Semua Data Pekerjaan</h3>
							<hr>
							<div class="table-responsive">
								<table id="all-table" class="table display table-bordered table-striped no-wrap">
									<thead>
										<tr>
											<th>No</th>
											<th>Kode</th>
											<th>Pekerjaan</th>
											<th style="text-align:center"></th>
										</tr>
									</thead>
									<tbody>
										<?php if (empty($bidang_diminatiS)) : ?>
											<tr id="alert-data">
												<td colspan="3">
													<div class="alert alert-danger" role="alert">
														Belum ada data Pekerjaan
													</div>
												</td>
											</tr>
										<?php else : ?>
											<?php $no = 1;
											foreach ($bidang_diminatiS as $bidang_diminati) : ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $bidang_diminati['kode_tugas'] ?></td>
													<td><?= $bidang_diminati['bidang_diminati'] ?></td>
													<td style="text-align:center">
														<form action="<?= base_url('asn/add_job/' . $bidang_diminati['id_job']) ?>" method="POST">
															<input type="hidden" name="magang_id" value="<?= $magang_id ?>">
															<button type="submit" class="btn btn-secondary btn-sm">+</button>
														</form>
													</td>
												</tr>
											<?php endforeach ?>
										<?php endif ?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<h3>Tugas Magang</h3>
							<hr>
							<div class="table-responsive">
								<table id="my-table" class="table display table-bordered table-striped no-wrap">
									<thead>
										<tr>
											<th>No</th>
											<th>Kode</th>
											<th>Pekerjaan</th>
											<th style="text-align:center"></th>
										</tr>
									</thead>
									<tbody>
										<?php if (empty($magangJobS)) : ?>
											<tr id="alert-data">
												<td colspan="4">
													<div class="alert alert-danger" role="alert">
														Belum ada Pekerjaan yang anda ambil
													</div>
												</td>
											</tr>
										<?php else : ?>
											<?php $no = 1;
											foreach ($magangJobS as $magangJob) : ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $magangJob['kode_tugas'] ?></td>
													<td><?= $magangJob['bidang_diminati'] ?></td>
													<td style="text-align:center">
														<form action="<?= base_url('asn/remove_job/' . $magangJob['job_id']) ?>" method="POST" onsubmit="return confirm('Jika anda menghapus Pekerjaan ini, maka anda setuju akan hilangnya data nilai pada pelajar yang bersangkutan dengan Pekerjaan ini. Namun anda tidak perlu khawatir, data Pekerjaan di dalam magang lain tidak akan ikut terhapus.');">
															<input type="hidden" name="magang_id" value="<?= $magang_id ?>">
															<button type="submit" class="btn btn-secondary btn-sm">-</button>
														</form>
													</td>
												</tr>
											<?php endforeach ?>
										<?php endif ?>
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
