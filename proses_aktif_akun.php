<?php
    session_start();
    require_once('koneksi.php');

    if(isset($_POST['aktifkan']))
    {
        $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
        $status_akun = "Aktif";

        $active = mysqli_query($koneksi, "UPDATE user SET status_akun='$status_akun' WHERE username='$username'");

        if($active)
        {
            $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                Berhasil Aktifkan Akun
            </div>';
            header('location: Admin/?page=akun');
        }
    }
?>