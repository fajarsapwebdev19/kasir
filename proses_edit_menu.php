<?php
  session_start();
  require_once('koneksi.php');

  if(isset($_POST['edit']))
  {
   if(isset($_POST['kode_barang_lama']))
   {
    $kode_barang_lama = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['kode_barang_lama']));
    $kode_barang = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['kode_barang']));
    $nama_barang = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama_barang']));
    $foto_barang = $_FILES['foto_barang']['name'];
    $tmp_foto_barang = $_FILES['foto_barang']['tmp_name'];
    $size_foto_barang = $_FILES['foto_barang']['size'];
    $eksten = array('jpg','jpeg','png');
    $ek = pathinfo($foto_barang, PATHINFO_EXTENSION);
    $jenis = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['jenis']));
    $harga = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['harga']));

    if(empty($_FILES['foto_barang']['name']))
    {
      $edit = mysqli_query($koneksi, "UPDATE barang SET kode_barang='$kode_barang', nama_barang='$nama_barang', jenis='$jenis', harga='$harga' WHERE kode_barang='$kode_barang_lama'");
    }else{
      if(in_array($ek, $eksten) === true)
      {
        if($size <= 3000000)
        {
          //ambil data lama
          $ft_br = mysqli_query($koneksi, "SELECT foto_barang FROM barang WHERE kode_barang='$kode_barang_lama'");
          $data = mysqli_fetch_assoc($ft_br);

          if(file_exists('assets/app/img/barang/'.$data['foto_barang']))
          {
            unlink('assets/app/img/barang/'.$data['foto_barang']);
          }
          
          $dir = 'assets/app/img/barang/'.$foto_barang;
          move_uploaded_file($tmp_foto_barang, $dir);

          $edit = mysqli_query($koneksi, "UPDATE barang SET kode_barang='$kode_barang', nama_barang='$nama_barang', foto_barang='$foto_barang', jenis='$jenis', harga='$harga' WHERE kode_barang='$kode_barang_lama'");
        }else{
            $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
              Ukuran File Melebihi Dari 3MB
            </div>';
            header('location: Admin/?page=tambah_menu');
        }
      }else{
            $_SESSION['val'] = '<div class="alert alert-warning bg-warning text-white">
             Ekstensi Hanya Mendukung jpg,jpeg,dan png
            </div>';
            header('location: Admin/?page=tambah_menu');
      }
    }

    if($edit)
    {
      $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
        Berhasil Edit Menu
      </div>';
      header('location: Admin/?page=tambah_menu');
    }
   }
  }
?>