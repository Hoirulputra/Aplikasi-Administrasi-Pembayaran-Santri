<?php
//include('dbconnected.php');
include('koneksi.php');


$tanggal_tagihan = $_GET['tanggal_tagihan'];
$nominal_tagihan = $_GET['nominal_tagihan'];
$ket_tagihan = $_GET['ket_tagihan'];
$jenis_tagihan = $_GET['jenis_tagihan'];

//query update
$query = mysqli_query($koneksi,"INSERT INTO `keluar_pendaftaran_ulang` (`id`, `tanggal_tagihan`, `nominal_tagihan`, `ket_tagihan`, `jenis_tagihan`) VALUES (null, '$tanggal_tagihan', '$nominal_tagihan', '$ket_tagihan', '$jenis_tagihan')");

if ($query) {
 echo "<script>alert('Data Berhasil di Tambah')</script>
	<meta http-equiv='refresh' content='0 url=keluar-pendaftaran-ulang.php'>"; 
}
else{
 echo "<script>alert('Data Gagal di Tambah')</script>
	<meta http-equiv='refresh' content='0 url=keluar-pendaftaran-ulang.php'>";
}

//mysql_close($host);
?>