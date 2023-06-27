<?php
    require '../dompdf/autoload.inc.php';
    require '../koneksi.php';
    date_default_timezone_set('Asia/Jakarta');
    session_start();
    ob_start();
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
?>
<html lang="en">

<head>
    <style>
        body {
            margin: 0;
            padding: 0 10px;
            font-family: 'PT Sans', sans-serif;
        }

        @page {
            size: 6in;
            margin-top: 0cm;
            margin-left: 0cm;
            margin-right: 0cm;
        }

        table {
            width: 100%;
        }

        tr {
            width: 100%;

        }

        h1 {
            text-align: center;
            vertical-align: middle;
        }

        header {
            width: 100%;
            text-align: center;
            -webkit-align-content: center;
            align-content: center;
            vertical-align: middle;
        }

        .items thead {
            text-align: center;
        }

        .center-align {
            text-align: center;
        }

        .bill-details td {
            font-size: 12px;
        }

        .receipt {
            font-size: medium;
        }

        .items .heading {
            font-size: 12.5px;
            text-transform: uppercase;
            border-top:1px solid black;
            margin-bottom: 4px;
            border-bottom: 1px solid black;
            vertical-align: middle;
        }

        .items thead tr th:first-child,
        .items tbody tr td:first-child {
            width: 47%;
            min-width: 47%;
            max-width: 47%;
            word-break: break-all;
            text-align: left;
        }

        .items td {
            font-size: 12px;
            text-align: right;
            vertical-align: bottom;
        }

        .price::before {
             content: "Rp";
            font-family: Arial;
            text-align: right;
        }

        .sum-up {
            text-align: right !important;
        }
        .total {
            font-size: 13px;
            border-top:1px dashed black !important;
            border-bottom:1px dashed black !important;
        }
        .total.text, .total.price {
            text-align: right;
        }
        .total.price::before {
            content: "Rp"; 
        }
        .line {
            border-top:1px solid black !important;
        }
        .heading.rate {
            width: 20%;
        }
        .heading.amount {
            width: 25%;
        }
        .heading.qty {
            width: 5%
        }
        p {
            padding: 1px;
            margin: 0;
        }
        section, footer {
            font-size: 12px;
        }

        .bill-details{
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
        if(isset($_GET['kode_invoice']))
        {
            ?>
                <?php
                    $kode_invoice = $_GET['kode_invoice'];
                    $get_data_transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi_pembayaran WHERE kode_invoice='$kode_invoice'");
                    $dp = mysqli_fetch_assoc($get_data_transaksi);
                ?>
                <p style="text-align: center;">Kode Invoice : <?= $_GET['kode_invoice'] ?></p>
                <table class="bill-details">
                    <tbody>
                        <tr>
                            <td>Date : <span><?= date('d-m-Y')?></span></td>
                            <td>Time : <span><?= date('h:i:s')?></span></td>
                        </tr>
                        <tr>
                            <td>Nama Pelanggan : <span> <?= $dp['nama_pelanggan'] ?> </span></td>
                            <td>Keterangan : <span><?= $dp['keterangan'] ?></span></td>
                        </tr>
                        
                        
                    </tbody>
                </table>

                <div style="margin-top: 30px;"></div>

                <table>
                        <tr style="padding-bottom: 30px;">
                            <th class="center-align" colspan="2">
                                <span class="receipt">
                                    Struk Pembayaran Makanan
                                </span>
                            </th>
                        </tr>
                </table>
                
                <table class="items">
                    <thead>
                        <tr style="text-align: center;">
                            <th class="heading name">Item</th>
                            <th class="heading" style="text-align: center;">Qty</th>
                            <th class="heading rate" style="text-align: right;">Harga Satuan</th>
                            <th class="heading amount" style="text-align: right;">Total</th>
                        </tr>
                    </thead>
                
                    <tbody>
                       <?php
                        $get_data_all_transaksi = mysqli_query($koneksi, "SELECT * FROM laporan_transaksi WHERE kode_invoice='$kode_invoice'");
                        while($data = mysqli_fetch_object($get_data_all_transaksi)):
                       ?>
                            <tr>
                                <td><?= $data->nama; ?></td>
                                <td style="text-align: center; margin-left: 90px;"><?= $data->jumlah; ?></td>
                                <td class="price" style="text-align: right;"><?= $data->harga_satuan;?></td>
                                <td class="price" style="text-align: right;"><?= $data->harga_satuan * $data->jumlah; ?></td>
                            </tr>
                        <?php endwhile; ?>
                       
                        <tr>
                            <th colspan="3" class="total text">Total</th>
                            <th class="total price"><?= $dp['total_bayar']?></th>
                        </tr>
                        <tr>
                            <td colspan="3" class="sum-up line">Total Bayar</td>
                            <td class="line price"><?= $dp['total_bayar']?></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="sum-up">Bayar</td>
                            <td class="price"><?= $dp['uang'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="sum-up">Kembalian</td>
                            <td class="price"><?= $dp['uang'] - $dp['total_bayar'] ?></td>
                        </tr>
                    </tbody>
                </table>
                <section>
                    <?php
                        $username = $_SESSION['username'];
                        $get_data_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
                        $user = mysqli_fetch_object($get_data_user);
                    ?>
                    <p>
                        Kasir : <span><?= $user->nama; ?></span>
                    </p>
                    <p style="text-align:center">
                        Terima Kasih Sudah Memesan Makanan Di Tempat Kami
                    </p>
                </section>
            <?php
        }
    ?>
</body>

</html>

<?php
$html = ob_get_contents();
ob_end_clean();
$dompdf->loadHtml($html);
$dompdf->setPaper('A6', 'potrait');
$dompdf->render();
$invoice_code = $_GET['kode_invoice'];
$title = 'Struk Pembayaran'."$invoice_code";
$dompdf->stream($title.'.pdf', array("Attachment"=>1));
?>
