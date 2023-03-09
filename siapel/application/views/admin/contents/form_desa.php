<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Desa</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('admin/Desa') ?>">Kelola PEMA</a></li>
				<li class="breadcrumb-item active">Buat/Ubah Desa</li>
			</ol>
		</div>
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Buat Data Desa</h4>
					<h6 class="card-subtitle"> Data ini tidak akan bisa dihapus, maka dari itu perhatikan penulisan pada form. </h6>
					<hr>
					<form class="mt-4" method="POST">
						<div class="form-group">
							<label>Id Desa</label>
							<input type="text" class="form-control <?= form_error('id_kel') ? 'is-invalid' : '' ?>" name="id_kel" value="<?= set_value('id_kel', isset($desa['id_kel']) ? $desa['id_kel'] : '') ?>">
							<div class="invalid-feedback"><?= form_error('id_kel') ?></div>
						</div>
						<div class="form-group">
							<label>Id Kabupaten</label>
							<input type="text" class="form-control <?= form_error('id_kec') ? 'is-invalid' : '' ?>" name="id_kec" value="<?= set_value('id_kec', isset($desa['id_kec']) ? $desa['id_kec'] : '') ?>">
							<div class="invalid-feedback"><?= form_error('id_kec') ?></div>
						</div>
						<div class="form-group">
							<label>Nama Desa</label>
							<input type="text" class="form-control <?= form_error('nama_desa') ? 'is-invalid' : '' ?>" name="nama_desa" value="<?= set_value('nama_desa', isset($desa['nama_desa']) ? $desa['nama_desa'] : '') ?>">
							<div class="invalid-feedback"><?= form_error('nama_desa') ?></div>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- row -->
</div>
