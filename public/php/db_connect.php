<?php

$conn = mysqli_connect('localhost','root','','mdabank');

if(!$conn){
    die("No se ha podido establecer la conexión con la BD --> ".mysqli_connect_error());
}

?>
