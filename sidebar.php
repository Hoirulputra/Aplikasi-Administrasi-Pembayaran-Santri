  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav d-print-none bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <?php if ($_COOKIE['logged_akses'] == 'admin' || $_COOKIE['logged_akses'] == 'bendahara') : ?>
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-chart-pie"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMINISTRASI SANTRI</div>
      </a>
      <?php endif; ?>
       <?php if ($_COOKIE['logged_akses'] == 'santri') : ?>
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="santri.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-chart-pie"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMINISTRASI SANTRI</div>
      </a>
      <?php endif; ?>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <?php if ($_COOKIE['logged_akses'] == 'admin' || $_COOKIE['logged_akses'] == 'bendahara') : ?>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <?php endif; ?>

    <!-- Divider -->
    <?php if ($_COOKIE['logged_akses'] == 'admin') : ?>
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data Master
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="data-santri.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Santri</span>
        </a>
      </li>
    <?php endif; ?>
    
    
<!-- Divider -->
<?php if ($_COOKIE['logged_akses'] == 'admin' || $_COOKIE['logged_akses'] == 'bendahara') : ?>

      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Tagihan Santri
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="keluar-pendaftaran-baru.php">
          <i class="fas fa-fw fa-minus-circle"></i>
          <span>Pendaftaran Baru</span>
        </a>
      </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="keluar-pendaftaran-ulang.php">
          <i class="fas fa-fw fa-minus-circle"></i>
          <span>Pendaftaran Ulang</span>
        </a>
      </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="keluar-uang-bulanan.php">
          <i class="fas fa-fw fa-minus-circle"></i>
          <span>Uang Bulanan</span>
        </a>
      </li>
    <?php endif; ?>

    
    <!-- Divider -->
    <?php if ($_COOKIE['logged_akses'] == 'admin' || $_COOKIE['logged_akses'] == 'bendahara') : ?>
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Pembayaran Santri
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      
    <li class="nav-item">
        <a class="nav-link collapsed" href="pendaftaran-baru.php">
          <i class="fas fa-fw fa-plus-circle"></i>
          <span>Pendaftaran Baru</span>
        </a>
      </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="pendaftaran-ulang.php">
          <i class="fas fa-fw fa-plus-circle"></i>
          <span>Pendaftaran Ulang</span>
        </a>
      </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="uang-bulanan.php">
          <i class="fas fa-fw fa-plus-circle"></i>
          <span>Uang Bulanan</span>
        </a>
      </li>
        <?php endif; ?>
      
      <!-- Divider -->
      <?php if ($_COOKIE['logged_akses'] == 'admin' || $_COOKIE['logged_akses'] == 'bendahara') : ?>
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Laporan
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="laporan.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Pembayaran Santri</span>
        </a>
      </li>

      <?php endif?>

    <!-- Divider -->
    <?php if ($_COOKIE['logged_akses'] == 'admin') : ?>

      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Pengaturan
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="profile.php">
          <i class="fas fa-fw fa-cogs"></i>
          <span>Data Pengguna</span>
        </a>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
    <?php endif?>

    <?php if ($_COOKIE['logged_akses'] == 'santri') : ?>

    <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Rincian Pembayaran Santri
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="keluar-pendaftaran-baru.php">
          <i class="fas fa-fw fa-minus-circle"></i>
          <span>Pendaftaran Baru</span>
        </a>
      </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="keluar-pendaftaran-ulang.php">
          <i class="fas fa-fw fa-minus-circle"></i>
          <span>Pendaftaran Ulang</span>
        </a>
      </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="keluar-uang-bulanan.php">
          <i class="fas fa-fw fa-minus-circle"></i>
          <span>Uang Bulanan</span>
        </a>
      </li>

    <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Laporan
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="pembayaran-santri.php">
          <i class="fas fa-clipboard"></i>
          <span>Laporan Pembayaran Santri</span>
        </a>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    <?php endif; ?>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">