<!DOCTYPE html>
<html lang="en">
<head>
	<title>Data Transaksi</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/csstransaksi.css') ?>">

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
	<center><h1>Data Transaksi</h1></center>
	<center><a class="tambah" href="<?php echo ('transaksi/tambah_data') ?>">Tambah Data</a></center><br>
	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pelanggan</th>
				<th>Tanggal Masuk</th>
				<th>Tanggal Keluar</th>
				<th>Berat</th>
				<th>Jenis Laundry</th>
				<th>Jenis Cucian</th>
				<th>Bayar</th>
				<th>Total Bayar</th>
				<th colspan="2">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($transaksi as $row) { ?>
				<tr align="center">
					<td><?php echo $no++ ?></td>
					<td align="left"><?php echo $row->nama ?></td>
					<td><?php echo date('d-m-Y', strtotime($row->tanggalmasuk)); ?></td>
					<td><?php echo date('d-m-Y', strtotime($row->tanggalkeluar)); ?></td>
					<td><?php echo $row->berat ?></td>
					<td><?php echo $row->nama_jenis ?></td>
					<td><?php echo $row->nama_pakaian ?></td>
					<td><?php echo $row->bayar ?></td>
					<td><?php echo $row->totalbayar ?></td>
					<td align="center">
						<a class="edit" href="<?php echo ("transaksi/edit/{$row->id_transaksi}") ?>">Edit</a>
					</td>
					<td align="center">
						<a class="hapus" href="<?php echo ("transaksi/hapus/{$row->id_transaksi}") ?>">Hapus</a>
					</td>
	
				</tr>
			<?php } ?>
		</tbody>
	</table>
</body>