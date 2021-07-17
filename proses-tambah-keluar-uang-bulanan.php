<?php
//include('dbconnected.php');
include('koneksi.php');


$tanggal_pembayaran = $_GET['tanggal_pembayaran'];
$nominal_pengeluaran = $_GET['nominal_pengeluaran'];
$ket_pengeluaran = $_GET['ket_pengeluaran'];
$jenis = $_GET['jenis'];

//query update
$query = mysqli_query($koneksi,"INSERT INTO `keluar_uang_bulanan` (`id`, `tanggal_pembayaran`, `nominal_pengeluaran`, `ket_pengeluaran`, `jenis`) VALUES (null, '$tanggal_pembayaran', '$nominal_pengeluaran', '$ket_pengeluaran', '$jenis')");

if ($query) {
 echo "<script>alert('Data Berhasil di Tambah')</script>
	<meta http-equiv='refresh' content='0 url=keluar-uang-bulanan.php'>";
}
else{
 echo "<script>alert('Data Gagal di Tambah')</script>
	<meta http-equiv='refresh' content='0 url=keluar-uang-bulanan.php'>";
}

//mysql_close($host);
?>