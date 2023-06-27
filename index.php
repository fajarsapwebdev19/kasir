<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php require_once('title.php'); echo $title; ?></title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/app/componens/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/app/componens/css/adminlte.min.css">
  <!-- Logo -->
  <link rel="shortcut icon" href="assets/app/img/pokdarwis.png" type="image/x-icon">
</head>
<body class="hold-transition login-page" style="border:none; background: #fff;">
<style>
  .batas-2{
    border: none;
  }
</style>
<div class="login-box" style="padding: 10px 0;">
  <!-- /.login-logo -->
  <div class="mt-2"></div>
  <div class="card" style="box-shadow:none;">
    <div class="card-body">
      <?php
        if(empty($_GET['page']))
        {
          ?>
            <div class="mt-2 text-center">
              <img class="mt-3 mb-4" src="assets/app/img/pokdarwis.png" width="130" alt="">
              <h6>APLIKASI KASIR CERDAS UKM WISATA KVSG</h6>

              <?php
                session_start();

                if(isset($_SESSION['validasi']) && $_SESSION['validasi'] !='')
                {
                  echo $_SESSION['validasi'];
                  unset($_SESSION['validasi']);
                }
              ?>
            </div>

            <form action="proses_login.php" class="mt-4 needs-validation" novalidate method="post" autocomplete="off">
              <div class="input-group mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 mt-2">
                  <button type="submit" name="login" class="btn btn-block btn-primary">
                    Login
                  </button>
                </div>
              </div>
            </form>
            <!-- /.social-auth-links -->

            <div class="mt-3 text-center">
              <div class="row justify-content-center">
                <div class="col-6">
                  <a href="?page=register">Buat Akun Baru</a>
                </div>
              </div>
            </div>
          <?php
        }elseif($_GET['page'] == "register")
        {
          ?>
            <div class="text-center">
              <h5>
                Registrasi Akun
              </h5>
              <h6>APLIKASI KASIR CERDAS UKM WISATA KVSG</h6>

              <?php
                session_start();

                if(isset($_SESSION['validasi']) && $_SESSION['validasi'] !='')
                {
                  echo $_SESSION['validasi'];
                  unset($_SESSION['validasi']);
                }
              ?>
            </div>

            <form action="proses_registrasi.php" class="mt-4 needs-validation" method="post" autocomplete="off" novalidate>
              <div class="form-group mb-3">
                <input type="text" name="nama" class="form-control" placeholder="Nama" required>
              </div>
              <div class="form-group mb-3">
                <select name="jk" class="form-control" required>
                  <option value="">
                    Pilih Jenis Kelamin
                  </option>
                  <option>Laki-Laki</option>
                  <option>Perempuan</option>
                </select>
              </div>
              <div class="form-group mb-3">
                <input type="text" name="no_telp" class="form-control" placeholder="Nomor Telpon" required>
              </div>
              <div class="form-group mb-3">
                <input type="text" name="email" class="form-control" placeholder="Email" required>
              </div>
              <div class="form-group mb-3">
                <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
              </div>
              <div class="form-group mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
              </div>
              <div class="form-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
              </div>
              <div class="form-group mb-3">
                <select name="level" class="form-control" required>
                  <option value="">
                    Sebagai Apa ?
                  </option>
                  <option>Admin</option>
                  <option>Kasir</option>
                </select>
              </div>
              <div class="row">
                <div class="col-md-12 mt-2">
                  <button type="submit" name="register" class="btn btn-block btn-primary">
                    Buat Akun
                  </button>
                </div>
              </div>
            </form>
            <!-- /.social-auth-links -->

            <div class="mt-3 text-center">
              <div class="text-center">
                <a href="./">Sudah Punya Akun ? Login</a>
              </div>
            </div>
          <?php
        }
      ?>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/app/componens/js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/app/componens/js/bootstrap.min.js"></script>
<!-- Validation Bootstrap 4 -->
<script>
  (function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
    }, false);
  })();
</script>
</body>
</html>
