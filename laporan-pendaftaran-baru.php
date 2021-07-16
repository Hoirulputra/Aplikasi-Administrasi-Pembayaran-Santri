<?php
  require 'cek-sesi.php';
  if (isset($_COOKIE['logged_akses'])) {
    if ($_COOKIE['logged_akses'] != 'admin' && $_COOKIE['logged_akses'] != 'bendahara' && $_COOKIE['logged_akses'] != 'santri') {
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
  <link href='logo.jpg' rel='icon' type='image/x-icon'/>

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
              <h6 class="m-0 font-weight-bold text-primary">Laporan Uang Masuk Pendaftaran Baru dari <?php echo $tgl_mulai ?> sampai dengan <?php echo $tgl_sampai ?></h6>
            </div>

            <div class="card-body">
              <div class="table-responsive">
			  
<?php 
$query = mysqli_query($koneksi,"SELECT SUM(uang_pendaftaran_baru) AS total1, SUM(uang_sewa_lemari) AS total2, SUM(uang_seragam_pondok) AS total3, SUM(uang_pembangunan) AS total4, SUM(uang_ujian) AS total5 FROM pendaftaran_baru WHERE tanggal_pembayaran between '$tgl_mulai' and '$tgl_sampai'");
$total1 = 0;
$total2 = 0;
$total3 = 0;
$total4 = 0;
$total5 = 0;
$totalmasuk = 0;
while ($row = mysqli_fetch_array($query)) {

$total1 += $row['total1'];         
$total2 += $row['total2'];         
$total3 += $row['total3'];         
$total4 += $row['total4'];         
$total5 += $row['total5'];
$totalmasuk= $total1+$total2+$total3+$total4+$total5;        
}
?>		



<table class="table table-bordered" width="100%" cellspacing="0">

<thead>
<tr>
<th>Jenis Pemasukan</th>
<th style="width:20%">Total</th>
</tr>
</thead>

<tbody>
<tr>
<td>Uang Pendaftaran Baru</td>
<td>Rp. <?php echo number_format($total1, 0, ',', '.'); ?></td>
</tr>

<tr>
<td>Uang Sewa Lemari</td>
<td>Rp. <?php echo number_format($total2, 0, ',', '.'); ?></td>
</tr>

<tr>
<td>Uang Seragam Pondok</td>
<td>Rp. <?php echo number_format($total3, 0, ',', '.'); ?></td>
</tr>

<tr>
<td>Uang Pembangunan</td>
<td>Rp. <?php echo number_format($total4, 0, ',', '.'); ?></td>
</tr>

<tr>
<td>Uang Ujian</td>
<td>Rp. <?php echo number_format($total5, 0, ',', '.'); ?></td>
</tr>

<tr>
<td></td>
<td><b>Rp. <?php echo number_format($totalmasuk, 0, ',', '.'); ?></b></td>
</tr>

</tbody>
</table>
	  
			  </div>
			  </div>
			  </div>
			  
			  
			  

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Laporan Uang Keluar Pendaftaran Baru dari <?php echo $tgl_mulai ?> sampai dengan <?php echo $tgl_sampai ?></h6>
            </div>

            <div class="card-body">
              <div class="table-responsive">
			  
<?php 
$query1 = mysqli_query($koneksi,"SELECT SUM(nominal_pengeluaran) AS totalseragam FROM keluar_pendaftaran_baru WHERE jenis='Uang Seragam Pondok' AND tanggal_pembayaran between '$tgl_mulai' and '$tgl_sampai'");
$totalseragam=0;
while ($row1= mysqli_fetch_array($query1)) {
$totalseragam += $row1['totalseragam']; 
}
?>

<?php 
$query2 = mysqli_query($koneksi,"SELECT SUM(nominal_pengeluaran) AS totallemari FROM keluar_pendaftaran_baru WHERE jenis='Uang Sewa Lemari' AND tanggal_pembayaran between '$tgl_mulai' and '$tgl_sampai'");
$totallemari=0;
while ($row2= mysqli_fetch_array($query2)) {
$totallemari += $row2['totallemari']; 
}
?>

<?php 
$query3 = mysqli_query($koneksi,"SELECT SUM(nominal_pengeluaran) AS totalbaru FROM keluar_pendaftaran_baru WHERE jenis='Uang Pendaftaran Baru' AND tanggal_pembayaran between '$tgl_mulai' and '$tgl_sampai'");
$totalbaru=0;
while ($row3= mysqli_fetch_array($query3)) {
$totalbaru += $row3['totalbaru']; 
}
?>

<?php 
$query4 = mysqli_query($koneksi,"SELECT SUM(nominal_pengeluaran) AS totalbiayapembagunan FROM keluar_pendaftaran_baru WHERE jenis='Uang Pembangunan' AND tanggal_pembayaran between '$tgl_mulai' and '$tgl_sampai'");
$totalbiayapembagunan=0;
while ($row4= mysqli_fetch_array($query4)) {
$totalbiayapembagunan += $row4['totalbiayapembagunan']; 
}
?>

<?php 
$query5 = mysqli_query($koneksi,"SELECT SUM(nominal_pengeluaran) AS totalujian FROM keluar_pendaftaran_baru WHERE jenis='Uang Ujian' AND tanggal_pembayaran between '$tgl_mulai' and '$tgl_sampai'");
$totalujian=0;
while ($row5= mysqli_fetch_array($query5)) {
$totalujian += $row5['totalujian']; 
}
?>

<?php 
$query6 = mysqli_query($koneksi,"SELECT SUM(nominal_pengeluaran) AS totallain FROM keluar_pendaftaran_baru WHERE jenis='Lainnya' AND tanggal_pembayaran between '$tgl_mulai' and '$tgl_sampai'");
$totallain=0;
while ($row6= mysqli_fetch_array($query6)) {
$totallain += $row6['totallain']; 
}


$totalkeluar=0;
$totalkeluar=$totalseragam+$totallemari+$totalbaru+$totalbiayapembagunan+$totalujian+$totallain;
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
<td>Uang Pendaftaran Baru</td>
<td>Rp. <?php echo number_format($totalbaru, 0, ',', '.'); ?></td>
</tr>

<tr>
<td>Uang Sewa Lemari</td>
<td>Rp. <?php echo number_format($totallemari, 0, ',', '.'); ?></td>
</tr>

<tr>
<td>Uang Seragam  Pondok</td>
<td>Rp. <?php echo number_format($totalseragam, 0, ',', '.'); ?></td>
</tr>

<tr>
<td>Uang Pembangunan</td>
<td>Rp. <?php echo number_format($totalbiayapembagunan, 0, ',', '.'); ?></td>
</tr>

<tr>
<td>Uang Ujian</td>
<td>Rp. <?php echo number_format($totalujian, 0, ',', '.'); ?></td>
</tr>

<tr>
<td>Uang Lainnya</td>
<td>Rp. <?php echo number_format($totallain, 0, ',', '.'); ?></td>
</tr>

<tr>
<td></td>
<td><b>Rp. <?php echo number_format($totalkeluar, 0, ',', '.'); ?></b></td>
</tr>

</tbody>
</table>
	  
			  </div>
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
