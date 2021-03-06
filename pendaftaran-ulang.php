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


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header">
			<div class="float-left">
              <h3 style="margin-top: 5px !important;" class="m-0 font-weight-bold text-primary">Pembayaran Semester Santri</h3>
			 </div>
			 
			 <div class="float-right">			  
			  <a style="margin:5px" href="sudah-daftar-ulang.php" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Daftar Santri Sudah Daftar Ulang</a>
			  </div>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nomor Induk Santri</th>
                      <th>Nama Santri</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
					  <th>Keterangan</th>
					  <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php 
$query = mysqli_query($koneksi,"SELECT * FROM santri WHERE status='Lama' AND daftar_ulang='Belum'");
$no = 1;
while ($data = mysqli_fetch_assoc($query)) 
{
?>
                    <tr>
                      <td><?=$data['id']?></td>
                      <td><?=$data['nama_santri']?></td>
                      <td><?=$data['jenis_kelamin']?></td>
                      <td><?=$data['alamat']?></td>
					  <td style="text-align:center;"><span class="btn btn-warning btn-sm"><?=$data['daftar_ulang']?></span></td>
					  <td style="text-align:center;">
                    <!-- Button untuk modal -->
<a title="Bayar Uang Pendaftaran Ulang" href="#" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['id']; ?>">Bayar Uang Pendaftaran Ulang</a>
</td>
</tr>
<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModal<?php echo $data['id']; ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Bayar Uang Pendafatran Ulang</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form role="form" action="tambah-pendaftaran-ulang.php" method="get">

<?php
$id = $data['id']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM santri WHERE id='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>
<div style="display:none !important">
<input type="text" class="form-control" name="id" value="<?php echo $row['id']; ?>" readonly>
<input type="text" name="nama_santri" class="form-control" value="<?php echo $row['nama_santri']; ?>">      
<?php $jenis=$row['jenis_kelamin']; ?>
											<select name="jenis_kelamin" class="form-control" required>
												<option value="">-- Silahkan Pilih --</option>
												<option value="Pria" <?php echo ($jenis == 'Pria') ? "selected": "" ?>>Pria</option>
												<option value="Wanita" <?php echo ($jenis == 'Wanita') ? "selected": "" ?>>Wanita</option>
											</select>
<input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>">   
<input type="text" name="ayah_santri" class="form-control" value="<?php echo $row['ayah_santri']; ?>">
<input type="text" name="ibu_santri" class="form-control" value="<?php echo $row['ibu_santri']; ?>">
<input type="text" name="tahun_masuk" class="form-control" value="<?php echo $row['tahun_masuk']; ?>">
<?php $semester=$row['semester']; ?>
											<select name="semester" class="form-control" required>
												<option value="">-- Silahkan Pilih --</option>
												<option value="Ganjil" <?php echo ($semester == 'Ganjil') ? "selected": "" ?>>Ganjil</option>
												<option value="Genap" <?php echo ($semester == 'Genap') ? "selected": "" ?>>Genap</option>
											</select>

<?php $status=$row['status']; ?>
											<select name="status" class="form-control" required>
												<option value="">-- Silahkan Pilih --</option>
												<option value="Lama" <?php echo ($status == 'Baru') ? "selected": "" ?>>Baru</option>
												<option value="Lama" <?php echo ($status == 'Lama') ? "selected": "" ?>>Lama</option>
											</select>
<input type="hidden" name="daftar_ulang" value="Sudah">
<input type="hidden" name="uang_bulanan" value="<?php echo $row['uang_bulanan']; ?>">
</div>

<div class="form-group">
<label>Nomor Induk Santri</label>
<input type="text" value="<?php echo $row['id']; ?>" readonly required class="form-control">   
</div>

<div class="form-group">
<label>Nama Santri</label>
<input type="text" value="<?php echo $row['nama_santri']; ?>" readonly required class="form-control">   
</div>

<div class="form-group">
<label>Tanggal Pembayaran</label>
<!-- <input type="date" value="<?=date('Y-m-d');?>" readonly required name="tanggal_pembayaran" class="form-control"> -->
 <input type="date" value="<?php $bulan = mktime(0,0,0, date('m')-1, date('d'), date('Y')); echo date('Y-m-d', $bulan);?>" name="tanggal_pembayaran"  id="tanggal_pembayaran" class="form-control"   prequired="">   
</div>

<div class="form-group">
<label>Semester</label>
											<select name="semester_pembayaran" class="form-control" required>
												<option value="">-- Silahkan Pilih --</option>
												<option value="Ganjil">Ganjil</option>
												<option value="Genap">Genap</option>
											</select>
</div>

<div class="form-group">
<label>Nominal Pendaftaran Ulang</label>
<select name="Nominal Pendaftaran Ulang" class="form-control" required>
                        <option value="">-- Silahkan Pilih --</option>
                       <option value="Rp.50.000">Rp.50.000</option>
                      </select>  
</div>

<div class="form-group">
<label>Nominal Uang Ujian</label>
<select name="Nominal Uang Ujian" class="form-control" required>
                        <option value="">-- Silahkan Pilih --</option>
                       <option value="Rp.50.000">Rp.50.000</option>
                      </select> 
</div>


<div class="modal-footer">  
<button type="submit" class="btn btn-success">Bayar</button>
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
