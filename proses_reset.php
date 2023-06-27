<?php
  session_start();
  require_once('koneksi.php');

  if(isset($_POST['reset']))
  {
    $email = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['email']));

    if(empty($email))
    {
      $_SESSION['validasi'] = '<div class="alert alert-danger bg-danger text-white text-left">
        Email Tidak Boleh Kosong
      </div>';
      header('location: ./?page=forgot_password');
    }else{
      $tb_user = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");

      $cek_mail = mysqli_num_rows($tb_user);

      $data = mysqli_fetch_assoc($tb_user);

      if($cek_mail <= 0)
      {
        $_SESSION['validasi'] = '<div class="alert alert-danger bg-danger text-white text-left">
          Email Anda Tidak Di Temukan Di Database
        </div>';
        header('location: ./?page=forgot_password');
      }
      else{
        if($data['status_akun'] == "Tidak Aktif")
        {
            $_SESSION['validasi'] = '<div class="alert alert-danger bg-danger text-white text-left">
              Akun Anda Belum Aktif
            </div>';
            header('location: ./?page=forgot_password');
        }else{
          $token = bin2hex(random_bytes(50));

          $_SESSION['token'] = $token;

          echo $token;
        }
      }
    }
  }
?>