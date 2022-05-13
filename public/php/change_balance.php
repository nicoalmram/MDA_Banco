<?php
include 'db_connect.php';
$selected = $_POST["selected"];
$sql2="SELECT * FROM account where ID= '$selected' ";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();

$balance = $row2['balance'];
echo "Saldo disponible : $balance €";
?>