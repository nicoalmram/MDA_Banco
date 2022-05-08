<html>
<head><title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="../css/user_pass.css"/>
    <style>
        #customer_profile .link3{

            background-color: rgba(5, 21, 71,0.4);

        }
    </style>

</head>
<body>
<?php

include 'user_profile_header.php';

?>

<div class="cust_passchng_container">
    <form method="post">
        <br><br><input type="password" name="oldpass" placeholder="Contraseña actual" required><br>
        <input type="password" name="cnfrm" placeholder="Confirma contraseña actual" required><br>
        <input type="password" name="newpass" placeholder="Nueva contraseña" required><br>
        <input type="submit" name="change_pass" value="Aplicar cambio"><br><br>
    </form>

</div>

</body>
</html>

<?php
if(isset($_POST['change_pass'])){

    $oldpass= $_POST['oldpass'];
    $cnfrm= $_POST['cnfrm'];
    $newpass= $_POST['newpass'];
    include 'db_connect.php';
    $customer_id=$_SESSION['idnum'];

    $sql="SELECT pwd from users WHERE idnum='$customer_id' ";
    if(!$result=$conn->query($sql)){

        echo "Error:1 " . $sql . "<br>" . $conn->error;
    }
    $row = $result->fetch_assoc();

    if($oldpass == $cnfrm){

        if($row['pwd'] == $oldpass ){

            $sql2="UPDATE users SET pwd='$newpass' WHERE idnum='$customer_id' ";
            $conn->query($sql2);
            if($result=$conn->query($sql2)== TRUE){

                echo '<script>alert("La contraseña ha sido cambiada con éxito!")</script>';

            }

        } else {
            if($row['pwd'] != $oldpass ){
                echo '<script>alert("Por favor, introduzca la contraseña actual correcta")</script>';

            }
        }
    }


    else

    {
        if($oldpass != $cnfrm){

            echo '<script>alert("Dos errores\n1. La contraseña actual y la contraseña de confirmación son diferentes.\n2. La contraseña actual no es correcta")</script>';

        } else {

            echo '<script>alert("La contraseña actual y la de confirmación son diferentes!")</script>';

        }

    }
}




?>