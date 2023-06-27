<?php
    if(empty($_GET['page']))
    {
        require 'home_navigasi.php';
    }
    elseif($_GET['page'] == "Transaksi")
    {
        require 'transaksi_navigasi.php';
    }
    elseif($_GET['page'] == "Laporan_Harian")
    {
        require 'laporan_harian_navigasi.php';
    }
    elseif($_GET['page'] == "Laporan_Kumulatif_Harian")
    {
        require 'laporan_kumulatif_harian_navigasi.php';
    }elseif($_GET['page'] == "Profile")
    {
        require 'profile_navigasi.php';
    }
    elseif($_GET['page'] == "Transaksi_Success")
    {
        require 'transaksi_navigasi.php';
    }
?>