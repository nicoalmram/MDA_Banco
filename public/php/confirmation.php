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
        function alerta(title, html, icon, confirmButtonText, footer){
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
$acc = $row['account'];
$balance = $row2['balance'];

    echo ".";
    echo '<script type="text/javascript">'
        , 'alerta("¡Éxito!", "Transferencia finalizada" + 
        "<table> <tr><td><h3>Nombre del titular</h3></td></tr> <tr><td><h3>Cuenta de origen</h3></td></tr> <tr><td><h3>Nombre del beneficiario</h3></td></tr> </table>",
        "success", "OK", "Volverás a la página principal");'
        , '</script>';

    ?>

<?php
if(isset($_POST['cnfrm-btn'])){
    if($_POST['pass'] == $_SESSION['pwd']){
        
    }
}
?>