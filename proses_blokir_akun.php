<?php
    session_start();
    require_once('koneksi.php');

    if(isset($_POST['blokir']))
    {
        $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
        $status_akun = "Tidak Aktif";

        $blokir = mysqli_query($koneksi, "UPDATE user SET status_akun='$status_akun' WHERE username='$username'");

        if($blokir)
        {
            $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                Berhasil Blokir Akun
            </div>';
            header('location: Admin/?page=akun');
        }
    }
?>