<?php
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$username =mysqli_real_escape_string($koneksi,$_POST['username']);
$pass =mysqli_real_escape_string($koneksi, $_POST['pass']);
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from admin where username='$username' and pass='$pass'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
$sesi = mysqli_query($koneksi,"select * from admin where username='$username' and pass='$pass'");
$sesi = mysqli_fetch_assoc($sesi);
	$_SESSION['id'] = $sesi['id_admin'];
	$_SESSION['nama'] = $sesi['nama'];
	$_SESSION['status'] = "login";
	header("location:index.php");
}else{
	echo "<script>alert('Username atau password salah')</script>
		<meta http-equiv='refresh' content='0 url=login.php'>";
}
?>