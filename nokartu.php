<?php
include "koneksi.php";
//baca isi tabel tmprfid
$sql = mysqli_query($konek, "select * from tmprfid");
$data = mysqli_fetch_array($sql);

if ($data == null) {
	$nokartu = '';
} else {
	//baca nokartu
	$nokartu = $data['nokartu'];
}

?>

<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label>No. kartu</label>
			<input type="text" name="nokartu" id="nokartu" placeholder="tempelkan kartu rfid Anda" class="form-control" value="<?= $nokartu; ?>">
		</div>
	</div>
</div>