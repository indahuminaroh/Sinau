<?php
include 'koneksi.php';

$id_barang = $_GET['id'];

if (isset($_POST['submit'])) {

	$nama = $_POST['nama'];
	$jumlah = $_POST['jumlah'];
	$jenis = $_POST['jenis'];
	$keadaan = $_POST['keadaan'];

//echo $nama . "," . $jumlah . "," . $jenis . "," . $keadaan;

	$sql = "UPDATE barang SET nama_barang='$nama', jumlah='$jumlah', id_jenis='$jenis', keadaan='$keadaan' WHERE id_barang='$id_barang'";
	$data = mysqli_query($koneksi, $sql);

	if ($data) {
		echo "berhasil";
	}else {
		echo "gagal";
		echo mysqli_error($koneksi);
	}
}

$sql = "SELECT nama_barang, jumlah, id_jenis, keadaan FROM barang WHERE id_barang='$id_barang'";
$data = mysqli_query($koneksi, $sql);

$barang = mysqli_fetch_assoc($data);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST">
		<label>Nama Barang</label>
		<input type="text" name="nama" value="<?php echo $barang['nama_barang']?>"><br>
		<label>Jumlah</label>
		<input type="number" name="jumlah" value="<?php echo $barang['jumlah']?>"><br>
		<label>Jenis</label>
		<select name="jenis">
			<option value="<?php echo $barang['id_jenis']?>">
				<?php echo $barang['id_jenis']?>
			</option>
			<option value="1">Berbahaya</option>
			<option value="2">Mudah Pecah</option>
			<option value="3">Beracun</option>
		</select><br>
		<label>Keadaaan</label>
		<select name="keadaan">
			<option value="<?php echo $barang['keadaan']?>">
				<?php echo $barang['keadaan']?>
			</option>
			<option value="bekas">Bekas</option>
			<option value="baru">Baru</option>
		</select><br>
		<input type="submit" name="submit" value="Kirim">
	</form>
</body>
</html>
