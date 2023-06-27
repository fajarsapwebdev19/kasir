<?php
  session_start();
  require_once('koneksi.php');

  if(isset($_POST['tambah']))
  {
    $kode_barang = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['kode_barang']));
    $nama_barang = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama_barang']));
    $foto_barang = $_FILES['foto_barang']['name'];
    $tmp_foto_barang = $_FILES['foto_barang']['tmp_name'];
    $size_foto_barang = $_FILES['foto_barang']['size'];
    $ek = array('jpg','jpeg','png');
    $eksten = pathinfo($foto_barang, PATHINFO_EXTENSION);
    $jenis = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['jenis']));
    $harga = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['harga']));

    if(empty($_FILES['foto_barang']['name']))
    {
      $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
        Foto Barang Kosong
      </div>';
      header('location: Admin/?page=tambah_menu');
    }else{
      if(in_array($eksten, $ek) === true)
      {
        if($size_foto_barang <= 3000000)
        {
          $dir = "assets/app/img/barang/".$foto_barang;
          move_uploaded_file($tmp_foto_barang, $dir);

          $tambah = mysqli_query($koneksi, "INSERT INTO barang VALUES ('$kode_barang','$nama_barang','$foto_barang','$jenis','$harga')");

          if($tambah)
          {
            $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
              Berhasil Tambah Menu
            </div>';
            header('location: Admin/?page=tambah_menu');
          }

        }else{
          $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
            Ukuran File Maximal 3MB
          </div>';
          header('location: Admin/?page=tambah_menu');
        }
      }else{
          $_SESSION['val'] = '<div class="alert alert-warning bg-warning text-white">
            Ekstensi Hanya Mendukung Jpg,Jpeg,Png
          </div>';
          header('location: Admin/?page=tambah_menu');
      }
    }
  }
?>