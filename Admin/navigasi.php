<?php
  if(empty($_GET['page']))
  {
    require 'home_nav.php';
  }
  elseif($_GET['page'] == "tambah_menu")
  {
    require 'tambah_menu_nav.php';
  }
  elseif($_GET['page'] == "akun")
  {
    require 'akun_nav.php';
  }
  elseif($_GET['page'] == "app_reg")
  {
    require 'app_reg_nav.php';
  }
  elseif($_GET['page'] == "laporan_harian")
  {
    require 'laporan_harian_nav.php';
  }
  elseif($_GET['page'] == "laporan_kumulatif_harian")
  {
    require 'laporan_kumulatif_harian_nav.php';
  }
  elseif($_GET['page'] == "profile")
  {
    require 'profile_nav.php';
  }
?>