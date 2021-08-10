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
$tanggal_pembayaran = $_GET['tanggal_pembayaran'];
$bulan_pembayaran = $_GET['bulan_pembayaran'];
$tahun_pembayaran = $_GET['tahun_pembayaran'];
$uang_makan = $_GET['uang_makan'];
$uang_asrama = $_GET['uang_asrama'];
$uang_listrik = $_GET['uang_listrik'];

//query update
$query = mysqli_query($koneksi,"INSERT INTO `uang_bulanan` (`id`, `tanggal_pembayaran`, `bulan_pembayaran`, `tahun_pembayaran`, `uang_makan`, `uang_asrama`, `uang_listrik`) VALUES (null, '$id', '$tanggal_pembayaran', '$bulan_pembayaran', '$tahun_pembayaran', '$uang_makan', '$uang_asrama', '$uang_listrik')");

if ($query) {
  echo "<script>alert('Data Berhasil di Tambah')</script>
	<meta http-equiv='refresh' content='0 url=uang-bulanan.php'>";
}
else{
 echo "<script>alert('Data Gagal di Tambah')</script>
	<meta http-equiv='refresh' content='0 url=uang-bulanan.php'>";
}

//mysql_close($host);
?>