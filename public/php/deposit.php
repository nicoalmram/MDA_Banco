<html>
<head><title>Deposit simulator</title>
<link rel="stylesheet" type="text/css" href="../css/deposit.css" />
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" 
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" 
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function alerta(title, text, icon, confirmButtonText){
        Swal.fire({
            title,
            text,
            icon,
            confirmButtonText
        }).then(function (result) {
            if (true) {
                window.location = "deposit.php";
            }
        })
    }
</script>
<script>
    function success(title, text, icon, confirmButtonText){
        Swal.fire({
            title,
            text,
            icon,
            confirmButtonText
        }).then(function (result) {
            if (true) {
                window.location = "user_profile.php";
            }
        })
    }
</script>
</head>
<body>
<?php
include 'db_connect.php';
include 'admin_profile_header.php' ;
$sql = "SELECT * from users, account";
$res = $conn->query($sql);
$row = $res->fetch_assoc();

$sql3="SELECT fullname FROM users";
$res3 = $conn->query($sql3);
$row3 = $res3->fetch_assoc();
$name = $row3['fullname'];
$sql4="SELECT * FROM account";
$res4 = $conn->query($sql4);
$row4 = $res4->fetch_assoc();
?>
<div class="cust_credit_container">
    <form method="post">
        <input type=text name="user" id="user" placeholder="Nombre del usuario" size="50"><br>
        <input type=text name="acc" id="acc" placeholder="Cuenta a la que depositar" size="50"><br>
        <input type=text name="transf_acc" id="transf_acc" placeholder="Dinero a introducir" size="50"><br>
        <input class="customer" type="submit" name="credit_btn" value="Hacer deposito" >
    </form><br>
</div>
</body>
</html>

<?php
if(isset($_POST['credit_btn'])){

    $usr_name = $_POST['user'];
    $usr_acc = $_POST['acc'];
    $credit_amount = $_POST['transf_acc'];

    if(!is_numeric($_POST['transf_acc'])){

        echo '<script type="text/javascript">'
                        , 'alerta("¡Error!", "Cantidad introducida no válida", "error", "Volver");'
                        , '</script>';
    }

    else{
        include 'db_connect.php';

        //Datos del cliente necesarios para simular el deposito
        $sql = "SELECT * FROM users WHERE fullname = '$usr_name'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $name = $row['fullname'];
            $sql2="SELECT balance FROM account where name= '$usr_acc' ";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            //Datos para la transaccion (no implementado)
            $customer_fullname = $row['fullname'];
            $customer_id = $row['idnum'];
            $customer_email = $row['email'];
            $customer_phone= $row['phone'];
            $customer_add = $row['address'];
            $customer_balance = $row2['balance'] + $credit_amount;

            $sql1 = "Update account SET balance = '$customer_balance' WHERE name = '$usr_acc'";

            if($conn->query($sql1) == TRUE){
                $conn->commit();

                echo '<script type="text/javascript">'
                        , 'alerta("¡Éxito!", "Importe abonado con éxito", "success", "OK");'
                        , '</script>';

            }else{

                echo '<script>alert("Operación fallida\n\nMotivo:\n\n'.$conn->error.'")</script>';
                $conn->rollback();

            }
        }else{
            echo '<script type="text/javascript">'
                        , 'alerta("¡Error!", "Nombre de usuario no válido", "error", "Volver");'
                        , '</script>';
        }
    }
}

?>