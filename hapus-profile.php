<?php
    require_once 'koneksi.php';
    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin = '${id}'");

    if ($query) {
        echo "<script>alert('Data Berhasil di Hapus')</script><script>location.href='profile.php'</script>";
    } else {
        echo "<script>alert('Data Gagal di Hapus')</script><script>location.href='profile.php'</script>";
    }
?>