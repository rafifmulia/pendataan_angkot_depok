<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Pendataan Angkot Depok</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/ico_app.png'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/page.css'); ?>">
</head>
<body>

<div class="app">
	<div class="logo">
		<img src="<?php echo base_url('assets/img/ico_app.png'); ?>">
	</div>
	<div class="content">
		<div class="header">Pendataan Angkot Kota Depok</div>
		<?php echo form_open('login/check') ?>
			<input type="text" name="username" placeholder="username" class="input">
			<input type="password" name="password" placeholder="password" class="input">
			<input type="submit" name="login" value="Login" class="input">
		<?php echo form_close() ?>
		<div class="footer">
			<?php echo validation_errors(); ?>
			<!-- Tidak Punya Akun ? Daftar <a href="register.php">Disini</a> -->
		</div>
	</div>
</div>

<?php
if (!empty($empty_form))
{
	echo "<script>alert('".$empty_form."')</script>";
}
else if (!empty($data_error))
{
	echo "<script>alert('".$data_error."')</script>";
}
else if (!empty($form_success))
{
	echo "<script>alert('".$form_success."')</script>";
	if (strpos($form_success, 'Login Berhasil') !== false)
	{
		redirect(site_url('dashboard'));
	}
}
?>

<script type="text/javascript" src="<?php echo base_url('assets/js/myjs.js'); ?>"></script>
</body>
</html>