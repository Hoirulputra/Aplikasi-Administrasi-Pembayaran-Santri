<?php
  require 'cek-sesi.php';
  if (isset($_COOKIE['logged_akses'])) {
    if ($_COOKIE['logged_akses'] != 'santri') {
      $url = urlRedirectWhenLogged($_COOKIE['logged_akses']);
      echo "Anda tidak berhak mengakses halaman ini <br/>";
      echo "<a href='${url}'>Kembali</a>";
      die;
    }
    $query = mysqli_query($koneksi, "SELECT * FROM santri WHERE id = '" .$logged_user['santri_id']. "'");
    $santri = mysqli_fetch_assoc($query);
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

  <title>Santri</title>
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
            <!-- <div class="card-header"> -->
      
           <div class="card-body">
              <div class="table-responsive">
                
        <ul class="nav nav-tabs">
  <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#harian">Pendaftaran Baru</a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#periode">Pendaftaran Ulang</a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#periode2">Uang Bulanan</a></li>
</ul>

<div id="myTabContent" class="tab-content">
  
  <div class="tab-pane fade active show" id="harian"><br />
    <form action="lihat-santri-pendaftaran-baru.php" method="POST">
        <div class="form-group">
          <label for="tgl_mulai">Mulai</label>
            <input class="form-control" type="date" name="tgl_mulai" id="tgl_mulai" value="<?php $bulan = mktime(0,0,0, date('m')-1, date('d'), date('Y')); echo date('Y-m-d', $bulan);?>" prequired="">
          </div>
          <div class="form-group">
            <label for="tgl_sampai">Sampai</label>
            <input class="form-control" type="date" name="tgl_sampai" id="tgl_sampai" value="<?=date('Y-m-d');?>" required="">
        </div>
        <button type="submit" class="btn btn-primary">Lihat Laporan</button>
      </form>
  </div>
  
<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModal<?php echo $data['id']; ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Bayar Uang Bulanan</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form role="form" action="tambah-uang-bulanan.php" method="get">

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
                        <option value="Baru" <?php echo ($status == 'Baru') ? "selected": "" ?>>Baru</option>
                        <option value="Lama" <?php echo ($status == 'Lama') ? "selected": "" ?>>Lama</option>
                      </select>
<input type="hidden" name="daftar_ulang" value="<?php echo $row['daftar_ulang']; ?>">
<input type="hidden" name="uang_bulanan" value="Sudah">
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
<input type="date" value="<?=date('Y-m-d');?>" readonly required name="tanggal_pembayaran" class="form-control">   
</div>

<div class="form-group">
<label>Untuk Bulan</label>
                      <select name="bulan_pembayaran" class="form-control" required>
                        <option value="">-- Silahkan Pilih --</option>
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
                      </select>
</div>

<div class="form-group">
<label>Tahun</label>
<input type="number" name="tahun_pembayaran" autocomplete="off" class="form-control" required>   
</div>

<div class="form-group">
<label>Nominal Uang Makan</label>
<input type="number" name="uang_makan" class="form-control" required>   
</div>

<div class="form-group">
<label>Nominal Uang Asrama</label>
<input type="number" name="uang_asrama" class="form-control" required>   
</div>

<div class="form-group">
<label>Nominal Uang Listrik</label>
<input type="number" name="uang_listrik" class="form-control" required>   
</div>


<div class="modal-footer">  
<button type="submit" class="btn btn-success">Bayar</button>
<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
</div>

       
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
