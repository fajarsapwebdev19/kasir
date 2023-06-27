<div class="mt-3" style="padding: 10px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Laporan Kumulatif Harian
                </div>
                <div class="card-body">
                    <form action="" method="post" autocomplete="off">
                        <div class="form-inline">
                            <div class="col-6">
                            <input type="text" name="tanggal_awal" class="form-control date col-md-4 mt-2"> - 
                            <input type="text" name="tanggal_akhir" class="form-control date col-md-4 mt-2">
                            <button name="filter" class="btn btn-success mt-2"><em class="fas fa-search"></em> Filter</button>
                            <button name="print" class="btn btn-primary mt-2"><em class="fas fa-print"></em> Print</button>
                            </div>
                        </div>                        
                    </form>

                    <div class="mt-3">
                        <?php
                                if(isset($_POST['filter']))
                                {
                                    $tanggal_awal = date('Y-m-d', strtotime($_POST['tanggal_awal']));
                                    $tanggal_akhir = date('Y-m-d', strtotime($_POST['tanggal_akhir']));
                                
                                    if(empty($_POST['tanggal_awal']) && empty($_POST['tanggal_akhir']))
                                    {
                                        $jumlah = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM laporan_transaksi");
                                    }else{
                                        $jumlah = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM laporan_transaksi WHERE tanggal_pembelian BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
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
                                            $tanggal_awal = date('Y-m-d', strtotime($_POST['tanggal_awal']));
                                            $tanggal_akhir = date('Y-m-d', strtotime($_POST['tanggal_akhir']));

                                            if(empty($_POST['tanggal_awal']) && empty($_POST['tanggal_akhir']))
                                            {
                                                $get_data_transaksi = mysqli_query($koneksi, "SELECT * FROM laporan_transaksi ORDER BY tanggal_pembelian ASC");
                                            }else{
                                                $get_data_transaksi = mysqli_query($koneksi, "SELECT * FROM laporan_transaksi WHERE tanggal_pembelian BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY tanggal_pembelian ASC");
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
                                            
                                            $tanggal_awal = $_POST['tanggal_awal'];
                                            $tanggal_akhir = $_POST['tanggal_akhir'];

                                            $_SESSION['tanggal_awal'] = date('Y-m-d', strtotime($tanggal_awal));
                                            $_SESSION['tanggal_akhir'] = date('Y-m-d', strtotime($tanggal_akhir));
                                            
                                            if(! headers_sent())
                                            {
                                                header('location: Print_laporan_kumulatif_harian.php');
                                            }else{
                                                ?>
                                                    <script>
                                                        window.location.href='Print_laporan_kumulatif_harian.php';
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