<div class="">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Harga Satuan</th>
        <th>Jumlah</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <?php
        require '../koneksi.php'; 
        $transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi");
        while($tr = mysqli_fetch_assoc($transaksi)): 
      ?>
      <tr>
        <td>
          <a href="" class="btn btn-danger btn-sm">
            <em class="fas fa-trash-alt"></em>
          </a>
        </td>
        <td><?= $tr['nama']?></td>
        <td><?= "Rp " . number_format($tr['harga_satuan'],0,',','.');?></td>
        <td style="font-size: 12px;">
          <form action="../proses-add-minus.php" method="post">
            <input type="hidden" name="nama" value="<?= $tr['nama'] ?>">
            <button type="submit" name="add" style="font-size:8px;" class="btn btn-success btn-sm mt-2"><em class="fas fa-plus"></em></button> 
            <?= $tr['jumlah']?> 
            <button type="submit" name="minus" style="font-size: 8px;" class="btn btn-danger btn-sm mt-2"><em class="fas fa-minus"></em></button>
          </form>
        </td>
        <td><?= "Rp " . number_format($tr['total'],0,',','.')?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

  <table class="table table-sm table-responsive-sm">
    <tfoot>
        <tr>
          <th class="text-right">Total Bayar</th>
          <th>
            <?php
              $hitung = mysqli_query($koneksi, "SELECT sum(total) AS jumlah FROM transaksi");

              $jm = mysqli_fetch_assoc($hitung);

              echo "Rp " . number_format($jm['jumlah'],0,',','.');
            ?>
          </th>
        </tr>
    </tfoot>
  </table>

  <form action="../proses_transaksi.php" method="post" class="needs-validation" novalidate>
    
      <?php
        require '../koneksi.php';

        $tran = mysqli_query($koneksi, "SELECT * FROM transaksi");

        foreach($tran as $dt):
      ?>
        <input type="hidden" name="id_transaksi[]" value="<?= $dt['id_transaksi'] ?>">
        <input type="hidden" name="nama[]" value="<?= $dt['nama'] ?>">
        <input type="hidden" name="jumlah[]" value="<?= $dt['jumlah'] ?>">
        <input type="hidden" name="harga_satuan[]" value="<?= $dt['harga_satuan'] ?>">
        <input type="hidden" name="total[]" value="<?= $dt['total'] ?>">
        <input type="hidden" name="jumlah_data[]" value="">
      <?php endforeach; ?>
      <div class="form-group">
        <label for="">
            Total Bayar
        </label>
        <input type="text" id="totbay" name="totbay" class="form-control rupiah" value="<?= $jm['jumlah']?>" readonly>
      </div>
      <div class="form-group">
        <label for="">
            Uang
        </label>
        <input type="text" name="uang" id="uang" class="form-control rupiah" required>
      </div>
      <div class="form-group">
        <label for="">
            Kembalian
        </label>
        <input type="text" name="kembalian" id="kembalian" class="form-control" disabled readonly>
      </div>
      <div class="form-group">
        <label for="">
          Nama Pelanggan
        </label>
        <input type="text" name="nama_pelanggan" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="">
            Keterangan
        </label>
        <select name="keterangan" class="form-control" required>
          <option value="">Pilih</option>
          <option>Makan Di Tempat</option>
          <option>Bungkus</option>
        </select>
      </div>
      <div class="form-group">
        <button class="btn btn-success" name="bayar"><em class="fas fa-money-bill"></em> Bayar</button>
      </div>
  </form>
</div>

<script src="../assets/app/componens/js/jquery-3.4.1.min.js"></script>
<script>
   $(document).ready(function(){
      $("#totbay,#uang").keyup(function() {
          var total_bayar = $("#totbay").val();
          var uang = $("#uang").val();

          var kembalian = parseFloat(uang) - parseFloat(total_bayar);

          if(isNaN(kembalian)) {
              $("#kembalian").val(0);
          }else{
            $("#kembalian").val(kembalian);
          }
      });
    });
</script>