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
$query = mysqli_query($koneksi,"UPDATE santri SET nama_santri='$nama' , jenis_kelamin='$jenis', alamat='$alamat', ayah_santri='$ayah', ibu_santri='$ibu', status='$status', tahun_masuk='$tahun', semester='$semester', uang_bulanan='$uang_bulanan', daftar_ulang='$daftar_ulang' WHERE id='$id' ");


if ($query) {
 echo "<script>alert('Data Berhasil di Tambah')</script>
	<meta http-equiv='refresh' content='0 url=sudah-daftar-ulang.php'>"; 
}
else{
 echo "<script>alert('Data Gagal di Tambah')</script>
	<meta http-equiv='refresh' content='0 url=sudah-daftar-ulang.php'>"; 
}

//mysql_close($host);
?>