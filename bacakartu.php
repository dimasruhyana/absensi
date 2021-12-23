<?php
include "koneksi.php";
//baca tabel status untuk mode absensi

// $sql = mysqli_query($konek, "select * from status");
// $data = mysqli_fetch_array($sql);
// $mode_absen = $data['mode'];

//uji mode absen
// $mode = "";
// if ($mode_absen == 1)
// 	$mode = "Masuk";
// else if ($mode_absen == 2)
// 	$mode = "Pulang";

//baca tabel tmprfid
$baca_kartu = mysqli_query($konek, "select * from tmprfid");
// $jumlah_data = mysqli_num_rows($baca_kartu);
$data_kartu = mysqli_fetch_array($baca_kartu);

if ($data_kartu == null) {
	$nokartu = '';
} else {
	$nokartu = $data_kartu['nokartu'];
}



?>

<div class="container-fluid" style="text-align: center;">

	<?php

	//tanggal dan jam hari ini
	date_default_timezone_set('Asia/Jakarta');
	$tanggal = date('Y-m-d');
	$jam     = date('H:i:s');

	$waktu_absen = mysqli_query($konek, "select * from waktu_absen");
	$data_wAbsen = mysqli_fetch_array($waktu_absen);
	$jMasuk_awal = $data_wAbsen['jMasuk_awal'];
	$jMasuk_akhir = $data_wAbsen['jMasuk_akhir'];
	$jPulang_awal = $data_wAbsen['jPulang_awal'];
	$jPulang_akhir = $data_wAbsen['jPulang_akhir'];

	// jam masuk dan jam pulang
	$jMasuk_awal = strtotime($tanggal . $jMasuk_awal);
	$jMasuk_akhir = strtotime($tanggal . $jMasuk_akhir);
	$jPulang_awal = strtotime($tanggal . $jPulang_awal);
	$jPulang_akhir = strtotime($tanggal . $jPulang_akhir);

	?>

	<?php if ($nokartu == '') { ?>

		<?php if ((time() >= $jMasuk_awal) && (time() <= $jMasuk_akhir)) { ?>
			<h3>Absen : <span style="color:green;" class="masuk"> <?php echo "Masuk"; ?></span> </h3>
		<?php } else if ((time() >= $jPulang_awal) && (time() <= $jPulang_akhir)) { ?>
			<h3>Absen : <span style="color:red;" class="keluar"><?php echo "Pulang"; ?></span></h3>
		<?php } else { ?>
			<h3>Absen</h3>
		<?php } ?>


		<h3>Silahkan Tempelkan Kartu RFID Anda</h3>
		<img src=" images/rfid.png" style="width: 200px"> <br>
		<img src="images/animasi2.gif">

	<?php } else {
		//cek nomor kartu RFID tersebut apakah terdaftar di tabel karyawan
		$cari_karyawan = mysqli_query($konek, "select * from karyawan where nokartu='$nokartu'");
		$jumlah_data = mysqli_num_rows($cari_karyawan);

		if ($jumlah_data == 0) {

			echo "<h1>Maaf ! Kartu Tidak Dikenali</h1>";
		} else {

			if ((time() >= $jMasuk_awal) && (time() <= $jMasuk_akhir)) {

				//ambil nama karyawan
				$data_karyawan = mysqli_fetch_array($cari_karyawan);
				$nama = $data_karyawan['nama'];

				//cek di tabel absensi, apakah nomor kartu tersebut sudah ada sesuai tanggal saat ini. Apabila belum ada, maka dianggap absen masuk, tapi kalau sudah ada, maka update data sesuai mode absensi

				$cari_absen = mysqli_query($konek, "select * from absensi where nokartu='$nokartu' and tanggal='$tanggal'");
				// hitung jumlah datanya
				$jumlah_absen = mysqli_num_rows($cari_absen);
				if ($jumlah_absen == 0) {

					echo "<h1>Selamat Datang <br>$nama</h1>";
					mysqli_query($konek, "insert into absensi(nokartu, tanggal, jam_masuk)values('$nokartu', '$tanggal', '$jam')");
				} else {
					echo "<h1>$nama Sudah Absen <br> Masuk</h1>";
				}
			} else if ((time() >= $jPulang_awal) && (time() <= $jPulang_akhir)) {

				//ambil nama karyawan
				$data_karyawan = mysqli_fetch_array($cari_karyawan);
				$nama = $data_karyawan['nama'];

				//cek di tabel absensi, apakah nomor kartu tersebut sudah ada sesuai tanggal saat ini. Apabila belum ada, maka dianggap absen masuk, tapi kalau sudah ada, maka update data sesuai mode absensi

				$cari_absen = mysqli_query($konek, "select * from absensi where nokartu='$nokartu' and tanggal='$tanggal'");
				$absen_pulang = mysqli_num_rows($cari_absen);
				//hitung jumlah datanya
				// $jumlah_absen = mysqli_num_rows($cari_absen);
				if ($absen_pulang == 0) {
					echo "<h1>Selamat Jalan <br> $nama</h1>";
					mysqli_query($konek, "insert into absensi(nokartu, tanggal, jam_pulang)values('$nokartu', '$tanggal', '$jam')");
				} else {
					echo "<h1>Selamat Jalan <br> $nama</h1>";
					mysqli_query($konek, "update absensi set jam_pulang='$jam' where nokartu='$nokartu' and tanggal='$tanggal'");
				}
			} else {

				if (time() < $jMasuk_awal) {
					echo "<h1>Maaf ! Bukan Waktunya Masuk </h1>";
				} else if ((time() > $jMasuk_akhir) && (time() < $jPulang_awal)) {
					echo "<h1>Maaf ! Bukan Waktunya Pulang </h1>";
				}
			}
		}

		//kosongkan tabel tmprfid
		mysqli_query($konek, "delete from tmprfid");
	} ?>

</div>