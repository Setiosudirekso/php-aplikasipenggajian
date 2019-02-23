<?php 
require 'function.php';

if( isset($_POST["register"])){

	if (registrasi($_POST) > 0 ) {
		echo "<script>
					alert('user baru berhasil ditambahkan');
			</script>";
	} else{
			echo mysqli_error($koneksi);
	}

}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title> Halamat Registrasi </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="registrasi">
<h1> Halaman Registrasi </h1>
<div class="kotak_login">
	<p class="tulisan_login">Silahkan Registrasi</p>
<form action="" method="post">

		<label for="username"> user name : </label>
		<input class="form_login" type="text" name="username" id="username">

		<label for="password" > password : </label>
		<input class="form_login" type="password" name="password" id="password">
	
		<label for="password2" >Konfirmasi password : </label>
		<input class="form_login" type="password" name="password2" id="password2">
	
		<button class="tombol_login" type="submit" name="register">Register</button>

</form>
</div>
</body>
</html>