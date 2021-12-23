<?php

session_start();

if (!isset($_SESSION["login"])) {
	header("Location:login.php");
	exit;
}

?>

<!DOCTYPE html>
<html>

<head>
	<?php include "header.php"; ?>
	<title>Rekapitulasi Absensi</title>

	<style>
		body {
			font-family: 'Poppins', sans-serif;
			background-color: #eee;
		}

		input.tgl-mulai {
			margin-right: 10px;
		}

		button.filter {
			margin-left: 10px;
		}

		@media (max-width:576px) {

			input.tgl-mulai {
				margin-bottom: 5px;
			}

			button.filter {
				margin-top: 5px;
			}

			h3 {
				font-size: 25px;
			}
		}
	</style>
</head>

<body>

	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid mt-3">

		<h3>Rekap Absensi</h3>

		<form method="post" class="form-inline">
			<input type="date" name="tgl_mulai" class="tgl-mulai form-control">
			<input type="date" name="tgl_selesai" class="tgl-selesai form-control">
			<button type="submit" name="filter_tgl" class="btn filter btn-info ">Filter</button>
		</form>
		<br>

		<table class="table table-striped table-hover">
			<thead class="thead-dark">
				<tr class="text-center">
					<th scope=" col">No</th>
					<th scope="col">Nama</th>
					<th scope="col">Nama</th>
					<th scope="col">Tanggal</th>
					<th scope="col">Jam Masuk</th>
					<th scope="col">Jam Pulang</th>
				</tr>
			</thead>
			<tbody>
				<?php
				include "koneksi.php";

				if (isset($_POST['filter_tgl'])) {
					$mulai = $_POST['tgl_mulai'];
					$selesai = $_POST['tgl_selesai'];

					if ($mulai != null || $selesai != null) {

						$sql = mysqli_query($konek, "SELECT b.nama, a.tanggal, a.jam_masuk, a.jam_pulang FROM absensi a, karyawan b WHERE a.nokartu=b.nokartu and tanggal BETWEEN '$mulai' and DATE_ADD('$selesai',INTERVAL 1 DAY)");
					} else {
						date_default_timezone_set('Asia/Jakarta');
						$tanggal = date('Y-m-d');
						$sql = mysqli_query($konek, "select b.nama, a.tanggal, a.jam_masuk, a.jam_pulang from absensi a, karyawan b where a.nokartu=b.nokartu and a.tanggal='$tanggal'");
					}
				} else {
					date_default_timezone_set('Asia/Jakarta');
					$tanggal = date('Y-m-d');
					$sql = mysqli_query($konek, "select b.nama, a.tanggal, a.jam_masuk, a.jam_pulang from absensi a, karyawan b where a.nokartu=b.nokartu and a.tanggal='$tanggal'");
				}

				//baca tabel absensi dan relasikan dengan tabel karyawan berdasarkan nomor kartu RFID untuk tanggal hari ini

				//baca tanggal saat ini


				// filter absensi berdasarkan tanggal saat ini

				$no = 0;
				while ($data = mysqli_fetch_array($sql)) {
					$no++;
				?>
					<tr class="text-center">
						<td scope="row"> <?php echo $no; ?> </td>
						<td><?php echo $data['nama']; ?> </td>
						<td> <?php echo $data['tanggal']; ?> </td>
						<td> <?php echo $data['jam_masuk']; ?> </td>
						<td> <?php echo $data['jam_pulang']; ?> </td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

	<?php include "footer.php"; ?>

</body>

</html>