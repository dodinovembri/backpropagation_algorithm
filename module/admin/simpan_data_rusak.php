<?php  
	include 'module/koneksi.php';

	$id_pelanggan = $_GET['id_pelanggan'];

    // get data
    $data = mysqli_query($koneksi, "SELECT * FROM data_set WHERE id_pelanggan = $id_pelanggan");
    $row = mysqli_fetch_array($data);
    $merk = $row['merk'];
    $tipe = $row['tipe'];
    $stand = $row['stand'];
    $jenis = $row['jenis'];
    $target = $row['prediksi'];
    $masa_pakai = $row['masa_pakai'];

    // insert to data training
    $insert = mysqli_query($koneksi, "INSERT INTO data_training (`merk`, `tipe`, `stand`, `jenis`, `target`, `masa_pakai`) VALUES ('$merk', '$tipe', '$stand', '$jenis', '$target', '$masa_pakai')");

    // update data set
	$query = mysqli_query($koneksi, "UPDATE data_set SET status = 0 WHERE id_pelanggan = $id_pelanggan");
	echo "<script>window.location.href = '?module=data_set';</script>";

?>