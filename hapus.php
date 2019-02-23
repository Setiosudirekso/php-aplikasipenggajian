<?php

session_start();

if(!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}



require 'function.php';
$nip=$_GET["nip"];

if( hapus($nip)>0){
	echo " 
				<script>
					alert('Data Berhasil Dihapus');
					document.location.href = 'index.php';
				</script>
				";
	} 
	else {
		echo " 
				<script>
					alert('Data Gagal Dihapus');
					document.location.href = 'index.php';
				</script>
				";
	}


?>