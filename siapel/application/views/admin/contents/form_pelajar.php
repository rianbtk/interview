<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">pelajar</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('admin/pelajar') ?>">Kelola PEMA</a></li>
				<li class="breadcrumb-item active">Buat/Ubah pelajar</li>
			</ol>
		</div>
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Buat Data pelajar</h4>
					<h6 class="card-subtitle"> Data ini tidak akan bisa dihapus, maka dari itu perhatikan penulisan pada form. </h6>
					<hr>
					<form class="mt-4" method="POST">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" name="nama" value="<?= set_value('nama', isset($pelajar['nama']) ? $pelajar['nama'] : '') ?>">
							<div class="invalid-feedback"><?= form_error('nama') ?></div>
						</div>
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select class="form-control <?= form_error('jenis_kelamin') ? 'is-invalid' : '' ?>" name="jenis_kelamin">
								<option value="" disabled selected>Pilih</option>
								<option value="Laki-laki" <?= set_value('jenis_kelamin', isset($pelajar['jenis_kelamin']) ? $pelajar['jenis_kelamin'] : '') != 'Laki-laki' ?: 'selected' ?>>Laki-laki</option>
								<option value="Perempuan" <?= set_value('jenis_kelamin', isset($pelajar['jenis_kelamin']) ? $pelajar['jenis_kelamin'] : '') != 'Perempuan' ?: 'selected' ?>>Perempuan</option>
							</select>
							<div class="invalid-feedback"><?= form_error('jenis_kelamin') ?></div>
						</div>
						<div class="form-group">
							<label>Tanggal Lahir</label>
							<input type="date" class="form-control <?= form_error('tanggal_lahir') ? 'is-invalid' : '' ?>" name="tanggal_lahir" value="<?= set_value('nama', isset($pelajar['tanggal_lahir']) ? $pelajar['tanggal_lahir'] : '') ?>">
							<div class="invalid-feedback"><?= form_error('tanggal_lahir') ?></div>
						</div>
						<div class="form-group">
							<label>Sekolah/Kampus</label>
							<input type="text" class="form-control <?= form_error('sekolah/kampus') ? 'is-invalid' : '' ?>" name="sekolah/kampus" value="<?= set_value('nama', isset($pelajar['sekolah/kampus']) ? $pelajar['sekolah/kampus'] : '') ?>">
							<div class="invalid-feedback"><?= form_error('sekolah/kampus') ?></div>
						</div>
						<div class="form-group">
							<label>Tahun Masuk</label>
							<input type="text" class="form-control <?= form_error('tahun_masuk') ? 'is-invalid' : '' ?>" name="tahun_masuk" value="<?= set_value('nama', isset($pelajar['tahun_masuk']) ? $pelajar['tahun_masuk'] : '') ?>" placeholder="contoh: 2020">
							<div class="invalid-feedback"><?= form_error('tahun_masuk') ?></div>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- row -->
</div>
