<?php
ob_start();
session_start();
include 'db_connect.php';
    if($_SESSION['user_login'] == true){
        header('location:user_profile.php');
    }else{
        echo '<script>alert("Debe iniciar sesión previamente.")
        location="./index.php"
        </script>';
    }
?>