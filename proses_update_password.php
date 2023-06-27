<?php
    session_start();
    require_once('koneksi.php');

    $username = $_SESSION['username'];
    $tb_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    $data_user = mysqli_fetch_assoc($tb_user);

    if(isset($_POST['ubah']))
    {
        $password_lama = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password_lama']));
        $password_baru = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password_baru']));
        $konfirmasi_password_baru = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['konfirmasi_password_baru']));

        $tb_pass = mysqli_query($koneksi, "SELECT * FROM user WHERE password='$password_lama'");
        $cek_pass = mysqli_num_rows($tb_pass);

        if($cek_pass > 0)
        {
            if($password_baru == $konfirmasi_password_baru)
            {
                $update_pass = mysqli_query($koneksi, "UPDATE user SET password='$password_baru'");

                if($update_pass)
                {
                    $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                        Berhasil Update Password
                    </div>';

                    if($data_user['level'] == "Admin")
                    {
                        header('location: Admin/?page=profile');
                    }
                    elseif($data_user['level'] == "Kasir")
                    {
                        header('location: Kasir/?page=Profile');
                    }
                }
            }else{
                    $_SESSION['val'] = '<div class="alert alert-warning bg-warning text-white">
                        Konfirmasi Password Baru Anda Tidak Sama
                    </div>';

                    if($data_user['level'] == "Admin")
                    {
                        header('location: Admin/?page=profile');
                    }
                    elseif($data_user['level'] == "Kasir")
                    {
                        header('location: Kasir/?page=Profile');
                    }
            }
        }else{
            $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                Password Lama Tidak Sesuai
            </div>';

            if($data_user['level'] == "Admin")
            {
                header('location: Admin/?page=profile');
            }
            elseif($data_user['level'] == "Kasir")
            {
                header('location: Kasir/?page=Profile');
            }
        }
    }
?>