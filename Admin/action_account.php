<!-- hapus akun -->
<div class="modal fade" id="delete<?= $data['id_user'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../proses_hapus_akun.php" method="post">
        <input type="hidden" name="username" class="form-control" value="<?= $data['username'] ?>">
        <div class="modal-body text-center">
            Apakah Anda Yakin Ingin Menghapus Akun : <?= $data['username'] ?>
        </div>
        <div class="text-center mb-4">
            <button type="submit" name="hapus" class="btn btn-success">Ya</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /hapus akun -->

<!-- blokir akun -->
<div class="modal fade" id="nonact<?= $data['id_user'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Blokir Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../proses_blokir_akun.php" method="post">
        <input type="hidden" name="username" class="form-control" value="<?= $data['username'] ?>">
        <div class="modal-body text-center">
            Apakah Anda Yakin Ingin Memblokir Akun : <?= $data['username'] ?>
        </div>
        <div class="text-center mb-4">
            <button type="submit" name="blokir" class="btn btn-success">Ya</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /blokir akun -->

<!-- aktifkan akun -->
<div class="modal fade" id="act<?= $data['id_user'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Aktifkan Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../proses_aktif_akun.php" method="post">
        <input type="hidden" name="username" class="form-control" value="<?= $data['username'] ?>">
        <div class="modal-body text-center">
            Apakah Anda Yakin Ingin Aktifkan Akun : <?= $data['username'] ?>
        </div>
        <div class="text-center mb-4">
            <button type="submit" name="aktifkan" class="btn btn-success">Ya</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /aktifkan akun -->