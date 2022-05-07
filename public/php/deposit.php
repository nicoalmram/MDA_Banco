<html>
<head><title>Deposit simulator</title>
    <link rel="stylesheet" type="text/css" href="../css/deposit.css" />
</head>
<body>
<?php
include 'admin_profile_header.php' ;?>
<div class="cust_credit_container">
    <form method="post">
        <input class="customer" type="text" name="customer_email" placeholder="Correo cliente" required><br>
        <input class="customer" type="text" name="credit_amount" placeholder="Cantidad" required><br>
        <input class="customer" type="submit" name="credit_btn" value="Hacer deposito" >
    </form><br>
</div>
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
            //Datos para la transaccion (no implementado)
            $customer_fullname = $row['fullname'];
            $customer_id = $row['idnum'];
            $customer_email = $row['email'];
            $customer_phone= $row['phone'];
            $customer_add = $row['address'];
            $customer_balance = $row['balance'] + $credit_amount;

            $sql1 = "Update users SET balance = '$customer_balance' WHERE fullname = '$customer_fullname'";

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