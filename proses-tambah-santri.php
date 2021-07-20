<?php
//include('dbconnected.php');
include('koneksi.php');

$id = $_GET['id'];
$nama = $_GET['nama_santri'];
$jenis = $_GET['jenis_kelamin'];
$alamat = $_GET['alamat'];
$ayah = $_GET['ayah_santri'];
$ibu = $_GET['ibu_santri'];
$status = $_GET['status'];
$tahun = $_GET['tahun_masuk'];
$semester = $_GET['semester'];
$uang_bulanan = $_GET['uang_bulanan'];
$daftar_ulang = $_GET['daftar_ulang'];

//query update
$query = mysqli_query($koneksi,"INSERT INTO `santri` (`id`, `nama_santri`, `jenis_kelamin`, `alamat`, `ayah_santri`, `ibu_santri`, `status`, `tahun_masuk`, `semester`, `uang_bulanan`, `daftar_ulang`) VALUES ('$id', '$nama', '$jenis', '$alamat', '$ayah', '$ibu', '$status', '$tahun', '$semester', '$uang_bulanan', '$daftar_ulang')");

if ($query) {
 echo "<script>alert('Data Berhasil di Tambah')</script>
	<meta http-equiv='refresh' content='0 url=data-santri.php'>";
}
else{
	 echo "<script>alert('Data Gagal di Tambah')</script>
	<meta http-equiv='refresh' content='0 url=data-santri.php'>";
}

//mysql_close($host);
?>