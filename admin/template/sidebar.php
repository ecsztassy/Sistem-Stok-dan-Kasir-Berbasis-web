<?php 
$id = $_SESSION['admin']['id_member'];
$hasil_profil = $lihat->member_edit($id);
$role = $_SESSION['role'] ?? ($_SESSION['admin']['role'] ?? 'admin');
?>

<!-- NAVBAR ATAS -->
<nav class="navbar navbar-expand-lg navbar-custom fixed-top shadow">
  <a class="navbar-brand" href="index.php">
    <i class="fas fa-cash-register"></i> 
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars text-white"></i>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">

      <?php if ($role === 'karyawan'): ?>
        <li class="nav-item"><a class="nav-link" href="index.php?page=jual"><i class="fas fa-desktop"></i> Kasir</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="stokDropdown" data-toggle="dropdown"><i class="fas fa-database"></i> Data Stok</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="index.php?page=barang">Barang</a>
            <a class="dropdown-item" href="index.php?page=kategori">Kategori</a>
          </div>
        </li>
      <?php else: ?>
        <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="stokDropdown" data-toggle="dropdown"><i class="fas fa-database"></i> Data Stok</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="index.php?page=barang">Barang</a>
            <a class="dropdown-item" href="index.php?page=kategori">Kategori</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="transaksiDropdown" data-toggle="dropdown"><i class="fas fa-desktop"></i> Transaksi</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="index.php?page=jual">Kasir</a>
            <a class="dropdown-item" href="index.php?page=laporan">Laporan Penjualan</a>
          </div>
        </li>
        <li class="nav-item"><a class="nav-link" href="index.php?page=pengaturan"><i class="fas fa-cogs"></i> Pengaturan Toko</a></li>
      <?php endif; ?>
    </ul>

    <!-- User Profile -->
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" data-toggle="dropdown">
          <img class="img-profile rounded-circle mr-2" src="assets/img/user/<?php echo $hasil_profil['gambar'];?>" width="30" height="30">
          <span class="d-none d-lg-inline text-white small"><?php echo $hasil_profil['nm_member'];?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow">
          <a class="dropdown-item" href="index.php?page=user"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<!-- Info Toko -->
<div class="store-info">
  <?php echo $toko['nama_toko'];?>, <?php echo $toko['alamat_toko'];?>
</div>

<!-- Content Wrapper -->
<div class="container-fluid">
