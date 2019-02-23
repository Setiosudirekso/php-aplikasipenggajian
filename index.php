<?php
session_start();

if(!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}


require 'function.php';
 $karyawan = query("SELECT * FROM karyawan");

 //tombol cari di klik

 if( isset($_POST["cari"]) ){
 	$karyawan = cari($_POST["keyword"]);
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
<h1 align="center"> Data Karyawan </h1>

<a class="tambahkaryawan" href="tambahkaryawan.php"> Tambah Karyawan </a>
</br><br>

<form action="" method="post">

	<input type="text" name="keyword" size="27" autofocus 
	placeholder=" Masukan nama karyawan" autocomplete="off">
	<button type="submit" name="cari"> Cari Data </button>
</br>
	
</form>

 <table width="1350" border="1">
  <tr bgcolor="#55aaff" align="center" > 
  	<td width="50"><b> No </b></td>
	<td width="100"><b> Nip </b></td>
	<td width="100"><b> Id Jabatan </b></td>
	<td width="150"><b> Nama </b></td>
	<td width="100"><b> Tempat Lahir</b></td>
	<td width="100"><b> Tanggal Lahir </b></td>
	<td width="50"><b> Jenis Kelamin </b></td>
	<td width="250"><b> Alamat </b></td>
	<td width="100"><b> No HP</b></td>
	<td width="100"><b> Tanggal Masuk </b></td>
	<td width="100"><b> Nama Bank </b></td>
	<td width="100"><b> No Rekening </b></td>
	<td width="120" align="center"><b> Tombol </b></td> 
 </tr>
<?php $i=1; ?>
	<?php foreach ($karyawan as $data ) :?>
		<tr>
			<td><center><?= $i; ?> </center></td>
			<td><?php echo $data['nip']; ?> </td>
			<td><?php echo $data['id_jabatan']; ?> </td>
			<td><?php echo $data['nama']; ?> </td>
			<td><?php echo $data['tempat_lahir']; ?> </td>
			<td><?php echo $data['tanggal_lahir']; ?> </td>
			<td><?php echo $data['jenis_kelamin']; ?> </td>
			<td><?php echo $data['alamat']; ?> </td>
			<td><?php echo $data['no_hp']; ?> </td>
			<td><?php echo $data['tanggal_bergabung']; ?> </td>
			<td><?php echo $data['nama_bank']; ?> </td>
			<td><?php echo $data['no_rekening']; ?> </td>
			<td align="center"> 
			<a href="ubah.php?nip=<?php echo $data['nip']; ?>"> Ubah </a> ||
			<a href="hapus.php?nip=<?php echo $data['nip']; ?>" onclick=
			"return confirm('Yakin Akan Dihapus.?')"> Hapus </a>
			</td>
		</tr>
		<?php $i++; ?>
<?php endforeach; ?>
</table>
</div>
</body>
</html>