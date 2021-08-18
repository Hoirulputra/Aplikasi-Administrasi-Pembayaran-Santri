<?php
//include('dbconnected.php');
include('koneksi.php');

$nama = $_GET['nama'];
$username = $_GET['username'];
$pass = $_GET['pass'];
$hak_akses = $_GET['hak_akses'];
$id_santri = $_GET['id_santri'];

//query update
if ($hak_akses != 'santri')
	$queryString = "INSERT INTO `admin` (`nama`, `username`, `pass`, `hak_akses`, `id_santri`) VALUES ('$nama', '$username', '$pass', '$hak_akses', NULL)";
else 
	$queryString = "INSERT INTO `admin` (`nama`, `username`, `pass`, `hak_akses`, `id_santri`) VALUES ('$nama', '$username', '$pass', '$hak_akses', '$id_santri')";
if ($query) {
echo "<script>alert('Data Berhasil di Tambah')</script>
	<meta http-equiv='refresh' content='0 url=profile.php'>";
}
else{
 echo "<script>alert('Data Gagal di Tambah')</script>
	<meta http-equiv='refresh' content='0 url=profile.php'>";
}

//mysql_close($host);
?>