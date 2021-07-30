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

  <title>Admin</title>
  <link href='logo.jpg' rel='icon' type='image/x-icon'/>

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
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data <?php echo $row['nama_santri']; ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-borderless">
        <tbody>
        <tr>
        <td width="30%"><b>Nomor Induk Santri</b></td>
        <td><?php echo $row['id']; ?></td>
        </tr>
        
        <tr>
        <td><b>Nama</b></td>
        <td><?php echo $row['nama_santri']; ?></td>
        </tr>
        
        <tr>
        <td><b>Jenis Kelamin</b></td>
        <td><?php echo $row['jenis_kelamin']; ?></td>
        </tr>
        
        <tr>
        <td><b>Alamat</b></td>
        <td><?php echo $row['alamat']; ?></td>
        </tr>
        
        <tr>
        <td><b>Nama Ayah</b></td>
        <td><?php echo $row['ayah_santri']; ?></td>
        </tr>
        
        <tr>
        <td><b>Nama Ibu</b></td>
        <td><?php echo $row['ibu_santri']; ?></td>
        </tr>
        
        <tr>
        <td><b>Tahun/Semester Masuk</b></td>
        <td><?php echo $row['tahun_masuk']; ?>/<?php echo $row['semester']; ?></td>
        </tr>
        
        <tr>
        <td><b>Status Santri</b></td>
        <td><?php echo $row['status']; ?></td>
        </tr>
        </tbody>
        </table>
              </div>
            </div>
          </div>
  

<div class="card shadow mb-4">
            <div class="card-body">
              
        
        
        <div class="float-left">
              <h5 style="margin-top: 3px !important;" class="m-0 font-weight-bold text-primary">Riwayat Uang Pendaftaran Santri Baru</h5>
       </div>
       
       <div class="float-right">
        <a title="Lihat Riwayat" href="lihat-santri-pendaftaran-baru.php?id=<?=$row['id'];?>" class="btn btn-success btn-sm"><i class="fa fa-eye"> </i> Lihat Riwayat</a>
        </div>
        
            </div>
        </div>
        
<div class="card shadow mb-4">
            <div class="card-body">
              
        
        <div class="float-left">
              <h5 style="margin-top: 3px !important;" class="m-0 font-weight-bold text-primary">Riwayat Uang Pendaftaran Ulang</h5>
       </div>
       
       <div class="float-right">
        <a title="Lihat Riwayat" href="lihat-santri-pendaftaran-ulang.php?id=<?=$row['id'];?>" class="btn btn-success btn-sm"><i class="fa fa-eye"> </i> Lihat Riwayat</a>
        </div>
            </div>
        </div>
        

<div class="card shadow mb-4">
            <div class="card-body">
              
        
        <div class="float-left">
              <h5 style="margin-top: 3px !important;" class="m-0 font-weight-bold text-primary">Riwayat Uang Bulanan</h5>
       </div>
       
       <div class="float-right">
        <a title="Lihat Riwayat" href="lihat-santri-uang-bulanan.php?id=<?=$row['id'];?>" class="btn btn-success btn-sm"><i class="fa fa-eye"> </i> Lihat Riwayat</a>
        </div>
            </div>
        </div>
        
       
        
        


        </div>
        <!-- /.container-fluid -->
<?php 
}
//mysql_close($host);
?>  
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
