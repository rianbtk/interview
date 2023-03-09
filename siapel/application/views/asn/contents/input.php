<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Input Nilai</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('asn') ?>">asn</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('asn/magang') ?>">Kelola magang</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('asn/nilai/' . $magang_id) ?>">Detail magang</a></li>
				<li class="breadcrumb-item active">Input Nilai</li>
			</ol>
		</div>
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-12">
			<div class="card">
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
					<h3>Data pelajar</h3>
					<table class="table">
						<tbody>
							<tr>
								<td>Nama pelajar</td>
								<td>:</td>
								<td><?= $pelajar['nama'] ?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td>:</td>
								<td><?= $pelajar['jenis_kelamin'] ?></td>
							</tr>
							<tr>
								<td>Tanggal Lahir</td>
								<td>:</td>
								<td><?= $pelajar['tanggal_lahir'] ?></td>
							</tr>
							<tr>
								<td>Sekolah/Kampus</td>
								<td>:</td>
								<td><?= $pelajar['sekolah/kampus'] ?></td>
							</tr>
							<tr>
								<td>Tahun Masuk</td>
								<td>:</td>
								<td><?= $pelajar['tahun_masuk'] ?></td>
							</tr>
						</tbody>
					</table>
					<form class="mt-4" method="POST">
						<?php foreach ($magangJobS as $magangJob) : ?>
							<?php
							$job = $magangJob['job_id'];
							$pelajars = $pelajar['id_pelajar'];
							$query = "SELECT *
													FROM `tb_nilai`
													JOIN `tb_magang` ON `tb_magang`.`id_magang` = `tb_nilai`.`magang_id`
													JOIN `tb_data_pelajar` ON `tb_data_pelajar`.`id_pelajar` = `tb_nilai`.`pelajar_id`
													JOIN `tb_data_bidang` ON `tb_data_bidang`.`id_job` = `tb_nilai`.`job_id`
													WHERE `tb_nilai`.`magang_id` = $magang_id
													AND `tb_nilai`.`pelajar_id` = $pelajars
													AND `tb_nilai`.`job_id` = $job
													GROUP BY `tb_nilai`.`pelajar_id`
												";
							$nilai = $this->db->query($query)->row_array();
							?>
							<input type="hidden" name="magang_id" value="<?= $magang_id ?>">
							<div class="form-group">
								<label><?= $magangJob['bidang_diminati'] ?></label>
								<input type="text" name="<?= $magangJob['id_job'] ?>" class="form-control <?= form_error($magangJob['id_job']) ? 'is-invalid' : '' ?>" value="<?= set_value($magangJob['id_job'], isset($nilai['nilai']) ? $nilai['nilai'] : null) ?>">
								<div class="invalid-feedback"><?= form_error($magangJob['id_job']) ?></div>
							</div>
						<?php endforeach ?>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- row -->
</div>
