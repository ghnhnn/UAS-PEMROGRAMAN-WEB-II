<!DOCTYPE html>
<html lang="en">
<head>
	<title>Data Pendaftaran</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/stylecss.css') ?>">

</head>
<body>
	<div class="div1">
	<div align="center">
		<img src="<?php echo base_url('assets/LogoPoliban_lastEdit.png') ?>">
		<h3 align="center" class="font4">Data Pendaftaran</h3>
	</div>
	<div class="font3">
		<?php echo anchor('pendaftaran/tambah_data', 'Tambah Data') ?>
	</div>
	<table border="1" align="center" class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Status</th>
				<th>Lulusan Sekolah</th>
				<th>Tahun Ajaran</th>
				<th>Pekerjaan</th>
				<th>Alamat</th>
				<th>Kelurahan</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($pendaftaran as $row) { ?>
				<tr align="center">
					<td><?php echo $no++ ?></td>
					<td class="font1"><?php echo $row->nama ?></td>
					<td><?php echo $row->nama_jenkel ?></td>
					<td><?php echo $row->nama_status ?></td>
					<td><?php echo $row->lulusan_sekolah ?></td>
					<td><?php echo $row->jumlah_tahun ?></td>
					<td><?php echo $row->pekerjaan ?></td>
					<td><?php echo $row->alamat ?></td>
					<td><?php echo $row->kelurahan ?></td>
					<td>
						<?php echo anchor("pendaftaran/edit/{$row->id_pendaftaran}", "Edit") ?>
						<?php echo anchor("pendaftaran/hapus/{$row->id_pendaftaran}", "Hapus") ?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	</div>
	<div  class="font2">
		<?php
			$pesan = $this->session->flashdata('pesan');
			echo $pesan;
		?>
	</div>