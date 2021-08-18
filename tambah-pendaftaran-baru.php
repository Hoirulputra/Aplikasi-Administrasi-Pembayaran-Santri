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


// $id = $_GET['id'];
$uang_pendaftaran_baru = $_GET['uang_pendaftaran_baru'];
$uang_sewa_lemari = $_GET['uang_sewa_lemari'];
$uang_seragam_pondok = $_GET['uang_seragam_pondok'];
$uang_pembangunan = $_GET['uang_pembangunan'];
$uang_ujian = $_GET['uang_ujian'];
$tgl_pembayaran = $_GET['tanggal_pembayaran'];
$tahun_pembayaran = $_GET['tahun_pembayaran'];
$semester_pembayaran = $_GET['semester_pembayaran'];

//query update
$query = mysqli_query($koneksi,"INSERT INTO `pendaftaran_baru` (`id`,`id_santri`, `uang_pendaftaran_baru`, `uang_sewa_lemari`, `uang_seragam_pondok`, `uang_pembangunan`, `uang_ujian`, `tanggal_pembayaran`, `tahun_pembayaran`, `semester_pembayaran`) VALUES (null,'$id' ,  '$uang_pendaftaran_baru', '$uang_sewa_lemari', '$uang_seragam_pondok', '$uang_pembangunan', '$uang_ujian', '$tgl_pembayaran', '$tahun_pembayaran', '$semester_pembayaran')");

if ($query) {
 echo "<script>alert('Data Berhasil di Tambah')</script>
	<meta http-equiv='refresh' content='0 url=pendaftaran-baru.php'>";
}
else{
 echo "<script>alert('Data Gagal di Tambah')</script>
	<meta http-equiv='refresh' content='0 url=pendaftaran-baru.php'>";
}

//mysql_close($host);
?>