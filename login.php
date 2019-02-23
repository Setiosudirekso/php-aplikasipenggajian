<?php
session_start();

require 'function.php';

if( isset($_SESSION["login"])){
	header("Location: index.php");
	exit;
}

if ( isset($_POST["login"])) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($koneksi,"SELECT * FROM akun WHERE username = '$username'");

	//cek username
	if (mysqli_num_rows($result) == 1 ) {

	//cek password
	$row = mysqli_fetch_assoc($result);
	if (password_verify($password,$row["password"]) ){
		// SET SESSION
		$_SESSION["login"] = true;

		header("Location: index.php");
		exit;
		
	}
}

	$error = true;
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<h1>Halaman Login <br>
Aplikasi Penggajian Karyawan</h1>

<div class="kotak_login">
	<p class="tulisan_login">Silahkan login</p>
	<form action="" method="post">
	

		<label for="username">User Name :</label>
		<input class="form_login" type="text" name="username" id="username">
	

		<label for="password">Password :</label>
		<input class="form_login" type="password" name="password" id="password">
	
		<button class="tombol_login" type="submit" name="login">Login</button>




	</form>

		<?php if (isset($error)): ?>
			<p class="tulisan_salah">username / password salah</p>
		<?php endif;   ?>
</div>

</body>
</html>