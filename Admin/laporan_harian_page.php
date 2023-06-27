<div class="mt-3" style="padding: 10px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Laporan Harian
                </div>
                <div class="card-body">
                    <?php
                        if(isset($_SESSION['val']) && $_SESSION['val'] !=''){
                            echo $_SESSION['val'];
                            unset($_SESSION['val']);
                        }
                    ?>
                    <form action="" method="post" autocomplete="off">
                        <div class="form-inline">
                            <div class="col-6">
                            <input type="text" name="tanggal" class="form-control date col-md-4 mt-2">
                            <button name="filter" class="btn btn-success mt-2"><em class="fas fa-search"></em> Filter</button>
                            <button name="print" class="btn btn-primary mt-2"><em class="fas fa-print"></em> Print</button>
                            <button type="button" data-toggle="modal" data-target="#konfirm_delete" class="btn btn-danger mt-2"><em class="fas fa-trash"></em> Delete All</button>
                            </div>
                        </div>                        
                    </form>

                    <!-- konfirmasi hapus semua data -->
                    <div class="modal fade" id="konfirm_delete" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Semua Data Laporan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <em class="fas fa-info text-warning"></em> Peringatan
                                <p>
                                    Dengan Ini anda menghapus semua data termaksuk :
                                    <p>1. Data Laporan Transaksi</p>
                                    <p>2. Data Transaksi Pembayaran</p>
                                </p>

                                <p>Apakah Anda Yakin Mau Hapus Semua Data ?</p>
                            </div>
                            <form action="../proses_hapus_all.php" method="post">
                                <div class="modal-footer">
                                    <button type="submit" name="delete_all" class="btn btn-success">Ya</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <!-- end konfirmasi hapus semua data -->

                    <div class="mt-3">
                        <?php
                                if(isset($_POST['filter']))
                                {
                                    $tanggal = date('Y-m-d', strtotime($_POST['tanggal']));
                                
                                    if(empty($_POST['tanggal']))
                                    {
                                        $jumlah = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM laporan_transaksi");
                                    }else{
                                        $jumlah = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM laporan_transaksi WHERE tanggal_pembelian='$tanggal'");
                                    }
                                    
                                    $jml = mysqli_fetch_object($jumlah);

                                    ?>
                                        Total Pemasukan : <?= "Rp. ".number_format($jml->jumlah,0,',','.'); ?>
                                    <?php
                                }
                        ?>

                        <?php
                            $jumlah = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM laporan_transaksi");

                            $jml = mysqli_fetch_object($jumlah);

                            if(!isset($_POST['filter']))
                            {
                                ?>
                                    Total Pemasukan : <?= "Rp. ".number_format($jml->jumlah,0,',','.'); ?>
                                <?php
                            }
                        ?>

                        

                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="table-responsive">
                            <table class="table table-hover datatable table-striped table-sm">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>No Invoice</th>
                                        <th>Nama Makanan</th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th>Tanggal Beli</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                        $no = 1;
                                        $date = date('d-m-Y');
                                        if(isset($_POST['filter']))
                                        {
                                            $tanggal = date('Y-m-d', strtotime($_POST['tanggal']));

                                            if(empty($_POST['tanggal']))
                                            {
                                                $get_data_transaksi = mysqli_query($koneksi, "SELECT * FROM laporan_transaksi ORDER BY tanggal_pembelian ASC");
                                            }else{
                                                $get_data_transaksi = mysqli_query($koneksi, "SELECT * FROM laporan_transaksi WHERE tanggal_pembelian='$tanggal' ORDER BY tanggal_pembelian ASC");
                                            }
                                        
                                            while($data = mysqli_fetch_object($get_data_transaksi)){
                                                ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $data->kode_invoice; ?></td>
                                                        <td><?= $data->nama; ?></td>
                                                        <td><?= "Rp. ".number_format($data->harga_satuan,0,',','.'); ?></td>
                                                        <td><?= $data->jumlah; ?></td>
                                                        <td><?= "Rp. ".number_format($data->total, 0,',','.'); ?></td>
                                                        <td><?= date('d-m-Y', strtotime($data->tanggal_pembelian))?></td>
                                                    </tr>
                                                <?php
                                            }
                                        }elseif(isset($_POST['print']))
                                        {
                                            
                                            $tanggal = $_POST['tanggal'];

                                            $_SESSION['tanggal'] = date('Y-m-d', strtotime($tanggal));
                                            
                                            if(! headers_sent())
                                            {
                                                header('location: Print_laporan_harian.php');
                                            }else{
                                                ?>
                                                    <script>
                                                        window.location.href='Print_laporan_harian.php';
                                                    </script>
                                                <?php
                                            }
                                        }
                                        else{
                                            
                                            $no = 1;
                                            $get_data_transaksi = mysqli_query($koneksi, "SELECT * FROM laporan_transaksi ORDER BY tanggal_pembelian ASC");
                                        
                                            while($data = mysqli_fetch_object($get_data_transaksi)){
                                                ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $data->kode_invoice; ?></td>
                                                        <td><?= $data->nama; ?></td>
                                                        <td><?= "Rp. ".number_format($data->harga_satuan,0,',','.'); ?></td>
                                                        <td><?= $data->jumlah; ?></td>
                                                        <td><?= "Rp. ".number_format($data->total,0,',','.'); ?></td>
                                                        <td><?= $data->tanggal_pembelian; ?></td>
                                                    </tr>
                                                <?php
                                            }

                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>