<?php
include 'koneksi.php';
if (isset($_POST['submit'])) {
	$nama = $_POST['nama'];
	$jumlah = $_POST['jumlah'];
	$jenis = $_POST['jenis'];
	$keadaan = $_POST['keadaan'];

//echo $nama . "," . $jumlah . "," . $jenis . "," . $keadaan;

	$sql = "INSERT INTO barang(nama_barang, jumlah, id_jenis, keadaan) VALUES ('$nama', '$jumlah', '$jenis', '$keadaan')";
	$data = mysqli_query($koneksi, $sql);

	if ($data) {
		echo "berhasi;";
	}else {
		echo "gagal";
		echo mysqli_error($koneksi);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST">
		<label>Nama Barang</label>
		<input type="text" name="nama"><br>
		<label>Jumlah</label>
		<input type="number" name="jumlah"><br>
		<label>Jenis</label>
		<select name="jenis">
			<option value="1">Berbahaya</option>
			<option value="2">Mudah Pecah</option>
			<option value="3">Beracun</option>
		</select><br>
		<label>Keadaaan</label>
		<select name="keadaan">
			<option value="bekas">Bekas</option>
			<option value="baru">Baru</option>
		</select><br>
		<input type="submit" name="submit" value="Kirim">
	</form>
</body>
</html>