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

	<title>Menu Utama</title>
	<style>
		body {
			font-family: 'Poppins', sans-serif;
			background-color: #eee;
			position: fixed;
		}

		h1 {
			font-size: 50px;
		}

		.img {
			display: flex;
			justify-content: flex-start;
			align-items: center;
			text-align: center;
		}

		.img img {
			width: 70%;

		}


		@media (max-width:576px) {
			h1 {
				font-size: 30px;
			}
		}
	</style>
</head>

<body>
	<?php include "menu.php"; ?>

	<div class="row px-3 mt-3">
		<div class="col-md-6">
			<div class="jumbotron">
				<h1>Sistem Absensi Berbasis Kartu RFID</h1>
				<hr class="my-4">
				<p class="lead">
					<a class="btn btn-success btn-lg" href="scan.php" role="button">Scan</a>
				</p>
			</div>
		</div>
		<div class="col-md-6 d-flex justify-content-center">
			<div class="img d-flex justify-content-center">
				<img src="images/ilustrasi_absen.png" alt="">
			</div>

		</div>
	</div>

	<div class="d-flex justify-content-center">
		<marquee width="25%" height="40">
			<h5 style="color:red;">IG : dimas.r10</h5>
		</marquee>
	</div>





	<?php include "footer.php"; ?>


</body>

</html>