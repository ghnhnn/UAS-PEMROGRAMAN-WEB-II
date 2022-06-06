<!DOCTYPE html>
<html>
<head>
	<title>Silakan Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/csslogin.css') ?>">
</head>
<style type="text/css">
	.bg-login{
		background-position: center;
		background-repeat: no-repeat;
		height: 100vh;
		background-size: cover;
		background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)) ,url(<?php echo base_url("assets/bg3.png");?>);
	}
</style>
<body class="bg-login">
	<div class="wrap">
		<h2>Silakan Login</h2>
			<?php echo $form_open ?>
			<input type="text" name="email" placeholder="masukkan email" href='"<?php echo $input_email ?>"' >
			<input type="password" name="password" placeholder="masukkan password" href='"<?php echo $input_password ?>"'>
			<button class="btn-login" type="text" name="submit" href='"<?php echo $submit ?>"'>Login</button>
		<div>
			<?php $form_close ?>	
		</div>
	</div>
</body>
</html>
