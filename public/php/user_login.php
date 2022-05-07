<?php
ob_start();
session_start();
include 'db_connect.php';

if(isset($_POST['login-btn'])){
    if(isset($_POST['idnum']) && isset($_POST['psw'])){
        $password = $_POST['psw'];
        $user = $_POST['idnum'];
    }

    if($_POST['idnum'] == 'admin' && $_POST['psw'] == 'admin'){
        header('location:admin_profile.php');
    }

    $sql="SELECT * FROM users where idnum='$user' and pwd='$password'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if($row <= 0){
        echo '<script>alert("Identificación/contraseña incorrecta.")
                location="../../views/index.html"
                </script>';


    }else{

        $_SESSION['user_login'] = true;
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['idnum'] = $row['idnum'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['zipcode'] = $row['zipcode'];
        $_SESSION['balance'] = $row['balance'];

        header('location:user_profile.php');
    }

}
?>
