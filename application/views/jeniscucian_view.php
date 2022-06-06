<!DOCTYPE html>
<html lang="en">
<head>
	<title>Data Jenis Cucian</title>
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
	<center><h1>Data Jenis Cucian</h1></center>
	<center><a class="tambah" href="<?php echo ('jeniscucian/tambah_data') ?>">Tambah Data</a></center><br>
	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>Jenis Cucian</th>
				<th colspan="2">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($jeniscucian as $row) { ?>
				<tr>
					<td align="center"><?php echo $no++ ?></td>
					<td><?php echo $row->nama_jenis ?></td>
					<td align="center">
						<a class="edit" href="<?php echo ("jeniscucian/edit/{$row->id_jenis}") ?>">Edit</a>
					</td>
					<td align="center">
						<a class="hapus" href="<?php echo ("jeniscucian/hapus/{$row->id_jenis}") ?>">Hapus</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</body>