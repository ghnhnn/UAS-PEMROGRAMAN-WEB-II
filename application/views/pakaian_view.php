<!DOCTYPE html>
<html lang="en">
<head>
	<title>Data Pakaian</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/cssjenis.css') ?>">

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
	<center><h1>Data Pakaian</h1></center>
	<center><a class="tambah" href="<?php echo ('pakaian/tambah_data') ?>">Tambah Data</a></center><br>
	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>Jenis Laundry</th>
				<th colspan="2">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($pakaian as $row) { ?>
				<tr align="center">
					<td><?php echo $no++ ?></td>
					<td><?php echo $row->nama_pakaian ?></td>
					<td align="center">
						<a class="edit" href="<?php echo ("pakaian/edit/{$row->id_pakaian}") ?>">Edit</a>
					</td>
					<td align="center">
						<a class="hapus" href="<?php echo ("pakaian/hapus/{$row->id_pakaian}") ?>">Hapus</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</body>