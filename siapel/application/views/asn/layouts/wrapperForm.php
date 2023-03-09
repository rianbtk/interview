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
	<link rel="icon" type="image/x-icon" sizes="16x20" href="<?= base_url() ?>assets/layout/icon.ico">
	<title><?= $judul ?></title>
	<link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap/" />
	<!-- Bootstrap Core CSS -->
	<link href="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?= base_url() ?>assets/template/adminwrap/horizontal/css/style.css" rel="stylesheet">
	<!-- You can change the theme colors from here -->
	<link href="<?= base_url() ?>assets/template/adminwrap/horizontal/css/colors/green.css" id="theme" rel="stylesheet">
</head>

<body class="fix-header card-no-border fix-sidebar">
	<!-- Memanggil file php di asn/components/preloadder.php -->
	<?php $this->load->view('asn/components/preloadder') ?>
	<div id="main-wrapper">
		<!-- Memanggil file php di asn/components/header.php -->
		<?php $this->load->view('asn/components/header') ?>
		<!-- Memanggil file php di asn/components/sidebar.php -->
		<?php $this->load->view('asn/components/sidebar') ?>
		<!-- Content -->
		<div class="page-wrapper">
			<!-- Memanggil varible viewUtama dari method controller -->
			<?php $this->load->view($viewUtama) ?>
			<!-- Memanggil file php di asn/components/footer.php -->
			<?php $this->load->view('asn/components/footer') ?>
		</div>
	</div>
	<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/jquery/jquery.min.js"></script>
	<!-- Bootstrap tether Core JavaScript -->
	<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/bootstrap/js/popper.min.js"></script>
	<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
	<!-- slimscrollbar scrollbar JavaScript -->
	<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/ps/perfect-scrollbar.jquery.min.js"></script>
	<!--Wave Effects -->
	<script src="<?= base_url() ?>assets/template/adminwrap/horizontal/js/waves.js"></script>
	<!--Menu sidebar -->
	<script src="<?= base_url() ?>assets/template/adminwrap/horizontal/js/sidebarmenu.js"></script>
	<!--Custom JavaScript -->
	<script src="<?= base_url() ?>assets/template/adminwrap/horizontal/js/custom.min.js"></script>
	<!-- This is data table -->
	<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
</body>

</html>
