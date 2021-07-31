<!DOCTYPE html>
<html lang="en">
<?php
require 'koneksi.php';
if (isset($_COOKIE['logged_username'])) {
    if (isset($_COOKIE['logged_akses'])) {
        switch ($_COOKIE['logged_akses']) {
            case 'admin':
                header('location:index.php');
                break;

            case 'bendahara':
                header('location:index.php');
                break;

            case 'santri':
                header('location:santri.php');
                break;
        }
        die;
    }
}
?>

<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '${username}' && pass = '${password}'");

    $data = mysqli_fetch_assoc($query);
    if ($data != '') {
        if ($data['hak_akses'] != '') {
            setcookie("logged_username", $data['username'], time() + 86400 * 7);
            setcookie("logged_akses", $data['hak_akses'], time() + 86400 * 7);

            switch ($data['hak_akses']) {
                case 'admin':
                    header('location:index.php');
                    break;

                case 'bendahara':
                    header('location:index.php');
                    break;

                case 'santri':
                    header('location:santri.php');
                    break;
            }
            die;
        } else {
            $logged_failed = true;
        }
    } else {
        $logged_failed = true;
    }
}

if (isset($_POST['submit_santri'])) {
    //include('dbconnected.php');
    include('koneksi.php');


    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $nama_ayah = $_POST['nama_ayah'];
    $nama_ibu = $_POST['nama_ibu'];

    //query update
    $query = mysqli_query($koneksi, "INSERT INTO `santri` (`nama_santri`, `jenis_kelamin`, `alamat`, `ayah_santri`, `ibu_santri`, `tahun_masuk`) VALUES ('$nama', '$jenis_kelamin', '$alamat', '$nama_ayah', '$nama_ibu', '')");
    $data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT LAST_INSERT_ID()"));
    if ($query) {
        header("Location:login.php?msg=santri_success&id=" . $data['LAST_INSERT_ID()']);
    } else {
        header("Location:login.php?msg=santri_failed");
    }
}
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    <link href='logo.png' rel='icon' type='image/x-icon' />

    <link href='logo.png' rel='icon' type='image/x-icon' />
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background: linear-gradient(90deg, #FC466B 0%, #3F5EFB 100%);">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-4">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <!-- Nested Row within Card Body -->

                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Aplikasi<br>Administrasi Pembayaran</h1>
                        </div>
                        <form class="user" action="" method="post" id="login">
                            <div class="form-group">
                                <input required type="text" autocomplete="off" name="username" class="form-control form-control-user" id="exampleInputUsername" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input required type="password" name="password" autocomplete="off" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label" for="customCheck">Ingat akun</label>
                                </div>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Masuk">
                            <input type="button" name="button" class="btn btn-info btn-user btn-block" data-toggle="modal" data-target="#exampleModal" value="Daftar">
                            <?php
                            if (isset($logged_failed)) {
                            ?>
                                <span>Username / Password anda tidak cocok dengan sistem</span>
                            <?php
                            }
                            ?>
                        </form>
                        <hr>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-title">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Daftar Santri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>



                <form class="user" action="" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input required type="text" autocomplete="off" name="nama" class="form-control form-control-user" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" required required>
                                <option value="">-- Silahkan Pilih --</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input required type="text" name="alamat" autocomplete="off" class="form-control form-control-user" placeholder="Alamat">
                        </div>
                        <div class="form-group">
                            <input required type="text" name="nama_ayah" autocomplete="off" class="form-control form-control-user" placeholder="Nama Ayah">
                        </div>
                        <div class="form-group">
                            <input required type="text" name="nama_ibu" autocomplete="off" class="form-control form-control-user" placeholder="Nama Ibu">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit_santri" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
        $("form#login").submit(function(e) {
            username = $(this).find("[name='username']").val()
            password = $(this).find("[name='password']").val()

            if (username == '' || password == '') {
                alert('Username atau Password kosong')
                e.preventDefault()
            }
        })

        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'santri_success') : ?>
        Swal.fire({
            title: 'Berhasil',
            text: 'Pendaftaran berhasil dilakukan, silahkan hubungi administrator untuk info lebih lanjut (ID: <?=((isset($_GET['id'])) ? $_GET['id'] : 'Tidak ada')?>)',
            icon: 'success',
        })
        <?php endif; ?>
    </script>
    

</body>

</html>