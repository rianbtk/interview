<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">ASN</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
				<li class="breadcrumb-item active">Kelola ASN</li>
			</ol>
		</div>
		<div class="col-md-7 align-self-center text-right d-none d-md-block">
			<a href="<?= base_url('admin/add_asn') ?>" class="btn btn-info">
				Buat PJ Magang
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<!-- table responsive -->
			<div class="card ribbon-wrapper">
				<div class="ribbon ribbon-bookmark ribbon-default">Data Penanggung Jawab</div>
				<div class="card-body">
					<div class="table-responsive">
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
						<table id="all-table" data-all="all" class="table display table-bordered table-striped no-wrap">
							<thead>
								<tr>
									<th>No</th>
									<th>Username</th>
									<th>Nama</th>
									<th>Jenis Kelamin</th>
									<th>Tanggal Lahir</th>
									<th>NIP</th>
									<th>Pendidikan Terakhir</th>
									<th>Agama</th>
									<th>No Handphone</th>
									<th>Alamat</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($AsnS as $asn) : ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $asn['username'] ?></td>
										<td><?= $asn['nama'] ?></td>
										<td><?= $asn['jenis_kelamin'] ?></td>
										<td><?= $asn['tanggal_lahir'] ?></td>
										<td><?= $asn['nip'] ?></td>
										<td><?= $asn['pendidikan_terakhir'] ?></td>
										<td><?= $asn['agama'] ?></td>
										<td><?= $asn['no_hp'] ?></td>
										<td><?= $asn['alamat'] ?></td>
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
		})
	});
</script>
