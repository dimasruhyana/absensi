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
	<title>Data Siswa</title>
	<style>
		body {
			font-family: 'Poppins', sans-serif;
			background-color: #eee;
		}

		a.hdata-karyawan {
			color: red;
		}

		@media (max-width:576px) {

			h3 {
				font-size: 25px;
			}
		}
	</style>
</head>

<body>

	<?php include "menu.php"; ?>

	<div class="container-fluid mt-3">
		<h3>Data Siswa</h3><br>

		<table class="table table-striped table-hover">
			<thead class="thead-dark">
				<tr class=" text-center">
					<th scope=" col">No</th>
					<th scope="col">No.Kartu</th>
					<th scope="col">Nama</th>
					<th scope="col">Alamat</th>
					<th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>

				<?php
				//koneksi ke database
				include "koneksi.php";

				//baca data karyawan
				$sql = mysqli_query($konek, "select * from karyawan");
				$no = 0;
				while ($data = mysqli_fetch_array($sql)) {
					$no++;
				?>


					<tr class="text-center">
						<th scope="row"><?php echo $no; ?></th>
						<td><?php echo $data['nokartu']; ?></td>
						<td><?php echo $data['nama']; ?></td>
						<td><?php echo $data['alamat']; ?></td>
						<td>
							<a href="edit.php?id=<?php echo $data['id']; ?>"> Edit</a> | <a href="hapus.php?id=<?php echo $data['id']; ?>" class="hdata-karyawan" onclick="return confirm('YAKIN ?');"> Hapus</a>
						</td>
					</tr>

				<?php } ?>

			</tbody>
		</table>

		<!-- tombol tambah data karyawan -->
		<a href="tambah.php"> <button class="btn btn-success">Tambah Data</button> </a>

	</div>

	<?php include "footer.php"; ?>

</body>

</html>