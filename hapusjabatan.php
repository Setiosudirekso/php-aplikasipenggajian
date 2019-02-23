<?php
session_start();

if(!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}



require 'function.php';
$nip2=$_GET["nip"];

if( hapusjabatan($nip2)>0){
	echo " 
				<script>
					alert('Data Berhasil Dihapus');
					document.location.href = 'datajabatan.php';
				</script>
				";
	} 
	else {
		echo " 
				<script>
					alert('Data Gagal Dihapus');
					document.location.href = 'datajabatan.php';
				</script>
				";
	}


?>