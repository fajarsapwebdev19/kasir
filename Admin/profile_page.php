<div class="mt-5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <?php
                        if($data_user['email'] == "")
                        {
                            ?>
                                <div class="alert alert-warning">
                                    <em class="fas fa-exclamation"></em> Email Belum Di Isi. Silahkan Isi Dengan Benar
                                </div>
                            <?php
                        }
                    ?>
                    <?php
                        if(isset($_SESSION['val']) && $_SESSION['val'] !='')
                        {
                            echo $_SESSION['val'];
                            unset($_SESSION['val']);
                        }
                    ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th width="25%">Nama</th>
                                <th width="3%" class="text-center">:</th>
                                <td><?= $data_user['nama']?></td>
                            </tr>
                            <tr>
                                <th width="25%">Jenis Kelamin</th>
                                <th width="3%" class="text-center">:</th>
                                <td><?= $data_user['jk']?></td>
                            </tr>
                            <tr>
                                <th width="25%">No Telp</th>
                                <th width="3%" class="text-center">:</th>
                                <td><?= $data_user['no_telp']?></td>
                            </tr>
                            <tr>
                                <th width="25%">Email</th>
                                <th width="3%" class="text-center">:</th>
                                <td><?= $data_user['email'] ?></td>
                            </tr>
                            <tr>
                                <th width="25%">Alamat</th>
                                <th width="3%" class="text-center">:</th>
                                <td><?= $data_user['alamat'] ?></td>
                            </tr>
                            <tr>
                                <th width="25%">Username</th>
                                <th width="3%" class="text-center">:</th>
                                <td><?= $data_user['username'] ?></td>
                            </tr>
                            <tr>
                                <th width="25%">Level</th>
                                <th width="3%" class="text-center">:</th>
                                <td><?= $data_user['level'] ?></td>
                            </tr>
                            <tr>
                                <th width="25%">Status Akun</th>
                                <th width="3%" class="text-center">:</th>
                                <td><?= $data_user['status_akun'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="#edit" data-toggle="modal" class="link-over">
                                <em class="fas fa-edit"></em>
                                Ubah Profile
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#update_password" data-toggle="modal" class="link-over">
                                <em class="fas fa-key"></em>
                                Ubah Password
                            </a>
                        </li>
                    </ul>
                    <?php require_once('action_profile.php'); ?>
                </div>
            </div>
        </div>
    </div>
</div>