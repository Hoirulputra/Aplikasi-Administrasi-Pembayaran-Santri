<?php
  require 'cek-sesi.php';
  if (isset($_COOKIE['logged_akses'])) {
    if ($_COOKIE['logged_akses'] != 'admin' && $_COOKIE['logged_akses'] != 'bendahara') {
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
  <link href='logo.png' rel='icon' type='image/x-icon'/>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Laporan Keuangan Pada Aplikasi Administrasi Pembayaran Santri PP. Hidayatul Mubtadi'in Turen </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">    
        <ul class="nav nav-tabs">
  <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#harian">Pendaftaran Baru</a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#periode">Pendaftaran Ulang</a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#periode2">Uang Bulanan</a></li>
</ul>

<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active show" id="harian"><br />
    <form action="laporan-pendaftaran-baru.php" method="POST">
        <div class="form-group">
          <label for="tgl_mulai">Mulai</label>
            <input class="form-control" type="date" name="tgl_mulai" id="tgl_mulai" value="<?php $bulan = mktime(0,0,0, date('m')-1, date('d'), date('Y')); echo date('Y-m-d', $bulan);?>" prequired="">
          </div>
          <div class="form-group">
            <label for="tgl_sampai">Sampai</label>
            <input class="form-control" type="date" name="tgl_sampai" id="tgl_sampai" value="<?=date('Y-m-d');?>" required="">
        </div>
        <button type="submit" class="btn btn-primary">Lihat Laporan</button>
      </form>
  </div>
  <div class="tab-pane fade" id="periode"><br />
    <form action="laporan-pendaftaran-ulang.php" method="POST">
        <div class="form-group">
          <label for="tgl_mulai">Mulai</label>
            <input class="form-control" type="date" name="tgl_mulai" id="tgl_mulai" value="<?php $bulan = mktime(0,0,0, date('m')-1, date('d'), date('Y')); echo date('Y-m-d', $bulan);?>" prequired="">
          </div>
          <div class="form-group">
            <label for="tgl_sampai">Sampai</label>
            <input class="form-control" type="date" name="tgl_sampai" id="tgl_sampai" value="<?=date('Y-m-d');?>" required="">
        </div>
        <button type="submit" class="btn btn-primary">Lihat Laporan</button>
      </form>
  </div>
  
  <div class="tab-pane fade" id="periode2"><br />
    <form action="laporan-uang-bulanan.php" method="POST">
        <div class="form-group">
          <label for="tgl_mulai">Mulai</label>
            <input class="form-control" type="date" name="tgl_mulai" id="tgl_mulai" value="<?php $bulan = mktime(0,0,0, date('m')-1, date('d'), date('Y')); echo date('Y-m-d', $bulan);?>" prequired="">
          </div>
          <div class="form-group">
            <label for="tgl_sampai">Sampai</label>
            <input class="form-control" type="date" name="tgl_sampai" id="tgl_sampai" value="<?=date('Y-m-d');?>" required="">
        </div>
        <button type="submit" class="btn btn-primary">Lihat Laporan</button>
      </form>
  </div>
</div>  
      </div>
      <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header">
      <div class="float-right"> 
        <div class='alert alert-info alert-dismissible fade show text-right'> <button type="submit" class="btn btn-primary">Laporan Pembayaran Santri<form action="pembayaran-santri.php" method="get">

            <select name="id_santri" class="form-control"></button>
            <?php
              $query = mysqli_query($koneksi, "SELECT * FROM santri ORDER BY nama_santri ASC");
              while ($santri = mysqli_fetch_assoc($query)) {
                ?>
              <option value="<?= $santri['id'] ?>"><?= $santri['nama_santri'] ?></option>
              <?php
              }
              ?>
            </select> 
            <button type="submit" style="margin:5px" class="btn btn-success btn-sm">Lihat Laporan</button>
          </form>
        <a class="fa fa-eye btn btn-primary btn-sm"></a>
       </div>
        </div>   
            </div> 

      <!-- End of Main Content -->

<?php require 'footer.php'?>
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
<?php require 'logout-modal.php';?>

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

</body>

</html>