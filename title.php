<?php
    if(empty($_GET['page']))
    {
        $title = "Login | App Kasir";
    }
    elseif($_GET['page'] == "register")
    {
        $title = "Registrasi | App Kasir";
    }
    elseif($_GET['page'] == "forgot_password")
    {
        $title = "Reset Password | App Kasir";
    }
?>