<?php

session_start();

if(!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}


require 'function.php';
if (isset($_POST["submit"])){
	//cek apakah berhasil apa tidak
	if (tambah($_POST) > 0 ){
		echo " 
				<script>
					alert('Data Berhasil Ditambahkan');
					document.location.href = 'index.php';
				</script>
				";
	} else {
		echo " 
				<script>
					alert('Data Gagal Ditambahkan');
					document.location.href = 'index.php';
				</script>
				";
	}
	

}


?>

<html>
<head> 
 <title> Data Karyawan </title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="index">
<header>
  <input type="checkbox" id="tag-menu"/>  
  <label class="fa fa-bars menu-bar" for="tag-menu"></label>
  <p class="judul"> APLIKASI PENGGAJIAN KARYAWAN </p>
  <div class="jw-drawer">
    <nav>
      <ul>
        <li><a href="index.php">DATA KARYAWAN</a></li><BR>
        <li><a href="datajabatan.php">DATA JABATAN</a></li><BR>
        <li><a href="#">DATA PENGGAJIAN</a></li><BR>
        <li><a href="#">REKAP PENGGAJIAN</a></li><BR>
        <li><a href="#">DATA ADMIN</a></li><BR>
    <li><a href="logout.php">LOGOUT</a></li><BR>
      </ul>
    </nav>
  </div>
</header>
<div class="scroll">
 <form action="" method="POST" >
  <table class="table1" border="1">
   <tr bgcolor="#66ffff">
    <td colspan="2"><b><center> Masukan Data Karyawan </center> </b> </td>
   </tr>
   <tr>
    <td > Nip </td>
	<td >  <input name="TxtNip" type="text" size="15" maxlength="10" required></td>
   </tr>
   <tr>
    <td> Id Jabatan </td>
	<td>  <input name="TxtJabatan" type="text" size="15" maxlength="35" required></td>
   </tr>
   <tr>
    <td> Nama </td>
	<td>  <input name="TxtNama" type="text" size="25" maxlength="60" required></td>
   </tr>  
   <tr>
    <td> Tempat Lahir </td>
	<td>  <input name="TxtTempat" type="text" size="15" maxlength="60" required></td>
   </tr>   
   <tr>
    <td> Tanggal Lahir </td>
	<td>  <input name="TxtLahir" type="date" size="15" maxlength="60" required></td>
   </tr>     
   <tr>
    <td> Kelamin </td>
	<td>  <input name="RbKelamin" type="radio" value="L" checked required> pria 
		   <input name="RbKelamin" type="radio" value="W" checked required> wanita</td>
   </tr>
   <tr>
    <td> Alamat </td>
	<td>  <input name="TxtAlamat" type="text" size="25" maxlength="60" required></td>
   </tr>
   <tr>
    <td> NO HP </td>
	<td>  <input name="TxtNohp" type="text" size="15" maxlength="60" required></td>
   </tr>
   <tr>
    <td> Tanggal Bergabung </td>
	<td>  <input name="TxtBergabung" type="date" size="25" maxlength="60" required></td>
   </tr>
   <tr>
    <td> Nama Bank </td>
	<td>  <input name="TxtBank" type="text" size="10" maxlength="60" required></td>
   </tr>
   <tr>
    <td> No Rekening </td>
	<td>  <input name="TxtRekening" type="text" size="15" maxlength="60" required></td>
   </tr>
   <tr>
    <td></td>
	<td> <button type="submit" name="submit" > Tambah Data </button> </td>
   </tr>
  </table>
 </form>
 </div>
</body>
</html>

