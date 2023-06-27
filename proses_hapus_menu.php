<?php
  session_start();
  require_once('koneksi.php');
  
  if(isset($_POST['delete']))
  {
    $kode_barang = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['kode_barang']));

    $hapus = mysqli_query($koneksi, "DELETE FROM barang WHERE kode_barang='$kode_barang'");

    if($hapus)
    {
      $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
        Berhasil Hapus Data
      </div>';
      header('location: Admin/?page=tambah_menu');
    }
  }
?>