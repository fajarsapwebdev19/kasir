<?php
  if(empty($_GET['page']))
  {
    require 'home_page.php';
  }
  elseif($_GET['page'] == "tambah_menu")
  {
    require 'tambah_menu_page.php';
  }
  elseif($_GET['page'] == "akun")
  {
    require 'akun_page.php';
  }
  elseif($_GET['page'] == "app_reg")
  {
    require 'app_reg_page.php';
  }
  elseif($_GET['page'] == "laporan_harian")
  {
    require 'laporan_harian_page.php';
  }
  elseif($_GET['page'] == "laporan_kumulatif_harian")
  {
    require 'laporan_kumulatif_harian_page.php';
  }
  elseif($_GET['page'] == "profile")
  {
    require 'profile_page.php';
  }
?>