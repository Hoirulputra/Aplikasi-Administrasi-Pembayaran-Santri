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
  <link href='logo.png' rel='icon' type='image/x-icon'/>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<script>
		function printContent(el)/*el di sini sebagai perwakilan dari id-id di bawah */{
			var restorepage = document.body.innerHTML;
			var printcontent = document.getElementById(el).innerHTML;
			document.body.innerHTML = printcontent;
			window.print();/*fungsi untuk mencetak*/
			document.body.innerHTML = restorepage;
		}
	</script>
	
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
					<button onclick="printContent('konten')" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Cetak Laporan</button>					
				</div>
				<br>		
				<div id="konten">				
<?php
$tgl_mulai=$_POST['tgl_mulai'];
$tgl_sampai=$_POST['tgl_sampai'];
?>     
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Laporan Uang Keluar Bulanan dari <?php echo $tgl_mulai ?> sampai dengan <?php echo $tgl_sampai ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
        
<?php 
$query1 = mysqli_query($koneksi,"SELECT SUM(nominal_pengeluaran) AS totalmakan FROM keluar_uang_bulanan WHERE jenis='Uang Makan' AND tanggal_pembayaran between '$tgl_mulai' and '$tgl_sampai'");
$totalmakan=0;
while ($row1= mysqli_fetch_array($query1)) {
$totalmakan += $row1['totalmakan']; 
}
?>

<?php 
$query2 = mysqli_query($koneksi,"SELECT SUM(nominal_pengeluaran) AS totalasrama FROM keluar_uang_bulanan WHERE jenis='Uang Asrama' AND tanggal_pembayaran between '$tgl_mulai' and '$tgl_sampai'");
$totalasrama=0;
while ($row2= mysqli_fetch_array($query2)) {
$totalasrama += $row2['totalasrama']; 
}
?>

<?php 
$query3 = mysqli_query($koneksi,"SELECT SUM(nominal_pengeluaran) AS totallistrik FROM keluar_uang_bulanan WHERE jenis='Uang Listrik' AND tanggal_pembayaran between '$tgl_mulai' and '$tgl_sampai'");
$totallistrik=0;
while ($row3= mysqli_fetch_array($query3)) {
$totallistrik += $row3['totallistrik']; 
}

?>
<?php 
$query4 = mysqli_query($koneksi,"SELECT SUM(nominal_pengeluaran) AS totallain FROM keluar_uang_bulanan WHERE jenis='Lainnya' AND tanggal_pembayaran between '$tgl_mulai' and '$tgl_sampai'");
$totallain=0;
while ($row4= mysqli_fetch_array($query4)) {
$totallain += $row4['totallain']; 
}
$totalkeluar=0;
$totalkeluar=$totalmakan+$totalasrama+$totallistrik+$totallain;
?>
<table class="table table-bordered" width="100%" cellspacing="0">
<thead>
<tr>
<th>Jenis Pengeluaran</th>
<th style="width:20%">Total</th>
</tr>
</thead>

<tbody>
<tr>
<td>Uang Makan</td>
<td>Rp. <?php echo number_format($totalmakan, 0, ',', '.'); ?></td>
</tr>
<tr>
<td>Uang Asrama</td>
<td>Rp. <?php echo number_format($totalasrama, 0, ',', '.'); ?></td>
</tr>
<tr>
<td>Uang Listrik</td>
<td>Rp. <?php echo number_format($totallistrik, 0, ',', '.'); ?></td>
</tr>
<tr>
<td>Uang Lainnya</td>
<td>Rp. <?php echo number_format($totallain, 0, ',', '.'); ?></td>
</tr>

<tr>
<td><b>Total Pembayaran</b></td>
<td><b>Rp. <?php echo number_format($totalkeluar, 0, ',', '.'); ?></b></td>
</tr>
</tbody>
</table>
    
        </div>
        </div>
        </div>
        
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Laporan Pembayaran Bulanan dari <?php echo $tgl_mulai ?> sampai dengan <?php echo $tgl_sampai ?></h6>
            </div>

            <div class="card-body">
              <div class="table-responsive">
			  
<?php 
$query = mysqli_query($koneksi,"SELECT SUM(uang_makan) AS total1, SUM(uang_asrama) AS total2, SUM(uang_listrik) AS total3 FROM uang_bulanan WHERE tanggal_pembayaran between '$tgl_mulai' and '$tgl_sampai'");
$total1 = 0;
$total2 = 0;
$total3 = 0;
$totalmasuk = 0;
while ($row = mysqli_fetch_array($query)) {
$total1 += $row['total1'];         
$total2 += $row['total2'];
$total3 += $row['total3'];
$totalmasuk= $total1+$total2+$total3;        
}
?>		

<table class="table table-bordered" width="100%" cellspacing="0">
<thead>
<tr>
<th>Rincian Pembayaran</th>
<th style="width:20%">Pembayaran</th>
</tr>
</thead>

<tbody>
<tr>
<td>Uang Makan</td>
<td>Rp. <?php echo number_format($total1, 0, ',', '.'); ?></td>
</tr>

<tr>
<td>Uang Asrama</td>
<td>Rp. <?php echo number_format($total2, 0, ',', '.'); ?></td>
</tr>

<tr>
<td>Uang Listrik</td>
<td>Rp. <?php echo number_format($total3, 0, ',', '.'); ?></td>
</tr>

<tr>
<td><b>Total Pembayaran Santri</b></td>
<td><b>Rp. <?php echo number_format($totalmasuk, 0, ',', '.'); ?></b></td>
</tr>

</tbody>
</table>
	  
			  </div>
			  </div>
			  </div>
			  
			 
        </div></div>
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
