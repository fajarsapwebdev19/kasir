<div class="mt-4">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="text-center">
          <h1 class="fas fa-check-circle text-success"></h1>
          <h3>
            Transaksi Pembayaran Berhasil
          </h3>
        </div>

        <div class="row justify-content-center mt-3">
          <div class="col-md-5 col-lg-12 col-xl-3 col-12">
            <?php
              require '../koneksi.php';
              
              if(empty(isset($_GET['kode_invoice'])))
              {
                header('location: ?page=Transaksi');
              }
              elseif(isset($_GET['kode_invoice']))
              {
                $kode_invoice = $_GET['kode_invoice'];

                $tr = mysqli_query($koneksi, "SELECT * FROM transaksi_pembayaran WHERE kode_invoice='$kode_invoice'");

                $data = mysqli_fetch_assoc($tr);


                ?>
                  <table class="table table-sm table-responsive" style="border: none;">
                    <thead>
                      <tr>
                        <th>Kode Invoice</th>
                        <th></th>
                        <th><?= @$data['kode_invoice']?></th>
                      </tr>
                      <tr>
                        <th>Total Bayar</th>
                        <th></th>
                        <th><?= "Rp " . number_format($data['total_bayar'],0,',','.'); ?></th>
                      </tr>
                      <tr>
                        <th>Uang</th>
                        <th></th>
                        <th><?= "Rp " . number_format($data['uang'],0,',','.'); ?></th>
                      </tr>
                      <tr>
                        <th>Kembalian</th>
                        <th></th>
                        <th><?= "Rp " . number_format($data['uang'] - $data['total_bayar'],0,',','.'); ?></th>
                      </tr>
                    </thead>
                  </table>

                  <div class="row justify-content-center">
                    <div class="col-md-3 col-3 col-sm-3 col-xl-3">
                      <a href="Print.php?kode_invoice=<?= $data['kode_invoice']?>">
                        <button class="btn btn-success"><em class="fas fa-print"></em>Print</button>
                      </a>
                    </div>
                  </div>
                <?php
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>