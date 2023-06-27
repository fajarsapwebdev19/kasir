<?php
  require 'koneksi.php';

  if(isset($_POST['add'])){

   
    if(isset($_POST['nama'])){
      echo $_POST['add'];
      $nama = $_POST['nama'];
      
      $tr = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE nama='$nama'");
      $data = mysqli_fetch_assoc($tr);

      //ambil data lama dari database
      $nama = $data['nama'];
      $harga = $data['harga_satuan'];
      $jumlah_lama = $data['jumlah'];
      $total_lama = $data['total'];

      $jumlah_baru = $jumlah_lama + 1;
      $total_baru = $harga * $jumlah_baru;

      $add = mysqli_query($koneksi, "UPDATE transaksi SET jumlah='$jumlah_baru', total='$total_baru' WHERE nama='$nama'");

      if($add){
        header('location: Kasir/?page=Transaksi');
      }
    }
  }
  elseif(isset($_POST['minus'])){
    if(isset($_POST['nama'])){
      
      $nama = $_POST['nama'];

      $tr = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE nama='$nama'");
      $data = mysqli_fetch_assoc($tr);

      //ambil data lama dari database
      $harga = $data['harga_satuan'];
      $jumlah_lama = $data['jumlah'];
      $total_lama = $data['total'];

      $jumlah_baru = $jumlah_lama - 1;
      $total_baru = $total_lama - $harga;

      $minus = mysqli_query($koneksi, "UPDATE transaksi SET jumlah='$jumlah_baru', total='$total_baru' WHERE nama='$nama'");

      if($data['jumlah'] <= 1)
      {
        $minus .= mysqli_query($koneksi, "DELETE FROM transaksi WHERE nama='$nama'");
      }

      

      if($minus){
        header('location: Kasir/?page=Transaksi');
      }
    }
  }
?>