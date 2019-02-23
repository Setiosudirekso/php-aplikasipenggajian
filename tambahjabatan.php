<?php
session_start();

if(!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}

require 'function.php';
if (isset($_POST["submit"])){
  //cek apakah berhasil apa tidak
  if (tambahjabatan($_POST) > 0 ){
    echo " 
        <script>
          alert('Data Berhasil Ditambahkan');
          document.location.href = 'datajabatan.php';
        </script>
        ";
  } else {
    echo " 
        <script>
          alert('Data Gagal Ditambahkan');
          document.location.href = 'datajabatan.php';
        </script>
        ";
  }
  
}

?>


<html>
<head> 
 <title>Tambah Data Jabatan Karyawan </title>
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
 <form action="" method="POST">
  <table width="800" height="450" border="1">
   <tr bgcolor="#66ffff">
    <td colspan="2"><b><center> Masukan Data Jabatan </center> </b> </td>
   </tr>
   <tr>
    <td width="96"> Id Jabatan </td>
	<td width="248">  <input name="TxtJabatan" type="text" size="15" maxlength="10" required></td>
   </tr>
   <tr>
    <td> Nip </td>
	<td>  <input name="TxtNip" type="text" size="15" maxlength="35" required></td>
   </tr>
   <tr>
    <td> Nama </td>
	<td>  <input name="TxtNama" type="text" size="25" maxlength="60" required></td>
   </tr>  
   <tr>
    <td> Posisi / Jabatan </td>
	<td>   <select name="TxtPosisi">
                            <option value="kepala_sekolah">Kepala Sekolah</option>
                            <option value="bendahara">Bendahara</option>
                            <option value="kesiswaan">Kesiswaan</option>
                            <option value="produksi">Produksi</option>
                            <option value="akuntan">Akuntan</option>
          </select>
  </td>
   </tr>   
   <tr>
    <td> Gaji Pokok </td>
	<td>  <input name="TxtGaji" type="text" size="15" maxlength="60" required></td>
   </tr>     
   <tr>
    <td></td>
	<td> <button type="submit" name="submit" > Tambah Data </button> </td>
   </tr>
  </table>
 </form>
</body>
</html>

