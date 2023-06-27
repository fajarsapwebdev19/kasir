<!-- tambah menu -->
<div class="modal fade" id="add_data" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../proses_tambah_menu.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="">
              Kode Barang
            </label>
            <input type="text" name="kode_barang" class="form-control">
          </div>
          <div class="form-group">
            <label for="">
              Nama Barang
            </label>
            <input type="text" name="nama_barang" class="form-control">
          </div>
          <div class="form-group">
            <label for="">
              Foto Barang
            </label>
            <input type="file" name="foto_barang" class="form-control">
          </div>
          <div class="form-group">
            <label for="">
              Jenis Barang
            </label>
            <select name="jenis" class="form-control">
              <option value="">Pilih Jenis Barang</option>
              <option>Makanan</option>
              <option>Minuman</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">
              Harga
            </label>
            <input type="text" name="harga" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- edit menu -->
<div class="modal fade" id="edit<?= $data['kode_barang'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../proses_edit_menu.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="kode_barang_lama" value="<?= $data['kode_barang']?>">
            <label for="">
              Kode Barang
            </label>
            <input type="text" name="kode_barang" class="form-control" value="<?= $data['kode_barang']?>">
          </div>
          <div class="form-group">
            <label for="">
              Nama Barang
            </label>
            <input type="text" name="nama_barang" class="form-control" value="<?= $data['nama_barang']?>">
          </div>
          <div class="form-group">
            <label for="">
              Foto Barang
            </label>
            <input type="file" name="foto_barang" class="form-control">
          </div>
          <div class="form-group">
            <label for="">
              Jenis Barang
            </label>
            <select name="jenis" class="form-control">
              <option value="">Pilih Jenis Barang</option>
              <?php
                if($data['jenis'] == "Makanan")
                {
                  ?>
                    <option selected>Makanan</option>
                    <option>Minuman</option>
                  <?php
                }elseif($data['jenis'] == "Minuman")
                {
                  ?>
                    <option>Makanan</option>
                    <option selected>Minuman</option>
                  <?php
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">
              Harga
            </label>
            <input type="text" name="harga" class="form-control" value="<?= $data['harga']?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="edit" class="btn btn-info">Update</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- / edit menu -->

<!-- hapus menu -->
<div class="modal fade" id="delete<?= $data['kode_barang'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        Apakah Anda Yakin Mau Hapus Menu : <?= $data['nama_barang']?>
        <form action="../proses_hapus_menu.php" method="post">
          <input type="hidden" name="kode_barang" value="<?= $data['kode_barang'] ?>">
          <div class="text-center mt-2">
            <button type="submit" name="delete" class="btn btn-success">Ya</button>
            <button type="button" data-dismiss="modal" class="btn btn-danger">Tidak</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- / hapus menu -->
