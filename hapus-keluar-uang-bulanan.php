<?php
//include('dbconnected.php');
include('koneksi.php');

$id = $_GET['id'];

//query update
$query = mysqli_query($koneksi,"DELETE FROM `keluar_uang_bulanan` WHERE id = '$id'");

if ($query) {
 # credirect ke page index
 echo ("<script>alert('Data Berhasil di Hapus')</script><script>location.href='javascript:history.back()'</script>");
}
else{
 echo "<script>alert('Data Gagal di Hapus')</script><script>location.href='javascript:history.back()'</script>";
}

//mysql_close($host);
?>