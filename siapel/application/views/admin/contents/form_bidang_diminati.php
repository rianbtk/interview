<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Tugas Magang</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('admin/bidang_diminati') ?>">Kelola Tugas</a></li>
				<li class="breadcrumb-item active">Buat/Ubah Tugas</li>
			</ol>
		</div>
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Buat Data Tugas</h4>
					<h6 class="card-subtitle"> Data ini tidak akan bisa dihapus, maka dari itu perhatikan penulisan pada form. </h6>
					<hr>
					<form class="mt-4" method="POST">
						<div class="form-group">
							<label>Kode Bidang</label>
							<input type="text" class="form-control <?= form_error('kode_tugas') ? 'is-invalid' : '' ?>" name="kode_tugas" value="<?= set_value('kode_tugas', isset($bidang_diminati['kode_tugas']) ? $bidang_diminati['kode_tugas'] : '') ?>" placeholder="01-100">
							<div class="invalid-feedback"><?= form_error('kode_tugas') ?></div>
						</div>
						<div class="form-group">
							<label>Tugas</label>
							<input type="text" class="form-control <?= form_error('bidang_diminati') ? 'is-invalid' : '' ?>" name="bidang_diminati" value="<?= set_value('bidang_diminati', isset($bidang_diminati['bidang_diminati']) ? $bidang_diminati['bidang_diminati'] : '') ?>" placeholder="Jaringan">
							<div class="invalid-feedback"><?= form_error('bidang_diminati') ?></div>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- row -->
</div>
