<html>
<head><title>Deposit simulator</title>
    <link rel="stylesheet" type="text/css" href="../css/deposit.css" />
</head>
<body>
<?php
include 'admin_profile_header.php' ;
$sql = "SELECT st.*,sr.* from users st, account sr WHERE st.fullname=sr.users_name";
$res = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<div class="cust_credit_container">
    <form method="post">
        <select id="cliente">

            <?php while($row = mysqli_fetch_array($res)):;?>
            <?php $cuenta = $row['name'];
            $id_cuenta = $row['ID'];
            ?>

            <?php echo "<option id='$id_cuenta'> $cuenta</option>";?>

            <?php endwhile;?>

        </select><br>
        <select id="cuenta">

            <?php while($row = mysqli_fetch_array($res)):;?>
            <?php $cuenta = $row['name'];
            $id_cuenta = $row['ID'];
            ?>

            <?php echo "<option id='$id_cuenta'> $cuenta</option>";?>

            <?php endwhile;?>

        </select><br>
        <input class="customer" type="submit" name="credit_btn" value="Hacer deposito" >
    </form><br>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../js/accounts.js"></script>
</body>
</html>

<?php
if(isset($_POST['credit_btn'])){

    $cust_mail = $_POST['customer_email'];
    $credit_amount = $_POST['credit_amount'];

    if(!is_numeric($_POST['credit_amount'])){

        echo '<script>alert("Cantidad no válida")</script>';
    }

    else{
        include 'db_connect.php';

        //Datos del cliente necesarios para simular el deposito
        $sql = "SELECT * FROM users WHERE email = '$cust_mail'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $name = $row['fullname'];
            $sql2="SELECT balance FROM account where users_name= '$name' ";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            //Datos para la transaccion (no implementado)
            $customer_fullname = $row['fullname'];
            $customer_id = $row['idnum'];
            $customer_email = $row['email'];
            $customer_phone= $row['phone'];
            $customer_add = $row['address'];
            $customer_balance = $row2['balance'] + $credit_amount;

            $sql1 = "Update account SET balance = '$customer_balance' WHERE users_name = '$customer_fullname'";

            if($conn->query($sql1) == TRUE){
                $conn->commit();

                echo '<script>alert("Importe abonado con éxito en la cuenta del cliente")</script>';

            }else{

                echo '<script>alert("Operación fallida\n\nMotivo:\n\n'.$conn->error.'")</script>';
                $conn->rollback();

            }
        }else{
            echo '<script>alert("Correo electrónico incorrecto")</script>';
        }

    }



}

?>