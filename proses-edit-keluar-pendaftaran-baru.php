<?php
//include('dbconnected.php');
include('koneksi.php');

$id = $_GET['id'];
$tanggal_tagihan = $_GET['tanggal_tagihan'];
$nominal_tagihan = $_GET['nominal_tagihan'];
$ket_tagihan = $_GET['ket_tagihan'];
$jenis_tagihan = $_GET['jenis_tagihan'];

//query update
$query = mysqli_query($koneksi,"UPDATE keluar_pendaftaran_baru SET tanggal_tagihan='$tanggal_tagihan' , nominal_tagihan='$nominal_tagihan', ket_tagihan='$ket_tagihan', jenis_tagihan='$jenis_tagihan' WHERE id='$id' ");

if ($query) {
 echo "<script>alert('Data Berhasil di Edit')</script>
	<meta http-equiv='refresh' content='0 url=keluar-pendaftaran-baru.php'>"; 
}
else{
 echo "<script>alert('Data Gagal di Edit')</script>
	<meta http-equiv='refresh' content='0 url=keluar-pendaftaran-baru.php'>"; 
}

//mysql_close($host);
?>