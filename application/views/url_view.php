<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contoh URL</title>
</head>
<body>
	<H1>Contoh URL</H1>
	<p>1.Base_url()</p>
	<?php echo base_url() ?>
	<br>
	<p>ini adalah gambar</p>
	<img src=" <?php echo base_url('assets/kelinci.jpeg') ?>" width="200px" height="150px">
	<br>
	<p>2. Site_url()</p>
	<?php echo site_url() ?>
	<br>
	<p><a href="<?php echo site_url('halaman')?>">Ke Halaman View</a></p>
	<br>
	<?php echo anchor('url/detail/1','ke halaman detail') ?>
	<br>
	<?php echo anchor('url/blank','ke halaman blank') ?>
</body>

</html>