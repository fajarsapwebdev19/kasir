<?php
  session_start();
  require_once('koneksi.php');

  if(isset($_POST['register']))
  {
    $nama = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama']));
    $jk = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['jk']));
    $no_telp = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['no_telp']));
    $email = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['email']));
    $alamat = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['alamat']));
    $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
    $password = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password']));
    $level = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['level']));
    $status_akun = "Tidak Aktif";

    $register = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");

    $cek = mysqli_num_rows($register);

    if($cek == 1)
    {
      $_SESSION['validasi'] = '<div class="alert alert-danger bg-danger text-white text-left">
        Username Sudah Pernah Di Daftarkan
      </div>';
      header('location: ./?page=register');
    }else{
      $regis = mysqli_query($koneksi, "INSERT INTO user VALUES(NULL,'$nama','$jk','$no_telp','$email','$alamat','$username','$password','$level','$status_akun')");

      if($regis)
      {
        $_SESSION['validasi'] = '<div class="alert alert-success bg-success text-white text-left">
          Akun Berhasil Di Daftarkan Mohon Tunggu Sampai Akun Anda Di Setujui Oleh Admin
        </div>';
      header('location: ./?page=register');
      }
    }
  }
?>