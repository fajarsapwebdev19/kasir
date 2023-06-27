<div class="mt-5" style="padding: 10px 0;">
  <div class="card">
    <div class="card-body">
      <button class="btn btn-primary" data-toggle="modal" data-target="#add_data">
        <em class="fas fa-plus"></em>
        Tambah Menu
      </button>

      <div class="mt-3">
        <?php
          if(isset($_SESSION['val']) && $_SESSION['val'] != '')
          {
            echo $_SESSION['val'];
            unset($_SESSION['val']);
          }
        ?>
      </div>

      <div class="mt-4">
        <div class="table-responsive">
          <table class="table datatable table-bordered text-center table-hover table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Foto Barang</th>
                <th>Jenis Barang</th>
                <th>Harga</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                $brg = mysqli_query($koneksi, "SELECT * FROM barang");
                while($data = mysqli_fetch_assoc($brg)):
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $data['kode_barang'] ?></td>
                  <td><?= $data['nama_barang'] ?></td>
                  <td>
                    <img src="../assets/app/img/barang/<?= $data['foto_barang']?>" width="90px">
                  </td>
                  <td><?= $data['jenis'] ?></td>
                  <td><?= $data['harga'] ?></td>
                  <td>
                    <a href="#edit<?= $data['kode_barang'] ?>" data-toggle="modal" class="btn btn-info btn-sm mt-1" title="Edit Data">
                      <em class="fas fa-edit"></em>
                    </a>
                    <a href="#delete<?= $data['kode_barang'] ?>" data-toggle="modal" class="btn btn-danger btn-sm mt-1" title="Hapus Data">
                      <em class="fas fa-trash"></em>
                    </a>
                  </td>
                </tr>
                <?php require('menu_action.php') ?>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>