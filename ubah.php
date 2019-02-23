<?php

session_start();

if(!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}


require 'function.php';

// Ambil data di URL
$nip =$_GET["nip"];

// Query data karyawan berdasarkan nip 
$kry = query("SELECT * FROM karyawan WHERE nip=$nip")[0];


//cek tombol button apakah sudah berfungsi
if (isset($_POST["submit"])){
	//cek apakah berhasil apa tidak
	if (ubah($_POST) > 0 ){
		echo " 
				<script>
					alert('Data Berhasil Diubah');
					document.location.href = 'index.php';
				</script>
				";
	} else {
		echo " 
				<script>
					alert('Data Gagal Diubah');
					document.location.href = 'index.php';
				</script>
				";
	}
	

}


?>

<html>
<head> 
 <title>Ubah Data Karyawan </title>
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
        <li><a href="#">DATA KARYAWAN</a></li><BR>
        <li><a href="#">DATA JABATAN</a></li><BR>
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
    <td colspan="2"><b><center> Ubah Data Karyawan </center> </b> </td>
   </tr>
   <tr>
    <td width="96"> Nip </td>
	<td width="248">  <input name="TxtNip" type="text" size="15" maxlength="10" value="<?= $kry["nip"];?>" required></td>
   </tr>
   <tr>
    <td> Id Jabatan </td>
	<td>  <input name="TxtJabatan" type="text" size="15" maxlength="35" value="<?= $kry["id_jabatan"];?>"  required></td>
   </tr>
   <tr>
    <td> Nama </td>
	<td>  <input name="TxtNama" type="text" size="25" maxlength="60" value="<?= $kry["nama"];?>" required></td>
   </tr>  
   <tr>
    <td> Tempat Lahir </td>
	<td>  <input name="TxtTempat" type="text" size="15" maxlength="60" value="<?= $kry["tempat_lahir"];?>" required></td>
   </tr>   
   <tr>
    <td> Tanggal Lahir </td>
	<td>  <input name="TxtLahir" type="date" size="15" maxlength="60" value="<?= $kry["tanggal_lahir"];?>" required></td>
   </tr>     
   <tr>
    <td> Kelamin </td>
	<td>  <input name="RbKelamin" type="radio" value="L" checked value="<?= $kry["jenis_kelamin"];?>" required> pria 
		   <input name="RbKelamin" type="radio" value="W" checked value="<?= $kry["jenis_kelamin"];?>" required> wanita</td>
   </tr>
   <tr>
    <td> Alamat </td>
	<td>  <input name="TxtAlamat" type="text" size="25" maxlength="60" value="<?= $kry["alamat"];?>" required></td>
   </tr>
   <tr>
    <td> NO HP </td>
	<td>  <input name="TxtNohp" type="text" size="15" maxlength="60" value="<?= $kry["no_hp"];?>" required></td>
   </tr>
   <tr>
    <td> Tanggal Bergabung </td>
	<td>  <input name="TxtBergabung" type="date" size="25" maxlength="60" value="<?= $kry["tanggal_bergabung"];?>" required></td>
   </tr>
   <tr>
    <td> Nama Bank </td>
	<td>  <input name="TxtBank" type="text" size="10" maxlength="60" value="<?= $kry["nama_bank"];?>" required></td>
   </tr>
   <tr>
    <td> No Rekening </td>
	<td>  <input name="TxtRekening" type="text" size="15" maxlength="60" value="<?= $kry["no_rekening"];?>" required></td>
   </tr>
   <tr>
    <td></td>
	<td> <button type="submit" name="submit" > Ubah Data </button> </td>
   </tr>
  </table>
 </form>
 </div>
</body>
</html>

