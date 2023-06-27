<?php
  require '../koneksi.php';

    $id_transaksi = rand();
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jumlah = 1;
    $total = $harga * $jumlah;

    $tr = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE nama='$nama'");

    $cek = mysqli_num_rows($tr);

    if($cek == 1)
    {
      $data = mysqli_fetch_assoc($tr);
      
      $nama = $data['nama'];
      $harga = $data['harga_satuan'];
      $jumlah_lama = $data['jumlah'];
      $total_lama = $data['total'];

      

      $jumlah_baru = $jumlah_lama + 1;
      $total_baru = $harga * $jumlah_baru;

      mysqli_query($koneksi, "UPDATE transaksi SET jumlah='$jumlah_baru', total='$total_baru' WHERE nama='$nama'");
    }else
    {
        mysqli_query($koneksi, "INSERT INTO transaksi VALUES('$id_transaksi', '$nama','$jumlah','$harga','$total')");
    }

    header('location: ./?page=Transaksi');

    
?>