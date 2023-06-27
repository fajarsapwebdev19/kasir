<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#"><?= $data_user['level'] ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="./">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=tambah_menu">Tambah Menu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=akun">
          Manajemen Akun
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Laporan
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="?page=laporan_harian">Harian</a>
          <a class="dropdown-item" href="?page=laporan_kumulatif_harian">Kumulatif Harian</a>
        </div>
      </li>
      <li class="nav-item active">
        <a href="?page=profile" class="nav-link">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>