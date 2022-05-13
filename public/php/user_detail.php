<html>
<head><title>Mi cuenta</title>

    <link rel="stylesheet" type="text/css" href="../css/user_detail.css" />
    <style>
        #customer_profile .link1{
            background-color: rgba(5, 21, 71,0.4);
        }
    </style>
<body>
<?php include 'user_profile_header.php' ?>

<?php

$cust_id= $_SESSION['idnum'];
include 'db_connect.php';
$sql="SELECT * FROM users where idnum= '$cust_id' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$name = $row['fullname'];
$sql2="SELECT balance FROM account where users_name= '$name' ";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
$current_bal = $row2['balance'];

?>


<div class="cust_myacc_container">

    <br><br>
    <div class="accdet">
        <span class="heading">Detalle completo de la cuenta</span><br>
        <label>Nombre Completo : <?php echo $_SESSION['fullname']; ?></label>
        <label>Num. Identificación : <?php echo $_SESSION['idnum']; ?></label>

        <label>Num. Teléfono : <?php echo $_SESSION['phone']; ?></label>
        <label>Dirección : <?php echo $_SESSION['address']; ?></label>
        <label>Código : <?php echo $_SESSION['zipcode']; ?></label>

        <label>Saldo disponible :<?php echo $current_bal; ?>€</label>

        <label>Correo electrónico : <?php echo $_SESSION['email']; ?></label>
        <label>Contraseña actual : <?php echo $_SESSION['pwd']; ?></label><br><br><br><br>
        <a href="user_pass.php"><input type="button" name="pass-chng" value="Cambiar contraseña"></a>
    </div>


    <br>
</div>

</body>

</html>
