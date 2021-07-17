<?php
//include('dbconnected.php');
include('koneksi.php');

$nama = $_GET['nama'];
$username = $_GET['username'];
$pass = $_GET['pass'];


//query update
$query = mysqli_query($koneksi,"INSERT INTO `admin` (`nama`, `username`, `pass`) VALUES ('$nama', '$username', '$pass')");

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