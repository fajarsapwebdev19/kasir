<div class="mt-5" style="padding: 10px 0;">
  <div class="card">
    <div class="card-body">
      <div class="mt-4">
        <?php
          if(isset($_SESSION['val']) && $_SESSION['val'] !='')
          {
            echo $_SESSION['val'];
            unset($_SESSION['val']);
          }
        ?>
      </div>

      <div class="mt-3">
        <div class="table-responsive">
          <table class="table table-hover datatable table-sm text-center">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No Telp</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <th>Status Akun</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                $tb_user = mysqli_query($koneksi, "SELECT * FROM user ORDER BY level ASC");
                while($data = mysqli_fetch_assoc($tb_user)):
              ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nama']?></td>
                <td><?= $data['no_telp']?></td>
                <td><?= $data['email'] ?></td>
                <td><?= $data['username'] ?></td>
                <td><?= $data['password']?></td>
                <td><?= $data['level'] ?></td>
                <td>
                  <?php
                    if($data['status_akun'] == "Aktif")
                    {
                      echo '<p class="badge badge-success">Aktif</p>';
                    }
                    elseif($data['status_akun'] == "Tidak Aktif")
                    {
                      echo '<p class="badge badge-danger">Tidak Aktif</p>';
                    }
                  ?>
                </td>
                <td>
                  <a href="#delete<?= $data['id_user'] ?>" data-toggle="modal" class="btn btn-sm btn-danger">
                    <em class="fas fa-trash"></em>
                  </a>
                  <?php
                    if($data['status_akun'] == "Aktif")
                    {
                      ?>
                        <a href="#nonact<?= $data['id_user'] ?>" data-toggle="modal" class="btn btn-sm btn-danger">
                          <em class="fas fa-times-circle"></em>
                        </a>
                      <?php
                    }elseif($data['status_akun'] == "Tidak Aktif")
                    {
                      ?>
                        <a href="#act<?= $data['id_user']?>" data-toggle="modal" class="btn btn-sm btn-success">
                          <em class="fas fa-check-circle"></em>
                        </a>
                      <?php
                    }
                  ?>
                </td>
              </tr>
              <?php require('action_account.php'); ?>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>