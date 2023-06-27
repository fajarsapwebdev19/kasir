<?php
  require 'koneksi.php';

  if(isset($_POST['bayar']))
  {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $keterangan = $_POST['keterangan'];
    $jumlah_data = $_POST['jumlah_data'];
    $hitung = count($jumlah_data);
    $kode_invoice = "TKVSG-".date('dmY').rand(0,999);

    $total_bayar = $_POST['totbay'];
    $uang = $_POST['uang'];

    //tambah data riwayat transaksi
    $add = mysqli_query($koneksi, "INSERT INTO transaksi_pembayaran VALUES ('$kode_invoice','$nama_pelanggan','$keterangan','$total_bayar','$uang')");

      for($x=0; $x<$hitung; $x++)
      {
        $id_transaksi = $_POST['id_transaksi'];
        $nama = $_POST['nama'];
        $harga_satuan = $_POST['harga_satuan'];
        $jumlah = $_POST['jumlah'];
        $total = $_POST['total'];
        
        $tanggal_pembelian = date('Y-m-d');

        //tambah data untuk laporan
        $add .= mysqli_query($koneksi, "INSERT INTO laporan_transaksi VALUES('$id_transaksi[$x]','$nama[$x]','$harga_satuan[$x]','$jumlah[$x]','$total[$x]','$kode_invoice','$tanggal_pembelian')");

        $add .= mysqli_query($koneksi, "TRUNCATE transaksi");
      }

      if($add)
      {
        header('location: Kasir/?page=Transaksi_Success&kode_invoice='."$kode_invoice");
      }
}

      
?>