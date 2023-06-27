<?php
  require 'koneksi.php';

  $id_transaksi = rand();
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $jumlah = $_POST['jumlah'];
  $total = $harga * $jumlah;

  $insert = mysqli_query($connect, "INSERT INTO transaksi VALUES('$id_transaksi', '$nama','$jumlah','$harga','$total')");
?>