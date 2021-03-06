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
              <h4 class="m-0 font-weight-bold text-primary">Tambah Tagihan</h4>
            </div>
            <div class="card-body">
    

<form action="proses-tambah-keluar-pendaftaran-baru.php" method="get">
<div class="form-row">
<div class="form-group col-md-6">
<label>Tanggal Tagihan</label>
<input type="date" value="<?=date('Y-m-d');?>" readonly required name="tanggal_tagihan" class="form-control">   
</div>

<div class="form-group col-md-6">
<label>Nominal Uang Tagihan</label>
<select class="form-control" name="nominal_tagihan" required>
                        <option value="">-- Silahkan Pilih --</option>
                        <option value="Rp.500.000">Rp.500.000</option>
                        <option value="Rp.300.000">Rp.300.000</option>
                        <option value="Rp.100.000">Rp.100.000</option>
                        <option value="Rp.50.000">Rp.50.000</option>
                       </select>

</div>

<div class="form-group col-md-6">
<label>Jenis</label>
<select name="jenis_tagihan" class="form-control" required>
                        <option value="">-- Silahkan Pilih --</option>
                        <option value="Uang Pendaftaran Baru">Uang Pendaftaran Baru</option>
                        <option value="Uang Sewa Lemari">Uang Sewa Lemari</option>
                        <option value="Uang Seragam Pondok">Uang Seragam Pondok</option>
                        <option value="Uang Pembangunan">Uang Pembangunan</option>
                        <option value="Uang Ujian">Uang Ujian</option>
                        <option value="Lainnya">Lainnya</option>
                      </select>
</div>

<div class="form-group col-md-6">
  <label>Keterangan</label>
<select type="text" name="ket_tagihan" class="form-control" autocomplete="off" required>
                        <option value="">-- Silahkan Pilih --</option>
                        <option value="Formulir Pendaftaran">Formulir Pendaftaran</option>
                        <option value="Sewa 1 Lemari">Sewa 1 Lemari</option>
                        <option value="Beli 2 Seragam Pondok">Beli 2 Seragam Pondok</option>
                        <option value="SPP">SPP</option>
                        <option value="Ujian Test Masuk">Ujian Test Masuk</option>
                      </select>
      
</div>

    
        <!-- footer modal -->
    </div>
        <div class="modal-footer">
    <button type="submit" class="btn btn-success" >Tambah</button>
    </div>
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
