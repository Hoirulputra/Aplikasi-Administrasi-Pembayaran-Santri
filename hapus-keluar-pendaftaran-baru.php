<?php
//include('dbconnected.php');
include('koneksi.php');

$id = $_GET['id'];

//query update
$query = mysqli_query($koneksi,"DELETE FROM `keluar_pendaftaran_baru` WHERE id = '$id'");

if ($query) {
 # credirect ke page index
 echo ("<script>alert('Data Berhasil di Hapus')</script><script>location.href='keluar-pendaftaran-baru.php'</script>");
}
else{
 echo "<script>alert('Data Gagal di Hapus')</script><script>location.href='keluar-pendaftaran-baru.php'</script>";
}

//mysql_close($host);
?>