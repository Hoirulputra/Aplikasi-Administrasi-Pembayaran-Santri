<?php
//include('dbconnected.php');
include('koneksi.php');

$id = $_GET['id'];
$tanggal_pembayaran = $_GET['tanggal_pembayaran'];
$nominal_pengeluaran = $_GET['nominal_pengeluaran'];
$ket_pengeluaran = $_GET['ket_pengeluaran'];
$jenis = $_GET['jenis'];

//query update
$query = mysqli_query($koneksi,"UPDATE keluar_uang_bulanan SET tanggal_pembayaran='$tanggal_pembayaran' , nominal_pengeluaran='$nominal_pengeluaran', ket_pengeluaran='$ket_pengeluaran', jenis='$jenis' WHERE id='$id' ");

if ($query) {
 echo "<script>alert('Data Berhasil di Edit')</script>
	<meta http-equiv='refresh' content='0 url=keluar-uang-bulanan.php'>"; 
}
else{
 echo "<script>alert('Data Gagal di Edit')</script>
	<meta http-equiv='refresh' content='0 url=keluar-uang-bulanan.php'>"; 
}

//mysql_close($host);
?>