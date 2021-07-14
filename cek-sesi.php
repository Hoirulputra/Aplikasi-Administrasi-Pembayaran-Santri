	<!-- cek apakah sudah login -->
	<?php 
	session_start();
	require 'koneksi.php';
	if (isset($_SESSION['status'])) {
		if($_SESSION['status']!="login"){
			// header("location:login.php");
		}
	}
	?>