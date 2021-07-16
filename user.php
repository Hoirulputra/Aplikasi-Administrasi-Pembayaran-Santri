<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">
  <div class="topbar-divider d-none d-sm-block"></div>
  <!-- Nav Item - admin Information -->
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=((isset($logged_user)) ? $logged_user['nama'] : 'Tidak ada data profil')?></span>
      <img class="img-profile rounded-circle" src="http://localhost/Aplikasi Administrasi Pembayaran Santri/img/admin.png">
    </a>
    <!-- Dropdown - admin Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="adminDropdown">
      <a class="dropdown-item" href="profile.php">
        <i class="fas fa-admin fa-sm fa-fw mr-2 text-gray-400"></i>
        Profile
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Logout
      </a>
    </div>
  </li>
</ul>