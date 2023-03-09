<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">magang</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
				<li class="breadcrumb-item active">Kelola magang</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<!-- table responsive -->
			<div class="card ribbon-wrapper">
				<div class="ribbon ribbon-bookmark ribbon-default">Data Semua PJ ASN</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="all-table" data-all="all" class="table display table-bordered table-striped no-wrap">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama ASN</th>
									<th>Tahun Ajaran</th>
									<th style="text-align:center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($magangS as $magang) : ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $magang['nama'] ?></td>
										<td><?= $magang['tahun_ajaran'] ?></td>
										<td style="text-align:center">
											<a href="<?= base_url('admin/lihat_nilai/' . $magang['id_magang']) ?>" class="btn btn-secondary btn-sm"><i class="icon-File-Search"></i> Detail</a>
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
