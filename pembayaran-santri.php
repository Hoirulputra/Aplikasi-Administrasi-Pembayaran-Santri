<?php
require 'cek-sesi.php';
  $query = mysqli_query($koneksi, "SELECT * FROM santri WHERE id = '" . $logged_user['id_santri'] . "'");
  $santri = mysqli_fetch_assoc($query);

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


      <?php
      $id = $santri['id'];
      $query_edit = mysqli_query($koneksi, "SELECT * FROM santri WHERE id='$id'");
   
      while ($row = mysqli_fetch_array($query_edit)) {
      ?>

         <!-- Begin Page Content -->
        <div class="container-fluid">  
    <div class="clearfix">
          <div class="float-right">
            <a href="#" onclick="window.print()" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Cetak</a>
          </div>
          
        </div>
       <br>

     <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-header">
      <div class="float-left">
              <h3 style="margin-top: 5px !important;" class="m-0 font-weight-bold text-primary">Data <b> <?php echo $row['nama_santri']; ?></b></h3>
        
      </div>

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
  
         <!-- 
            <div class="card-body">
               
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                      

                      <th><b>Nomor Induk Santri</b></th>
                      
                     <th><b>Nama</b></th>
                     
                      <th><b>Jenis Kelamin</b></th>
                      
                       <th><b>Alamat</b></th>
                                     
                       <th><b>Nama Ayah</b></th>
                      
                       <th><b>Nama Ibu</b></th>
                       
                        <th><b>Tahun/Semester Masuk</b></th>
                       
                      <th><b>Status Santri</b></th>
                     </tr>
                        
                    
                          <tbody>
                     
                       <tr>
                     
                      <td><?php echo $row['id']; ?></td>
                    
                     <td><?php echo $row['nama_santri']; ?></td>
                      
                      <td><?php echo $row['jenis_kelamin']; ?></td>
                       
                       <td><?php echo $row['alamat']; ?></td>              
                      
                       <td><?php echo $row['ayah_santri']; ?></td>
                      
                       <td><?php echo $row['ibu_santri']; ?></td>
                        
                       <td><?php echo $row['tahun_masuk']; ?>/<?php echo $row['semester']; ?></td>
                      
                       <td><?php echo $row['status']; ?></td>
                      </tr>
    
                </tbody>
             </thead>
              </table>
          </div>
        </div> -->

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Laporan Pembayaran Pendaftaran Santri Baru - <?php echo $row['nama_santri']; ?></h6>
            </div>
<?php 
}
?>  
            <div class="card-body">
              <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tanggal Pembayaran</th>
                      <th>Tahun/Semester</th>
                      <th>Uang Pendaftaran Santri Baru</th>
                      <th>Uang Sewa Lemari</th>
            <th>Uang Seragam Pondok</th>
            <th>Uang Pembangunan</th>
            <th>Uang Ujian</th>

            <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
          <?php 
$query = mysqli_query($koneksi,"SELECT * FROM pendaftaran_baru WHERE id_santri='$id'");
$no = 1;
while ($data1 = mysqli_fetch_assoc($query)) 
{
?>

           <tr>
            <td><?=$data1['tanggal_pembayaran']?></td>
            <td><?=$data1['tahun_pembayaran']?>/<?=$data1['semester_pembayaran']?></td>
            <td>Rp. <?php echo number_format($data1['uang_pendaftaran_baru'], 0, ',', '.'); ?></td>
            <td>Rp. <?php echo number_format($data1['uang_sewa_lemari'], 0, ',', '.'); ?></td>
            <td>Rp. <?php echo number_format($data1['uang_seragam_pondok'], 0, ',', '.'); ?></td>
            <td>Rp. <?php echo number_format($data1['uang_pembangunan'], 0, ',', '.'); ?></td>
            <td>Rp. <?php echo number_format($data1['uang_ujian'], 0, ',', '.'); ?></td>
            <td style="text-align:center;">
                    
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
        
       
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Laporan Pembayaran Pendaftaran Ulang - <?php echo $row['nama_santri']; ?></h6>
            </div>


            <div class="card-body">
              <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tanggal Pembayaran</th>
                      <th>Tahun/Semester</th>
                      <th>Uang Pendaftaran Ulang</th>
            <th>Uang Ujian</th>
            <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
          <?php 
$query = mysqli_query($koneksi,"SELECT * FROM pendaftaran_ulang WHERE id_santri='$id'");
$no = 1;
while ($data1 = mysqli_fetch_assoc($query)) 
{
?>
                    <tr>
                      <td><?=$data1['tanggal_pembayaran']?></td>
                      <td><?=$data1['tahun_pembayaran']?>/<?=$data1['semester_pembayaran']?></td>
                      <td>Rp. <?php echo number_format($data1['uang_pendaftaran_ulang'], 0, ',', '.'); ?></td>
            <td>Rp. <?php echo number_format($data1['uang_ujian'], 0, ',', '.'); ?></td>
            <td style="text-align:center;">
             
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
       
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Laporan Pembayaran Uang Bulanan - <?php echo $row['nama_santri']; ?></h6>
            </div>

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

</body>

</html>