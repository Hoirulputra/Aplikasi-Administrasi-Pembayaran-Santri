	<!-- cek apakah sudah login -->
	<?php 
	require 'koneksi.php';
	function urlRedirectWhenLogged($akses) {
		switch ($akses) {
			case 'admin':
				return 'index.php';
				break;
			
			case 'bendahara':
				return 'index.php';
				break;

			case 'santri':
				return 'santri.php';
				break;
		}
	}
	if (isset($_COOKIE['logged_username'])) {
		if (isset($_COOKIE['logged_akses'])) {
			$username = $_COOKIE['logged_username'];
			$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '${username}'");
			$logged_user = mysqli_fetch_assoc($query);
		}
		else {
			unset($_COOKIE['logged_username']);
			unset($_COOKIE['logged_akses']);
			setcookie('username', null, -1);
			setcookie('hak_akses', null, -1);
			header('location:login.php');
		}
	}
	else  {
		unset($_COOKIE['logged_username']);
		unset($_COOKIE['logged_akses']);
		setcookie('username', null, -1);
		setcookie('hak_akses', null, -1);
		header('location:login.php');
	}
	?>