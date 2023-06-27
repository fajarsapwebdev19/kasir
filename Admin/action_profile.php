<!-- Modal -->
<div class="modal fade" id="edit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../proses_update_profile.php" method="post">
        <div class="modal-body">
            <input type="hidden" name="username" value="<?= $data_user['username'] ?>">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= $data_user['nama']?>">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="inlineRadio1" value="Laki-Laki" <?php if($data_user['jk'] == "Laki-Laki"){echo "checked"; }?>>
                    <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="Perempuan" <?php if($data_user['jk'] == "Perempuan") {echo 'checked'; }?>>
                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                </div>
            </div>
            <div class="form-group">
                <label>No Telp</label>
                <input type="text" name="no_telp" class="form-control" value="<?= $data_user['no_telp']?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= $data_user['email']?>">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?= $data_user['alamat']?>">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="ubah" class="btn btn-info">Ubah</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="update_password" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../proses_update_password.php" method="post">
        <div class="modal-body">
            <div class="form-group">
                <label>Password Lama</label>
                <input type="password" name="password_lama" class="form-control">
            </div>
            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="password_baru" class="form-control">
            </div>
            <div class="form-group">
                <label>Konfirmasi Password Baru</label>
                <input type="password" name="konfirmasi_password_baru" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="ubah" class="btn btn-info">Ubah</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>