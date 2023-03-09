<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/layout/capil.png">
	<title><?= $judul ?></title>
	<link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap/" />
	<!-- Bootstrap Core CSS -->
	<link href="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- page css -->
	<link href="<?= base_url() ?>assets/template/adminwrap/horizontal/css/pages/login-register-lock.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?= base_url() ?>assets/template/adminwrap/horizontal/css/style.css" rel="stylesheet">

	<!-- You can change the theme colors from here -->
	<link href="<?= base_url() ?>assets/template/adminwrap/horizontal/css/colors/default.css" id="theme" rel="stylesheet">
</head>

<body>
	<div class="preloader">
		<div class="loader">
			<div class="loader__figure"></div>
			<p class="loader__label">Admin Wrap</p>
		</div>
	</div>
	<section id="wrapper" class="login-register login-sidebar" style="background-image:url(<?= base_url() ?>assets/layout/bg1.png);">
		<div class="login-box card">
			<div class="card-body">
				<form method="POST">
					<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
					<a href="<?= base_url() ?>" class="text-center db">
						<img src="<?= base_url('assets/layout/capil.png') ?>" alt="Home" width="180" />
					</a>
					<h3 class="text-center">DINAS KEPENDUDUKAN <br> DAN <br> PENCATATAN SIPIL <br> KABUPATEN BOJONEGORO</h3>
					<hr>
					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success mt-2" role="alert">
							<?= $this->session->flashdata('success'); ?>
						</div>
					<?php elseif ($this->session->flashdata('error')) : ?>
						<div class="alert alert-danger mt-2" role="alert">
							<?= $this->session->flashdata('error'); ?>
						</div>
					<?php endif; ?>
					<div class="form-group ">
						<label>Username</label>
						<div class="col-xs-12">
							<input class="form-control" value="<?= set_value('username') ?>" name="username" type="text" placeholder="Masukkan username anda">
							<small class="text-danger"><?= form_error('username') ?></small>
						</div>
					</div>
					<div class="form-group">
						<label>Password</label>
						<div class="col-xs-12">
							<input class="form-control" name="password" type="password" placeholder="Masukkan password anda">
							<small class="text-danger"><?= form_error('password') ?></small>
						</div>
					</div>
					<div class="form-group text-center m-t-20">
						<div class="col-xs-12">
							<button type="submit" class="btn btn-info btn-block text-uppercased" type="submit">Log In</button>
						</div>
					</div>
					<hr>
					<div class="form-group text-left">
						<div class="col-xs-12 text-left">
							<small>Dinas Kependudukan Dan Pencatatan Sipil
								<br> <a href="https://wa.me/085232181988">WhatsApp</a>
								<br>Akta = 08123448362; 
								<br>Pemanfaatan Data = 081330286167;
								<br>Data Bermasalah = 082132099730
								<br> <a href="https://dinasdukcapil.bojonegorokab.go.id">Website : dinasdukcapil.bojonegorokab.go.id</a>
							</small>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/jquery/jquery.min.js"></script>
	<!-- Bootstrap tether Core JavaScript -->
	<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/bootstrap/js/popper.min.js"></script>
	<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
	<!--Custom JavaScript -->
	<script type="text/javascript">
		$(function() {
			$(".preloader").fadeOut();
		});
	</script>

</body>

</html>
