<?php
  session_start();
  require_once('koneksi.php');

  if(isset($_POST['login']))
  {
    $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
    $password = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password']));

    $tb_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

    $cek = mysqli_num_rows($tb_user);

    if($cek > 0)
    {
      $data = mysqli_fetch_assoc($tb_user);
      $_SESSION['level'] = $data['level'];

      if($_SESSION['level'] == "Admin")
      {
        $_SESSION['username'] = $data['username'];
        header('location: Admin/');
      }
      elseif($_SESSION['level'] == "Kasir")
      {
        $_SESSION['username'] = $data['username'];
        header('location: Kasir/');
      }
    }else{
      $_SESSION['validasi'] = '<div class="alert alert-danger text-left bg-danger text-white">
        Username Atau Password Anda Salah !
      </div>';
      header('location: ./');
    }
  }
?>