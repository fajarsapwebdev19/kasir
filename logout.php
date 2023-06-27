<?php
  session_start();

  unset($_SESSION['username']);

  $_SESSION['validasi'] = '<div class="alert alert-success bg-success text-white text-left">
    Berhasil Logout
  </div>';
  header('location: ./');
?>