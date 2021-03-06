<?php
require 'cek-sesi.php';
if (isset($_COOKIE['logged_akses'])) {
  if ($_COOKIE['logged_akses'] != 'admin') {
    $url = urlRedirectWhenLogged($_COOKIE['logged_akses']);
    echo "Anda tidak berhak mengakses halaman ini <br/>";
    echo "<a href='${url}'>Kembali</a>";
    die;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>
  <link href='logo.png' rel='icon' type='image/x-icon' />

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <?php require 'koneksi.php'; ?>
  <?php require 'sidebar.php'; ?>
  <!-- Main Content -->
  <div id="content">

    <?php require 'navbar.php'; ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">



      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header">
          <div class="float-left">
            <h3 style="margin-top: 5px !important;" class="m-0 font-weight-bold text-primary">Data Pengguna</h3>
          </div>

          <div class="float-right">
            <button type="button" class="btn btn-success btn-sm" style="margin:5px;" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"><b> TAMBAH USER</b></i></button><br>
          </div>

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Hak Akses</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
              </tfoot>
              <tbody>
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM admin");
                while ($data = mysqli_fetch_assoc($query)) {
                ?>
                  <tr>
                    <td><?= $data['id_admin'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['username'] ?></td>
                    <td><?= $data['password'] ?></td>
                    <td><?= $data['hak_akses'] ?></td>
                    <td style="text-align:center;">
                      <!-- Button untuk modal -->
                      <a href="#" type="button" class=" fa fa-edit btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['id_admin']; ?>"></a>
                      <a title="Hapus" href="hapus-profile.php?id=<?= $data['id_admin']; ?>" class="content-hapus fa fa-times-circle btn btn-danger btn-sm"></a>
                    </td>
                  </tr>

                  <!-- Modal Edit Mahasiswa-->
                  <div class="modal fade" id="myModal<?php echo $data['id_admin']; ?>" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Ubah Data Admin</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          <form role="form" action="proses-edit-admin.php" method="get">

                            <?php
                            $id = $data['id_admin'];
                            $query_edit = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$id'");
                            //$result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($query_edit)) {
                            ?>
                              <input type="hidden" name="id_admin" value="<?php echo $row['id_admin']; ?>">
                              <div class="form-group">
                                <label>ID</label>
                                <input type="text" name="id" class="form-control" value="<?php echo $row['id_admin']; ?>" disabled>
                              </div>

                              <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">
                              </div>

                              <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>">
                              </div>

                              <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control" value="<?php echo $row['password']; ?>">
                              </div>

                              <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Ubah</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                              </div>
                            <?php
                            }
                            //mysql_close($host);
                            ?>

                          </form>
                        </div>
                      </div>

                    </div>
                  </div>

                <?php
                }
                ?>

                <!-- Modal -->
                <div id="myModalTambah" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- konten modal-->
                    <div class="modal-content">
                      <!-- heading modal -->
                      <div class="modal-header">
                        <h4 class="modal-title"> TAMBAH USER</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <!-- body modal -->
                      <form action="tambah-user.php" method="get">
                        <div class="modal-body">
                          Nama
                          <input type="text" class="form-control" name="nama">
                          Username
                          <input type="text" class="form-control" name="username">
                          Password
                          <input type="password" class="form-control" name="password">
                          Hak Akses
                          <select name="hak_akses" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="bendahara">Bendahara</option>
                            <option value="santri">Santri</option>
                          </select>
                          <div class="santri-form-wrapper">
                            Santri
                            <select name="id_santri" class="form-control">
                              <?php
                              $query = mysqli_query($koneksi, "SELECT * FROM santri ORDER BY nama_santri ASC");
                              while ($santri = mysqli_fetch_assoc($query)) {
                              ?>
                                <option value="<?= $santri['id'] ?>"><?= $santri['nama_santri'] ?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <!-- footer modal -->
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success">Tambah</button>
                      </form>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    </div>
                  </div>

                </div>
          </div>



          </tbody>
          </table>
        </div>
      </div>
    </div>


  </div>
  <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <?php require 'footer.php' ?>

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php require 'logout-modal.php'; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script>
    $(".santri-form-wrapper").hide()
    $("[name='hak_akses']").change(function(e) {
      e.preventDefault();
      value = $(this).val()
      if (value == 'santri')
        $(".santri-form-wrapper").show()
    })
    $(".content-hapus").click(function(e) {
      if (!confirm('Anda Yakin Ingin Menghapus?')) {
        e.preventDefault()
      }
    })
  </script>
</body>

</html>