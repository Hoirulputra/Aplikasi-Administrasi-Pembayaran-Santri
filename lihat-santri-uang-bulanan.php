<?php
require 'cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

 <?php if ($_COOKIE['logged_akses'] == 'admin' || $_COOKIE['logged_akses'] == 'bendahara') : ?>
    <title>Admin</title>
  <?php endif; ?>
  <?php if ($_COOKIE['logged_akses'] == 'santri') : ?>
    <title>Santri</title>
  <?php endif; ?>
  <link href='logo.png' rel='icon' type='image/x-icon' />

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
<div class="clearfix">
          <div class="float-right">
         
            <a href="javascript:history.back()" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i> Kembali</a>
          </div>
          
        </div>
        <br>    

<?php
$id = $_GET['id']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM santri WHERE id='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Riwayat Uang Bulanan - <?php echo $row['nama_santri']; ?></h6>
            </div>
<?php 
}
//mysql_close($host);
?>  
            <div class="card-body">
              <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tanggal Pembayaran</th>
                      <th>Untuk Uang Bulan</th>
            <th>Tahun</th>
            <th>Uang Makan</th>
            <th>Uang Asrama</th>
                      <th>Uang Listrik</th>
            <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
          <?php 
$query = mysqli_query($koneksi,"SELECT * FROM uang_bulanan WHERE id_santri='$id'");
$no = 1;
while ($data1 = mysqli_fetch_assoc($query)) 
{
?>
                    <tr>
                      <td><?=$data1['tanggal_pembayaran']?></td>
                      <td><?=$data1['bulan_pembayaran']?></td>
            <td><?=$data1['tahun_pembayaran']?></td>
            <td>Rp. <?php echo number_format($data1['uang_makan'], 0, ',', '.'); ?></td>
            <td>Rp. <?php echo number_format($data1['uang_asrama'], 0, ',', '.'); ?></td>
            <td>Rp. <?php echo number_format($data1['uang_listrik'], 0, ',', '.'); ?></td>
            <td style="text-align:center;">
                    <!-- Button untuk modal -->
<!-- <a title="Hapus" href="hapus-uang-bulanan.php?id=<?=$data1['id'];?>" Onclick="confirm('Anda Yakin Ingin Menghapus?')" class="fa fa-times-circle btn btn-danger btn-sm"></a> -->
</td>
</tr>
<?php               
} 
?>
</tbody>
</table>
        
        </div>
        </div>
        </div>
        



        </div>
        <!-- /.container-fluid -->

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
