<?php
  session_start();
  require_once('../koneksi.php');

  if(empty($_SESSION['username']))
  {
    $_SESSION['validasi'] = '<div class="alert alert-danger bg-danger text-white text-left">
      Anda Belum Melakukan Login !
    </div>';
    header('location: .././');
  }

  $username = $_SESSION['username'];

  $tb_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");

  $data_user = mysqli_fetch_assoc($tb_user);

  if($data_user['status_akun'] == "Tidak Aktif")
  {
    $_SESSION['validasi'] = '<div class="alert alert-danger bg-danger text-white text-left">
      Maaf Akun Anda Belum Aktif
    </div>';
    header('location: .././');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php require 'title.php'; echo $title;?></title>
  <link rel="stylesheet" href="../assets/app/componens/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/app/componens/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../assets/app/componens/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/app/componens/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/app/componens/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Logo -->
  <link rel="shortcut icon" href="../assets/app/img/pokdarwis.png" type="image/x-icon">
  <style>
    .batas{
      margin-top: 170px;
    }

    .drop-garis{
      border: none;
    }

    .link-over:hover{
      text-decoration: none;
      color: darkcyan;
    }

    .timbul:hover{
      transform: scale(1.02);
      box-shadow: 2px 2px 2px rgba(0,0,0,0.4);
      cursor:pointer;
    }

    .btn-oke{
      border: none;
      background: #fff;
    }
  </style>
</head>
<body>
  <?php require_once('navigasi.php'); ?>
  <div class="container-fluid">
    <?php require_once('page.php'); ?>
  </div>
  <script src="../assets/app/componens/js/jquery-3.4.1.min.js"></script>
  <script src="../assets/app/componens/js/bootstrap.min.js"></script>
  <script src="../assets/app/componens/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/app/componens/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/app/componens/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
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

    $('.datatable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $(".date").datepicker({
        format: 'dd-mm-yyyy',
        autoHighlight: true,
        autoClose: true
    });
  </script>
</body>
</html>