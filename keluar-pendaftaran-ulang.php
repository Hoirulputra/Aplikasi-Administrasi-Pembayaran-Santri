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


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header">
			<div class="float-left">
              <h3 style="margin-top: 5px !important;" class="m-0 font-weight-bold text-primary">Daftar Pengeluaran Pendaftaran Ulang</h3>
			 </div>
			 
			 <div class="float-right">

			  
			  <a style="margin:5px" href="tambah-keluar-pendaftaran-ulang.php" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Data Pengeluaran</a>
			  </div>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tanggal Pengeluaran</th>
                      <th>Nominal</th>
					  <th>Jenis</th>
                      <th>Keterangan</th>
					  <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php 
$query = mysqli_query($koneksi,"SELECT * FROM keluar_pendaftaran_ulang");
$no = 1;
while ($data = mysqli_fetch_assoc($query)) 
{
?>

                    <tr>
                      <td><?=$data['tanggal_pembayaran']?></td>
                      <td>Rp. <?php echo number_format($data['nominal_pengeluaran'], 0, ',', '.'); ?></td>
					  <td><?=$data['jenis']?></td>
                      <td><?=$data['ket_pengeluaran']?></td>
					  <td style="width:15%;text-align:center;">
                    <!-- Button untuk modal -->
<a title="Edit" href="#" type="button" class="fa fa-edit btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['id']; ?>"></a>
<a title="Hapus" href="hapus-keluar-pendaftaran-ulang.php?id=<?=$data['id'];?>" Onclick="confirm('Anda Yakin Ingin Menghapus?')" class="fa fa-times-circle btn btn-danger btn-sm"></a>
</td>
</tr>

<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModal<?php echo $data['id']; ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Ubah Data Pengeluaran</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form role="form" action="proses-edit-keluar-pendaftaran-ulang.php" method="get">

<?php
$id = $data['id']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM keluar_pendaftaran_ulang WHERE id='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>

<input type="hidden" value="<?php echo $row['id']; ?>" class="form-control" name="id" readonly required>

<div class="form-group">
<label>Tanggal Pengeluaran</label>
<input type="date" value="<?php echo $row['tanggal_pembayaran']; ?>" readonly required name="tanggal_pembayaran"  value="<?php echo $row['tanggal_pembayaran']; ?>" class="form-control">   
</div>

<div class="form-group">
<label>Nominal Uang Pengeluaran</label>
<input type="number" value="<?php echo $row['nominal_pengeluaran']; ?>" class="form-control" name="nominal_pengeluaran" autocomplete="off" required>
</div>

<div class="form-group">
<label>Jenis</label>

											<?php $jenis=$row['jenis']; ?>
											<select name="jenis" class="form-control" required>
												<option value="">-- Silahkan Pilih --</option>
												<option value="Uang Pendaftaran Ulang" <?php echo ($jenis == 'Uang Pendaftaran Ulang') ? "selected": "" ?>>Uang Pendaftaran Ulang</option>
												<option value="Uang Ujian" <?php echo ($jenis == 'Uang Ujian') ? "selected": "" ?>>Uang Ujian</option>
												<option value="Lainnya" <?php echo ($jenis == 'Lainnya') ? "selected": "" ?>>Lainnya</option>
											</select>
</div>

<div class="form-group">
<label>Keterangan</label>
<input type="text" value="<?php echo $row['ket_pengeluaran']; ?>" name="ket_pengeluaran" class="form-control" autocomplete="off" required>      
</div>


<div class="modal-footer">  
<button type="submit" class="btn btn-success">Simpan Perubahan</button>
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
