<!-- proses penyimpanan -->

<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION["login"])) {
	header("Location:login.php");
	exit;
}

//jika tombol simpan diklik
if (isset($_POST['btnSimpan'])) {
	//baca isi inputan form
	$nokartu = $_POST['nokartu'];
	$nama    = $_POST['nama'];
	$alamat  = $_POST['alamat'];

	//simpan ke tabel karyawan
	$simpan = mysqli_query($konek, "insert into karyawan(nokartu, nama, alamat)values('$nokartu', '$nama', '$alamat')");

	//jika berhasil tersimpan, tampilkan pesan Tersimpan,
	//kembali ke data karyawan
	if ($simpan) {
		echo "
				<script>
					alert('Tersimpan');
					location.replace('datakaryawan.php');
				</script>
			";
	} else {
		echo "
				<script>
					alert('Gagal Tersimpan');
					location.replace('datakaryawan.php');
				</script>
			";
	}
}

//kosongkan tabel tmprfid
mysqli_query($konek, "delete from tmprfid");
?>

<!DOCTYPE html>
<html>

<head>
	<?php include "header.php"; ?>
	<title>Tambah Data Siswa</title>

	<style>
		body {
			font-family: 'Poppins', sans-serif;
			background-color: #eee;
		}
	</style>

	<!-- pembacaan no kartu otomatis -->
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function() {
				$("#norfid").load('nokartu.php')
			}, 0); //pembacaan file nokartu.php, tiap 1 detik = 1000
		});
	</script>

</head>

<body>

	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid">
		<h3 class="mt-3">Tambah Data Siswa</h3>
		<br>
		<!-- form input -->
		<form method="POST">
			<div id="norfid"></div>

			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Nama Siswqa</label>
						<input type="text" name="nama" id="nama" placeholder="nama siswa" class="form-control">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="alamat" id="alamat" placeholder="alamat"></textarea>
					</div>
				</div>
			</div>

			<button class="btn btn-success" name="btnSimpan" id="btnSimpan">Simpan</button>
		</form>
	</div>

	<?php include "footer.php"; ?>

</body>

</html>