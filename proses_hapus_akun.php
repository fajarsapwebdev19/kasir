<?php
    session_start();
    require_once('koneksi.php');

    if(isset($_POST['hapus']))
    {
        $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));

        $delete = mysqli_query($koneksi, "DELETE FROM user WHERE username='$username'");

        if($delete)
        {
            $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                Berhasil Hapus Akun
            </div>';
            header('location: Admin/?page=akun');
        }
    }
?>