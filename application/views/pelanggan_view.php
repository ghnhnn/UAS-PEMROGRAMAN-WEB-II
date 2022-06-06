<!DOCTYPE html>
<html lang="en">
<head>
	<title>Data Pelanggan</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/csstampil.css') ?>">

</head>
<body>
	<header>
		<ul>
			<li><a href="<?php echo ('karyawan') ?>">Karyawan</a></li>
			<li><a href="<?php echo ('pelanggan') ?>">Pelanggan</a></li>
			<li><a href="<?php echo ('pakaian') ?>">Pakaian</a></li>
			<li><a href="<?php echo ('jeniscucian') ?>">Jenis Cucian</a></li>
			<li><a href="<?php echo ('transaksi') ?>">Transaksi</a></li>
			<li><a href="<?php echo ('logout') ?>">Logout</a></li>
		</ul>
	</header>
	<center><h1>Data Pelanggan</h1></center>
	<center><a class="tambah" href="<?php echo ('pelanggan/tambah_data') ?>">Tambah Data</a></center><br>
	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Karyawan</th>
				<th>Alamat Karyawan</th>
				<th>No Telepon</th>
				<th>Jenis Kelamin</th>
				<th colspan="2">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($pelanggan as $row) { ?>
				<tr>
					<td align="center"><?php echo $no++ ?></td>
					<td><?php echo $row->nama ?></td>
					<td><?php echo $row->alamat ?></td>
					<td><?php echo $row->noTelp ?></td>
					<td><?php echo $row->jenkel ?></td>
					<td align="center">
						<a class="edit" href="<?php echo ("pelanggan/edit/{$row->id_pelanggan}") ?>">Edit</a>
					</td>
					<td align="center">
						<a class="hapus" href="<?php echo ("pelanggan/hapus/{$row->id_pelanggan}") ?>">Hapus</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>