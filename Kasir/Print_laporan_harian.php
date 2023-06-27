<?php
    session_start();
    
    ob_start();
    require '../dompdf/autoload.inc.php';
    require '../koneksi.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Harian</title>
    <link rel="stylesheet" href="../assets/app/componens/css/bootstrap.min.css">
</head>
<body>
    <div class="mt-4">
        <div class="container-fluid">
            <div class="text-center">
                <h3>Laporan Harian</h3>
                <h2>Kasir Cerdas UKM KVSG</h2>
            </div>

            <table class="table table-striped table-bordered">
                <thead>
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
                <tbody>
                    <?php 
                        $tanggal = $_SESSION['tanggal'];

                        $no = 1;
                        
                        //jika inputan tanggal kosong maka nilai defaultnya adalah 1970-01-01
                        if($tanggal == '1970-01-01')
                        {
                            $get_data_transaksi = mysqli_query($koneksi, "SELECT * FROM laporan_transaksi ORDER BY tanggal_pembelian ASC");
                    
                            $get_jumlah = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM laporan_transaksi");
                        }else{
                            $get_data_transaksi = mysqli_query($koneksi, "SELECT * FROM laporan_transaksi WHERE tanggal_pembelian='$tanggal' ORDER BY tanggal_pembelian ASC");
                    
                            $get_jumlah = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM laporan_transaksi WHERE tanggal_pembelian='$tanggal'");
                        }

                        while($data = mysqli_fetch_object($get_data_transaksi)): 
                    
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data->kode_invoice; ?></td>
                            <td><?= $data->nama; ?></td>
                            <td><?= "Rp.".number_format($data->harga_satuan, 0,',','.'); ?></td>
                            <td><?= $data->jumlah; ?></td>
                            <td><?= "Rp.".number_format($data->total, 0,',','.'); ?></td>
                            <td><?= date('d-m-Y', strtotime($data->tanggal_pembelian)); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
                <tbody>
                    <tr>
                        <th colspan="5">Total Pemasukan</th>
                        <td colspan="2">
                            <?php
                                $jumlah = mysqli_fetch_assoc($get_jumlah);
                                echo "Rp.".number_format($jumlah['jumlah'],0,',','.');
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
$html = ob_get_contents();
ob_end_flush();
ob_end_clean();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$tanggal_laporan = date('d-m-Y', strtotime($tanggal));
$title = 'Laporan Harian Tanggal '."$tanggal_laporan";
$dompdf->stream($title.'.pdf', array("Attachment"=>1));
?>