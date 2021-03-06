<?php

include 'koneksi.php';
$sql = "SELECT 	id_barang, nama_barang, jumlah, tgl_masuk, id_jenis, keadaan FROM barang";
$data = mysqli_query($koneksi, $sql);
 //bila menggunakan fungsi
function tampilJenis($idJenis, $koneksi){
	$sql = "SELECT nama_jenis FROM jenis WHERE id_jenis=$idJenis";
	$data = mysqli_query($koneksi, $sql);
	$jenis = mysqli_fetch_assoc($data);
	return $jenis['nama_jenis'];
}
//var_dump($data);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inventory</title>
</head>
<body>
	<table border="1px">
		<b>Gudang Barang</b><br/>
		<a href="input_barang.php">Tambah Barang</a>
		<tr>
			<th>Nama</th>
			<th>Jumlah</th>
			<th>Tgl Masuk</th>
			<th>Jenis</th>
			<th>Keadaan</th>
			<th>Aksi</th>
		</tr>
<?php
	foreach ($data as $barang):
?>
		<tr>
			<td><?php echo $barang['nama_barang'];?>
			</td>
			<td><?php echo $barang['jumlah'];?>
			</td>
			<td><?php echo $barang['tgl_masuk'];?>
			</td>
			<td><?php echo tampilJenis($barang['id_jenis'],$koneksi);?>
			</td>
			<td><?php echo $barang['keadaan'];?>
			</td>
			<td>
				<a href="ubah_barang.php?id=<?php echo $barang['id_barang']?>">Edit</a>
				<a href="hapus_barang.php?id=<?php echo $barang['id_barang']?>">Delete</a>
			</td>
		</tr>
<?php
	endforeach;
?> 
	</table>
</body>
</html>