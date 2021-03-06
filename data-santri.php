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


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header">
			<div class="float-left">
              <h3 style="margin-top: 5px !important;" class="m-0 font-weight-bold text-primary">Daftar Data Santri</h3>
			 </div>
			 
			 <div class="float-right">			  
			  <a style="margin:5px" href="tambah-santri.php" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Data Santri</a>
			  </div>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nomor Induk Santri</th>
                      <th>Nama Santri</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
					  <th>Tahun/Semester Masuk</th>					  
					  <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php 
$query = mysqli_query($koneksi,"SELECT * FROM santri");
$no = 1;
while ($data = mysqli_fetch_assoc($query)) 
{
?>
                    <tr>
                      <td><?=$data['id']?></td>
                      <td><?=$data['nama_santri']?></td>
                      <td><?=$data['jenis_kelamin']?></td>
                      <td><?=$data['alamat']?></td>
					  <td><?=$data['tahun_masuk']?>/<?=$data['semester']?></td>
					  <td style="width:20%;text-align:center;">
                    <!-- Button untuk modal -->
<a title="Lihat" href="lihat-santri.php?id=<?=$data['id'];?>" class="fa fa-eye btn btn-primary btn-sm"></a>
<a title="Edit" href="#" type="button" class="fa fa-edit btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['id']; ?>"></a>
<a title="Hapus" href="hapus-santri.php?id=<?=$data['id'];?>" Onclick="confirm('Anda Yakin Ingin Menghapus?')" class="fa fa-times-circle btn btn-danger btn-sm"></a>
</td>
</tr>

<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModal<?php echo $data['id']; ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Ubah Data Santri</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form role="form" action="proses-edit-santri.php" method="get">

<?php
$id = $data['id']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM santri WHERE id='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>

<input type="hidden" name="daftar_ulang" value="<?php echo $row['daftar_ulang']; ?>">
<input type="hidden" name="uang_bulanan" value="<?php echo $row['uang_bulanan']; ?>">

<div class="form-group">
<label>Nomor Induk Santri</label>
<input type="number" class="form-control" name="id" value="<?php echo $row['id']; ?>" readonly>
</div>

<div class="form-group">
<label>Nama Santri</label>
<input type="text" name="nama_santri" class="form-control" value="<?php echo $row['nama_santri']; ?>">      
</div>

<div class="form-group">
<label>Jenis Kelamin</label>
											<?php $jenis=$row['jenis_kelamin']; ?>
											<select name="jenis_kelamin" class="form-control" required>
												<option value="">-- Silahkan Pilih --</option>
												<option value="Pria" <?php echo ($jenis == 'Pria') ? "selected": "" ?>>Pria</option>
												<option value="Wanita" <?php echo ($jenis == 'Wanita') ? "selected": "" ?>>Wanita</option>
											</select>
</div>

<div class="form-group">
<label>Alamat</label>
<input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>">      
</div>
<div class="form-group">
<label>Nama Ayah Santri</label>
<input type="text" name="ayah_santri" class="form-control" value="<?php echo $row['ayah_santri']; ?>">      
</div>
<div class="form-group">
<label>Nama Ibu Santri</label>
<input type="text" name="ibu_santri" class="form-control" value="<?php echo $row['ibu_santri']; ?>">      
</div>
<div class="form-group">
<label>Tahun Masuk</label>
<input type="number" name="tahun_masuk" class="form-control" value="<?php echo $row['tahun_masuk']; ?>">      
</div>
<div class="form-group">
<label>Semester</label>

											<?php $semester=$row['semester']; ?>
											<select name="semester" class="form-control" required>
												<option value="">-- Silahkan Pilih --</option>
												<option value="Ganjil" <?php echo ($semester == 'Ganjil') ? "selected": "" ?>>Ganjil</option>
												<option value="Genap" <?php echo ($semester == 'Genap') ? "selected": "" ?>>Genap</option>
											</select>
</div>
<div class="form-group">
<label>Status Santri</label>

											<?php $status=$row['status']; ?>
											<select name="status" class="form-control" required>
												<option value="">-- Silahkan Pilih --</option>
												<option value="Baru" <?php echo ($status == 'Baru') ? "selected": "" ?>>Baru</option>
												<option value="Lama" <?php echo ($status == 'Lama') ? "selected": "" ?>>Lama</option>
											</select>
</div>
<div class="modal-footer">  
<button type="submit" class="btn btn-success">Simpan Perubahan</button>
<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
</div>
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
