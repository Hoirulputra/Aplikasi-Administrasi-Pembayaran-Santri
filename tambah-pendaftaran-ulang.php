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
$daftar_ulang = $_GET['daftar_ulang'];
$uang_bulanan = $_GET['uang_bulanan'];


//query update
$query = mysqli_query($koneksi,"UPDATE santri SET nama_santri='$nama' , jenis_kelamin='$jenis', alamat='$alamat', ayah_santri='$ayah', ibu_santri='$ibu', status='$status', tahun_masuk='$tahun', semester='$semester' , daftar_ulang='$daftar_ulang', uang_bulanan='$uang_bulanan' WHERE id='$id' ");

$id = $_GET['id'];
$uang_pendaftaran_ulang = $_GET['uang_pendaftaran_ulang'];
$uang_ujian = $_GET['uang_ujian'];
$tgl_pembayaran = $_GET['tanggal_pembayaran'];
$tahun_pembayaran = $_GET['tahun_pembayaran'];
$semester_pembayaran = $_GET['semester_pembayaran'];


//query update
$query = mysqli_query($koneksi,"INSERT INTO `pendaftaran_ulang` (`id`, `uang_pendaftaran_ulang`, `uang_ujian`, `tanggal_pembayaran`, `tahun_pembayaran`, `semester_pembayaran`) VALUES (null, '$id', '$uang_pendaftaran_ulang', '$uang_ujian', '$tgl_pembayaran', '$tahun_pembayaran', '$semester_pembayaran')");
if ($query) {
 echo "<script>alert('Data Berhasil di Tambah')</script>
	<meta http-equiv='refresh' content='0 url=pendaftaran-ulang.php'>";
}
else{
 echo "<script>alert('Data Gagal di Tambah')</script>
	<meta http-equiv='refresh' content='0 url=pendaftaran-ulang.php'>";
}

//mysql_close($host);
?>