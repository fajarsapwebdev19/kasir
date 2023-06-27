<?php
    session_start();
    require_once('koneksi.php');

    $username = $_SESSION['username'];
    $tb_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    $data_user = mysqli_fetch_assoc($tb_user);

    if(isset($_POST['ubah']))
    {
        if(isset($_POST['username']))
        {
            $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
            $nama = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama']));
            $jk = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['jk']));
            $no_telp = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['no_telp']));
            $email = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['email']));
            $alamat = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['alamat']));

            $update = mysqli_query($koneksi, "UPDATE user SET nama='$nama',jk='$jk',no_telp='$no_telp',email='$email',alamat='$alamat' WHERE username='$username'");

            if($update)
            {
                $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                    Berhasil Ubah Profile Anda
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
    }
?>