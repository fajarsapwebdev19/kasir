<div class="batas">
  <?php
    if($data_user['email'] == "")
    {
      ?>
        <div class="alert alert-warning bg-warning text-black">
          <em class="fas fa-exclamation-triangle"></em>
          Silahkan Masukan Email Anda
        </div>
      <?php
    }
  ?>
  <h4 class="text-center">Selamat Datang <?= $data_user['nama'] ?></h4>
  <div class="row mt-5">
    <div class="col-6 col-md-4 offset-md-2">
      <a href="?page=laporan_harian" class="text-center link-over">
        <div class="card garis mb-4">
          <div class="card-body mb-4">
            <h1 class="fas fa-calendar-alt text-warning"></h1>
            <h5>Laporan Harian Transaksi</h5>
          </div>
        </div>
      </a>
    </div>
    <div class="col-6 col-md-4">
      <a href="?page=laporan_kumulatif_harian" class="text-center link-over">
        <div class="card garis">
          <div class="card-body">
            <h1 class="fas fa-file text-success"></h1>
            <h5>Laporan Ringkasan Transaksi Kumulatif Harian</h5>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>