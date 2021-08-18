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
            <div class="card-header">
      <div class="float-left">
              <h3 style="margin-top: 5px !important;" class="m-0 font-weight-bold text-primary">Daftar Tagihan Bulanan Santri</h3>
       </div>
       
       <div class="float-right">

        <?php if ($_COOKIE['logged_akses'] == 'admin' || $_COOKIE['logged_akses'] == 'bendahara') : ?>
        <a style="margin:5px" href="tambah-keluar-uang-bulanan.php" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Tagihan</a>
       <?php endif; ?>
        </div>
        

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>

                      <?php if ($_COOKIE['logged_akses'] == 'admin' || $_COOKIE['logged_akses'] == 'bendahara') : ?>
                      <th>Tanggal Tagihan</th>
                      <?php endif; ?>
                      
                     <th>Jenis</th>
                      <th>Keterangan</th>
                      <th>Nominal</th>
            <?php if ($_COOKIE['logged_akses'] == 'admin' || $_COOKIE['logged_akses'] == 'bendahara') : ?>
            <th>Aksi</th>
            <?php endif; ?>
                    </tr>
                  </thead>
                  <tbody>
            
          <?php 
$query = mysqli_query($koneksi,"SELECT * FROM keluar_uang_bulanan");
$no = 1;
while ($data = mysqli_fetch_assoc($query)) 
{
?>

                    <tr>
                      <?php if ($_COOKIE['logged_akses'] == 'admin' || $_COOKIE['logged_akses'] == 'bendahara') : ?>
                      <td><?=$data['tanggal_tagihan']?></td>
                      <?php endif; ?>
                       <td><?=$data['jenis_tagihan']?></td>
                      <td><?=$data['ket_tagihan']?></td>
                      <td><?=$data['nominal_tagihan']?></td>

                     <?php if ($_COOKIE['logged_akses'] == 'admin' || $_COOKIE['logged_akses'] == 'bendahara') : ?>
                     <td style="width:15%;text-align:center;">
                    <?php endif; ?>
<?php if ($_COOKIE['logged_akses'] == 'admin' || $_COOKIE['logged_akses'] == 'bendahara') : ?>
<!-- Button untuk modal -->
<a title="Edit" href="#" type="button" class="fa fa-edit btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['id']; ?>"></a>
<a title="Hapus" href="hapus-keluar-uang-bulanan.php?id=<?=$data['id'];?>" Onclick="confirm('Anda Yakin Ingin Menghapus?')" class="fa fa-times-circle btn btn-danger btn-sm"></a>
</td>
</tr>
<?php endif; ?>

<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModal<?php echo $data['id']; ?>" role="dialog">
<div class="modal-dialog">
<?php if ($_COOKIE['logged_akses'] == 'admin' || $_COOKIE['logged_akses'] == 'bendahara') : ?>
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Ubah Data Tagihan</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form role="form" action="proses-edit-keluar-uang-bulanan.php" method="get">
<?php endif; ?>
<?php
$id = $data['id']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM keluar_uang_bulanan WHERE id='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>
<?php if ($_COOKIE['logged_akses'] == 'admin' || $_COOKIE['logged_akses'] == 'bendahara') : ?>
<input type="hidden" value="<?php echo $row['id']; ?>" class="form-control" name="id" readonly required>

<div class="form-group">
<label>Tanggal Tagihan</label>
<input type="date" value="<?php echo $row['tanggal_tagihan']; ?>" readonly required name="tanggal_tagihan"  value="<?php echo $row['tanggal_tagihan']; ?>" class="form-control">   
</div>
<?php endif; ?>

<div class="form-group">
<label>Jenis</label>

                      <?php $jenis=$row['jenis_tagihan']; ?>
                      <select name="jenis_tagihan" class="form-control" required>
                        <option value="">-- Silahkan Pilih --</option>
                        <option value="Uang Makan" <?php echo ($jenis == 'Uang Makan') ? "selected": "" ?>>Uang Makan</option>
                        <option value="Uang Asrama" <?php echo ($jenis == 'Uang Asrama') ? "selected": "" ?>>Uang Asrama</option>
                        <option value="Uang Listrik" <?php echo ($jenis == 'Uang Listrik') ? "selected": "" ?>>Uang Listrik</option>
                        <option value="Lainnya" <?php echo ($jenis == 'Lainnya') ? "selected": "" ?>>Lainnya</option>
                      </select>
</div>

<div class="form-group">
<label>Keterangan</label>
<?php echo $row['ket_tagihan']; ?>
 <select name="ket_tagihan" class="form-control" required> 
 <option value="">-- Silahkan Pilih --</option>
                        <option value="Makan 2X">Makan 2X</option>
                        <option value="Kebersihan">Kebersihan</option>
                        <option value="Listrik">Listrik</option>
                        <option value="Lainnya">Lainnya</option>
                      </select>     
</div>

<div class="form-group">
<label>Nominal Uang Tagihan</label>
<?php echo $row['nominal_tagihan']; ?>
                  <select class="form-control" name="nominal_tagihan" required>
                 <option value="">-- Silahkan Pilih --</option>
                        <option value="Rp.500.000">Rp.500.000</option>
                        <option value="Rp.50.000">Rp.50.000</option>
                      </select>
</div>
<?php if ($_COOKIE['logged_akses'] == 'admin' || $_COOKIE['logged_akses'] == 'bendahara') : ?>
<div class="modal-footer">  
<button type="submit" class="btn btn-success">Simpan Perubahan</button>
<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
</div> 
<?php endif; ?>

<?php 
}
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
