<?php
    session_start();

    require 'koneksi.php';

    if(isset($_POST['delete_all']))
    {
        $delete_all = mysqli_query($koneksi, "TRUNCATE laporan_transaksi");
        $delete_all = mysqli_query($koneksi, "TRUNCATE transaksi_pembayaran");

        if($delete_all)
        {
            $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                Berhasil Hapus Semua Data
            </div>';
            header('location: Admin/?page=laporan_harian');
        }
    }
?>