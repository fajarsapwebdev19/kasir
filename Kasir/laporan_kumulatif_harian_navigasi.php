<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
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
        <a class="nav-link" href="?page=Transaksi">Transaksi</a>
      </li>
      <li class="nav-item  active dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Laporan
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="?page=Laporan_Harian">Harian</a>
          <a class="dropdown-item active" href="?page=Laporan_Kumulatif_Harian">Kumulatif Harian</a>
        </div>
      </li>
      <li class="nav-item">
        <a href="?page=Profile" class="nav-link">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>