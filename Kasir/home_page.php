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
            <a href="?page=Transaksi" class="text-center link-over">
                <div class="card drop-garis">
                    <div class="card-body">
                        <h1 class="fas fa-credit-card text-success"></h1>
                        <h5>Transaksi</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4">
            <a href="?page=Laporan_Harian" class="text-center link-over">
                <div class="card drop-garis">
                    <div class="card-body">
                        <h1 class="fas fa-book text-dark"></h1>
                        <h5>Laporan Harian</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
</div>