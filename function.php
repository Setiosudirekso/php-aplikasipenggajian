<?php
// koneksi ke database

	$koneksi = mysqli_connect("localhost","root","","smpmuhkaramat");
	
	function query($query) {
		global $koneksi;
		$karyawan = mysqli_query($koneksi,$query);
		$rows = [];
		while( $data = mysqli_fetch_assoc($karyawan)){
			$rows[] = $data;
		}
		return $rows;
	}

	
	
function tambah($data){
	global $koneksi;
	
	$TxtNip = htmlspecialchars($data['TxtNip']);
	$TxtJabatan = htmlspecialchars($data['TxtJabatan']);
	$TxtNama = htmlspecialchars($data['TxtNama']);
	$TxtTempat = htmlspecialchars($data['TxtTempat']);
	$TxtLahir = htmlspecialchars($data['TxtLahir']);
	$TxtKelamin = htmlspecialchars($data['RbKelamin']);
	$TxtAlamat = htmlspecialchars($data['TxtAlamat']);
	$TxtNohp = htmlspecialchars($data['TxtNohp']);
	$TxtBergabung = htmlspecialchars($data['TxtBergabung']);
	$TxtBank = htmlspecialchars($data['TxtBank']);
	$TxtRekening = htmlspecialchars($data['TxtRekening']);
	
	$query = " INSERT INTO karyawan 
	VALUES
	('','$TxtNip','$TxtJabatan','$TxtNama','$TxtTempat','$TxtLahir','$TxtKelamin','$TxtAlamat','$TxtNohp','$TxtBergabung','$TxtBank','$TxtRekening')";
	mysqli_query ($koneksi, $query);

	return mysqli_affected_rows($koneksi);
	}
	
function hapus($nip) {
	global $koneksi;
	mysqli_query ($koneksi, "DELETE FROM karyawan WHERE nip=$nip");
	return mysqli_affected_rows($koneksi);
}
	


function ubah($data){
	global $koneksi;
	
	$TxtNip = htmlspecialchars($data['TxtNip']);
	$TxtJabatan = htmlspecialchars($data['TxtJabatan']);
	$TxtNama = htmlspecialchars($data['TxtNama']);
	$TxtTempat = htmlspecialchars($data['TxtTempat']);
	$TxtLahir = htmlspecialchars($data['TxtLahir']);
	$TxtKelamin = htmlspecialchars($data['RbKelamin']);
	$TxtAlamat = htmlspecialchars($data['TxtAlamat']);
	$TxtNohp = htmlspecialchars($data['TxtNohp']);
	$TxtBergabung = htmlspecialchars($data['TxtBergabung']);
	$TxtBank = htmlspecialchars($data['TxtBank']);
	$TxtRekening = htmlspecialchars($data['TxtRekening']);
	
	$query = "UPDATE karyawan SET 
				nip ='$TxtNip',
				id_jabatan ='$TxtJabatan',
				nama = '$TxtNama',
				tempat_lahir = '$TxtTempat',
				tanggal_lahir = '$TxtLahir',
				jenis_kelamin = '$TxtKelamin',
				alamat = '$TxtAlamat',
				no_hp = '$TxtNohp',
				tanggal_bergabung = '$TxtBergabung',
				nama_bank = '$TxtBank',
				no_rekening = '$TxtRekening'
			WHERE nip = $TxtNip	
			  ";
	mysqli_query ($koneksi, $query);


	return mysqli_affected_rows($koneksi);
}




function cari($keyword){
	$query = " SELECT * FROM karyawan WHERE
	nama LIKE '%$keyword%' 
	";
	return query($query);

}



function registrasi($data) {
	global $koneksi;
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($koneksi,$data["password"]);
	$password2 = mysqli_real_escape_string($koneksi,$data["password2"]);


	// cek username sudah ada atau belum
	$result = mysqli_query($koneksi," SELECT username FROM akun WHERE 
		username = '$username'");
	if (mysqli_fetch_assoc($result)) {
		echo "
				<script>
				alert('username sudah terdaftar');
				</script>
		";
		return false;
	}

	// cek konfirmasi password
	if ($password !== $password2 ) {
		echo " <script>
				alert('konfirmasi password tidak sesuai');
			   </script> ";
		return false;
	}
	//enkripsi password

	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan user baru kedalam database
	mysqli_query($koneksi, " INSERT INTO akun VALUES('','$username','$password') ");

	return mysqli_affected_rows($koneksi);
}


function datajabatan($query) {
	global $koneksi;
	$jabatan = mysqli_query($koneksi,$query);
	$rows = [];
	while( $data = mysqli_fetch_assoc($jabatan)){
	$rows[] = $data;
}
	return $rows;

}







function tambahjabatan($data) {
global $koneksi;

$TxtJabatan = htmlspecialchars($data['TxtJabatan']);
$TxtNip = htmlspecialchars($data['TxtNip']);
$TxtNama = htmlspecialchars($data['TxtNama']);
$TxtPosisi = htmlspecialchars($data['TxtPosisi']);
$TxtGaji = htmlspecialchars($data['TxtGaji']);

$query = " INSERT INTO jabatan 
	VALUES
	('','$TxtJabatan','$TxtNip','$TxtNama','$TxtPosisi','$TxtGaji')";
	mysqli_query ($koneksi, $query);

	return mysqli_affected_rows($koneksi);
	

}





function hapusjabatan($nip2) {
	global $koneksi;
	mysqli_query ($koneksi, "DELETE FROM jabatan WHERE nip=$nip2");
	return mysqli_affected_rows($koneksi);
}





function ubahjabatan($data){
	global $koneksi;

	$TxtJabatan = htmlspecialchars($data['TxtJabatan']);
	$TxtNip = htmlspecialchars($data['TxtNip']);
	$TxtNama = htmlspecialchars($data['TxtNama']);
	$TxtPosisi = htmlspecialchars($data['TxtPosisi']);
	$TxtGaji = htmlspecialchars($data['TxtGaji']);

		$query = "UPDATE jabatan SET 
				id_jabatan ='$TxtJabatan',
				nip ='$TxtNip',
				nama = '$TxtNama',
				posisi = '$TxtPosisi',
				gaji_pokok = '$TxtGaji'

			WHERE nip = $TxtNip";
	mysqli_query ($koneksi, $query);
	return mysqli_affected_rows($koneksi);

}























?>

























