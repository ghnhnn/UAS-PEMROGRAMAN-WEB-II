<!DOCTYPE html>
<html>
<head>
	<title>Halo Admin</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/csshalamanutama.css') ?>">
</head>
<style type="text/css">
	.bg-login{
		background-position: center;
		background-repeat: no-repeat;
		height: 100vh;
		background-size: cover;
		background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)) ,url(<?php echo base_url("assets/bg2.png");?>);
	}

</style>
<body class="bg-login">
		<header class="bg-login">
			<div class="navbar">
				<div>
					<ul>
						<li><a href="<?php echo ('karyawan') ?>">Karyawan</a></li>
						<li><a href="<?php echo ('pelanggan') ?>">Pelanggan</a></li>
						<li><a href="<?php echo ('pakaian') ?>">Pakaian</a></li>
						<li><a href="<?php echo ('jeniscucian') ?>">Jenis Cucian</a></li>
						<li><a href="<?php echo ('transaksi') ?>">Transaksi</a></li>
						<li><a href="<?php echo ('logout') ?>">Logout</a></li>
					</ul>
				</div>

				<div class="contents">
					<h1>Clean Laundry</h1>
					<p>Jl. Brigjen Jalan Hasan Basri, Pangeran, Kec. Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70123</p>
				</div>
			</div>
			<div class="button">
				<a class="btn" href="<?php echo ('transaksi') ?>">Tambah Transaksi</a>
			</div>
		</header>
</body>
</html>