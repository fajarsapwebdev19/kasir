<?php
  if(empty($_GET['page']))
  {
    $title = "Home | Admin";
  }
  elseif($_GET['page'] == "tambah_menu")
  {
    $title = "Tambah Menu | Admin";
  }
  elseif($_GET['page'] == "akun")
  {
    $title = "Manajemen Akun | Admin";
  }
  elseif($_GET['page'] == "laporan_harian")
  {
    $title = "Laporan Harian | Admin";
  }
  elseif($_GET['page'] == "laporan_kumulatif_harian")
  {
    $title = "Laporan Kumulatif Harian | Admin";
  }
  elseif($_GET['page'] == "profile")
  {
    $title = "Profile | Admin";
  }
?>