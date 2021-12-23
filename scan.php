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
	<title>Scan Kartu</title>

	<style>
		body {
			font-family: 'Poppins', sans-serif;
			background-color: #eee;
		}
	</style>

	<!-- scanning membaca kartu RFID -->
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function() {
				$("#cekkartu").load('bacakartu.php')
			}, 2000);
		});
	</script>

</head>

<body>

	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid" style="padding-top: 7%">
		<div id="cekkartu"></div>
	</div>
	<br>

	<?php include "footer.php"; ?>

</body>

</html>