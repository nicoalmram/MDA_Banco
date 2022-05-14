<?php
include 'db_connect.php';
$selected = $_POST["selected"];
$sql="SELECT * FROM users where ID= '$selected' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$balance = $row2['fullname'];
?>

<?php
include 'db_connect.php';
$selected2 = $_POST["selected"];
$sql2="SELECT * FROM account where ID= '$selected2' ";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();

$balance = $row2['balance'];
?>