<?php
include 'koneksi.php';

$id_barang = $_GET['id'];

$sql = "DELETE FROM barang WHERE id_barang='$id_barang'";

$barang = mysqli_query($koneksi, $sql);

if ($barang) {
		echo "berhasil dihapus";
	}else {
		echo "gagal";
		echo mysqli_error($koneksi);
	}

?>
