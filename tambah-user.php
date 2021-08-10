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
	$queryString = "INSERT INTO `admin` (`nama`, `username`, `pass`, `hak_akses`) VALUES ('$nama', '$username', '$pass', '$hak_askes')";
else 
	$queryString = "INSERT INTO `admin` (`nama`, `username`, `pass`, `hak_akses`, `id_santri`) VALUES ('$nama', '$username', '$pass', '$hak_akses', '$id_santri')";

$query = mysqli_query($koneksi, $queryString);

// echo mysqli_error($koneksi);
// die;
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