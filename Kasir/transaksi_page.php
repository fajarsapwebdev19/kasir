<div class="mt-3" style="padding: 10px 0;">
    <div class="row">
        <div class="col-md-3 mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <b>Jenis</b>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item btn-block" role="presentation">
                            <button class="btn btn-info btn-block" id="makanan-tab" data-toggle="tab" data-target="#makanan" type="button" role="tab" aria-controls="makanan" aria-selected="true">Makanan</button>
                        </li>
                        <li class="nav-item btn-block" role="presentation">
                            <button class="btn btn-info btn-block" id="minuman-tab" data-toggle="tab" data-target="#minuman" type="button" role="tab" aria-controls="minuman" aria-selected="false">Minuman</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.col-md-2 -->
        <div class="col-md-5 mt-2">
            <div class="tab-content">
                <div class="tab-pane active" id="makanan" role="tabpanel" aria-labelledby="makanan-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <b>Makanan</b>
                            </div>
                            
                            <div class="row">
                                    <?php
                                        $tb_menu = mysqli_query($koneksi, "SELECT * FROM barang WHERE jenis='Makanan'");
                                        while($data = mysqli_fetch_assoc($tb_menu)):
                                    ?>
                                    <div class="col-md-6 col-6 col-lg-4 mt-2">
                                        <form action="insert.php" method="post">
                                            <input type="hidden" id="nama" name="nama" value="<?= $data['nama_barang'] ?>">
                                            <input type="hidden" id="harga" name="harga" value="<?= $data['harga'] ?>">
                                            <input type="hidden" id="jumlah" name="jumlah" value="1">
                                            <button type="submit" class="btn-oke">
                                                <div class="card timbul">
                                                    <img src="../assets/app/img/barang/<?= $data['foto_barang'] ?>" width="130px" height="120px" alt="">
                                                    <div class="card-body">
                                                        <div class="text-center">
                                                            <p><?= $data['nama_barang'] ?></p>
                                                            <b><?= "Rp " . number_format($data['harga'],0,',','.')?></b>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </form>
                                    </div>
                                    <?php endwhile; ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="minuman" role="tabpanel" aria-labelledby="minuman-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <b>Minuman</b>
                            </div>
                            <?php
                                $tb_menu = mysqli_query($koneksi, "SELECT * FROM barang WHERE jenis='Minuman'");
                                while($data = mysqli_fetch_assoc($tb_menu)):
                            ?>
                            <div class="row">
                                    <div class="col-md-6 col-6 col-lg-4 mt-2">
                                        <form action="insert.php" method="post">
                                            <input type="hidden" id="nama" name="nama" value="<?= $data['nama_barang'] ?>">
                                            <input type="hidden" id="harga" name="harga" value="<?= $data['harga'] ?>">
                                            <input type="hidden" id="jumlah" name="jumlah" value="1">
                                            <button type="submit" class="btn-oke">
                                                <div class="card timbul">
                                                    <img src="../assets/app/img/barang/<?= $data['foto_barang'] ?>" width="120px" height="120px" alt="">
                                                    <div class="card-body">
                                                        <div class="text-center">
                                                            <p><?= $data['nama_barang'] ?></p>
                                                            <b><?= "Rp " . number_format($data['harga'],0,',','.')?></b>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </form>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-md-4 -->
        <!-- table transaksi -->
        <div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-body">
                    <div id="table-transaksi" class="table-responsive-xl table-responsive-sm">
                        <?php require('tampil.php') ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-md-6 -->
    </div>
</div>