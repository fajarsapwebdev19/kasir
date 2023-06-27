<?php
    if(empty($_GET['page']))
    {
        require 'home_page.php';
    }
    elseif($_GET['page'] == "Transaksi")
    {
        require 'transaksi_page.php';
    }
    elseif($_GET['page'] == "Laporan_Harian")
    {
        require 'laporan_harian_page.php';
    }
    elseif($_GET['page'] == "Laporan_Kumulatif_Harian")
    {
        require 'laporan_kumulatif_harian_page.php';
    }
    elseif($_GET['page'] == "Profile")
    {
        require 'profile_page.php';
    }
    elseif($_GET['page'] == "Transaksi_Success")
    {
        require 'transaksi_success.php';
    }
?>