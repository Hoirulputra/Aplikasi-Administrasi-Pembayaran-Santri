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
		<div class="clearfix">
					<div class="float-right">
						<a href="javascript:history.back()" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i> Kembali</a>
					</div>
					
				</div>
				<br>
		
		<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Data Santri</h6>
            </div>
            <div class="card-body">
		
<form action="proses-tambah-santri.php" method="get">

<input type="hidden" name="daftar_ulang" value="Belum">
<input type="hidden" name="uang_bulanan" value="Belum">

<div class="form-row">
<div class="form-group col-md-4">
<label>Nomor Induk Santri</label>
<input type="number" class="form-control" name="id" autocomplete="off" required>
</div>

<div class="form-group col-md-4">
<label>Nama Santri</label>
<input type="text" name="nama_santri" class="form-control" autocomplete="off" required>      
</div>

<div class="form-group col-md-4">
<label>Jenis Kelamin</label>
											
											<select name="jenis_kelamin" class="form-control" required required>
												<option value="">-- Silahkan Pilih --</option>
												<option value="Pria">Pria</option>
												<option value="Wanita">Wanita</option>
											</select>
</div>

<div class="form-group col-md-4">
<label>Alamat</label>
<input type="text" name="alamat" class="form-control" autocomplete="off" required>      
</div>

<div class="form-group col-md-4">
<label>Nama Ayah Santri</label>
<input type="text" name="ayah_santri" class="form-control" autocomplete="off">      
</div>
<div class="form-group col-md-4">
<label>Nama Ibu Santri</label>
<input type="text" name="ibu_santri" class="form-control" autocomplete="off">      
</div>
<div class="form-group col-md-4">
<label>Tahun Masuk</label>
<input type="number" name="tahun_masuk" class="form-control" autocomplete="off" required>      
</div>
<div class="form-group col-md-4">
<label>Semester</label>

											
											<select name="semester" class="form-control" required>
												<option value="">-- Silahkan Pilih --</option>
												<option value="Ganjil">Ganjil</option>
												<option value="Genap">Genap</option>
											</select>
</div>
<div class="form-group col-md-4">
<label>Status Santri</label>

											
											<select name="status" class="form-control" required>
												<option value="">-- Silahkan Pilih --</option>
												<option value="Baru">Baru</option>
												<option value="Lama">Lama</option>
											</select>
</div>
</div>
        <!-- footer modal -->
		</div>
        <div class="modal-footer">
		<button type="submit" class="btn btn-success" >Tambah</button>
		</form>
			  
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
