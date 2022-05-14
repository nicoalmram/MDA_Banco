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
        function alerta(title, text, icon, confirmButtonText, footer){
            Swal.fire({
                title,
                text,
                icon,
                confirmButtonText,
                footer
            }).then(function (result) {
                if (true) {
                    window.location = "./index.php";
                }
            })
        }
    </script>
<?php
ob_start();
session_start();
include 'db_connect.php';
    if($_SESSION['user_login'] == true){
        header('location:user_profile.php');
    }else{
        echo '<script type="text/javascript">'
        , 'alerta("¡Error!", "Debe iniciar sesión previamente",
        "error", "OK", "Volverás a la página principal");'
        , '</script>';
    }
?>