<?php
//include('dbconnected.php');
include('../../koneksi.php');

$nama = $_POST['nama'];
$jenis = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$ayah = $_POST['nama_ayah'];
$ibu = $_POST['nama_ibu'];
$status = 'baru';

//query update
$query = mysqli_query($koneksi,"INSERT INTO `santri` (`nama_santri`, `jenis_kelamin`, `alamat`, `ayah_santri`, `ibu_santri`,  `status`) VALUES ( '$nama', '$jenis', '$alamat', '$ayah', '$ibu', '$status')");

if ($query) {
 echo "<script>alert('Data Berhasil di Tambah')</script>
	<meta http-equiv='refresh' content='0 url=../../login.php'>";
}
// else{
// 	 echo "<script>alert('Data Gagal di Tambah')</script>
// 	<meta http-equiv='refresh' content='0 url=santri.php'>";
// }

//mysql_close($host);
?>