<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION["login"])) {
	header("Location:login.php");
	exit;
}



//baca id data yang akan dihapus
$id = $_GET['id'];

//hapus data
$hapus = mysqli_query($konek, "delete from karyawan where id='$id'");

//jika berhasil terhapus tampilkan pesan Terhapus
//kemudian kembali ke data karyawan
if ($hapus) {
	echo "
			<script>
				alert('Terhapus');
				location.replace('datakaryawan.php');
			</script>
		";
} else {
	echo "
			<script>
				alert('Gagal Terhapus');
				location.replace('datakaryawan.php');
			</script>
		";
}
