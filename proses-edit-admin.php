<?php
//include('dbconnected.php');
include('koneksi.php');

$id = $_GET['id_admin'];
$nama = $_GET['nama'];
$username = $_GET['username'];
$pass = $_GET['pass'];

//query update
$query = mysqli_query($koneksi,"UPDATE admin SET nama='$nama' , username='$username', pass='$pass' WHERE id_admin='$id' ");

if ($query) {
 echo "<script>alert('Data Berhasil di Edit')</script>
	<meta http-equiv='refresh' content='0 url=profile.php'>";  
}
else{
 echo "<script>alert('Data Gagal di Edit')</script>
	<meta http-equiv='refresh' content='0 url=profile.php'>";
}

//mysql_close($host);
?>