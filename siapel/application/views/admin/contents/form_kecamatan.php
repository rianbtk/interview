<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Kecamatan</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('admin/Kecamatan') ?>">Kelola PEMA</a></li>
				<li class="breadcrumb-item active">Buat/Ubah Kecamatan</li>
			</ol>
		</div>
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Buat Data Kecamatan</h4>
					<h6 class="card-subtitle"> Data ini tidak akan bisa dihapus, maka dari itu perhatikan penulisan pada form. </h6>
					<hr>
					<form class="mt-4" method="POST">
						<div class="form-group">
							<label>Id Kecamatan</label>
							<input type="text" class="form-control <?= form_error('id_kec') ? 'is-invalid' : '' ?>" name="id_kec" value="<?= set_value('id_kec', isset($Kecamatan['id_kec']) ? $Kecamatan['id_kec'] : '') ?>">
							<div class="invalid-feedback"><?= form_error('id_kec') ?></div>
						</div>
						<div class="form-group">
							<label>Id Kabupaten</label>
							<input type="text" class="form-control <?= form_error('id_kab') ? 'is-invalid' : '' ?>" name="id_kab" value="<?= set_value('id_kab', isset($Kecamatan['id_kab']) ? $Kecamatan['id_kab'] : '') ?>">
							<div class="invalid-feedback"><?= form_error('id_kab') ?></div>
						</div>
						<div class="form-group">
							<label>Nama Kecamatan</label>
							<input type="text" class="form-control <?= form_error('nama_kecamatan') ? 'is-invalid' : '' ?>" name="nama_kecamatan" value="<?= set_value('nama_kecamatan', isset($Kecamatan['nama_kecamatan']) ? $Kecamatan['nama_kecamatan'] : '') ?>">
							<div class="invalid-feedback"><?= form_error('nama_kecamatan') ?></div>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- row -->
</div>
