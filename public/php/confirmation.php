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
    function transf(title, html, icon, confirmButtonText, footer){
        Swal.fire({
            title,
            html,
            icon,
            confirmButtonText,
            footer
        }).then(function (result) {
            if (true) {
                window.location = "user_profile.php";
            }
        })
    }
</script>

<script>
    function alerta(title, text, icon, confirmButtonText){
        Swal.fire({
            title,
            text,
            icon,
            confirmButtonText
        }).then(function (result) {
            if (true) {
                window.location = "pretransferencias.php";
            }
        })
    }
</script>
<?php

include 'user_profile_header.php';
include 'db_connect.php';

$conn = new mysqli('localhost','root','','mdabank');


$sql="SELECT * FROM users";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sql2="SELECT * FROM account";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
$name = $row['fullname'];
$balance = $row2['balance'];
$pass = $_SESSION['pwd'];

$acc = $_POST['transf_acc'];
$acc2 = $_POST['transf_acc2'];
$mny = $_POST['transf_money'];
$usr2 = $_POST['transf_name'];
$usr = $_POST['user_name'];
$date = $_POST['date'];
$concept = $_POST['concept'];
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['cnfrm-submit'])){
        if(isset($_POST['pass'])){
            if($_POST['pass'] == $pass){

                    $transf = $_POST['transf_money'];

                    if(!is_numeric($_POST['transf_money'])){

                        echo '<script type="text/javascript">'
                        , 'alerta("¡Error!", "Cantidad introducida no válida", "error", "Volver");'
                        , '</script>';
                    }

                    else{
                        include 'db_connect.php';

                        //Datos del cliente necesarios para simular el deposito
                            $sql2="SELECT * FROM account where name = '$acc'";
                            $result2 = $conn->query($sql2);
                            $row2 = $result2->fetch_assoc();
                            //Datos para la transaccion (no implementado)
                            $customer_balance = $row2['balance'] - $transf;

                            $sql1 = "UPDATE account SET balance = '$customer_balance' WHERE name = '$acc'";

                            if($conn->query($sql1) == TRUE){
                                $hist=$conn->prepare("insert into transactions(amount, emisor, usuario_emisor, receptor, usuario_receptor, date, concept) values(?, ?, ?, ?, ?, ?, ?)");
                                $hist->bind_param("dssssss", $mny, $acc, $usr, $acc2, $usr2, $date, $concept);

                                $conn->commit();                                
                                $hist->execute();

                                echo '<script type="text/javascript">'
                                , 'transf("¡Éxito!", "Transferencia realizada correctamente", "success", "OK");'
                                , '</script>';

                            }else{

                                echo '<script>alert("Operación fallida\n\nMotivo:\n\n'.$conn->error.'")</script>';
                                $conn->rollback();

                            }
                        
                    }
                
            } else {
                echo '<script type="text/javascript">'
                , 'alerta("¡Error!", "Contraseña no válida", "error", "Volver");'
                , '</script>';
            }
        } else {
            echo '<script type="text/javascript">'
            , 'alerta("¡Error!", "Contraseña no introducida", "error", "Volver");'
            , '</script>';
        }
    }
}

?>
