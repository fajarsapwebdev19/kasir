<?php
    if(empty($_GET['page']))
    {
        $title = "Home | Kasir";
    }
    elseif($_GET['page'] == "Transaksi")
    {
        $title = "Transaksi | Kasir";
    }
    elseif($_GET['page'] == "Laporan_Harian")
    {
        $title = "Laporan Harian | Kasir";
    }
    elseif($_GET['page'] == "Laporan_Kumulatif_Harian")
    {
        $title = "Laporan Kumulatif Harian | Kasir";
    }
    elseif($_GET['page'] == "Profile")
    {
        $title = "Profile | Kasir";
    }
    elseif($_GET['page'] == "Transaksi_Success")
    {
        $title = "Transaksi Berhasil | Kasir";
    }
?>