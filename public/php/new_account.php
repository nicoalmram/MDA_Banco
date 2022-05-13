<html>
<head><title>Crear cuenta</title>
    <link rel="stylesheet" type="text/css" href="../css/new_account.css"/>
    <style>
        #customer_profile .link2{

            background-color: rgba(5, 21, 71,0.4);

        }
    </style>
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
    window.location = "user_profile.php";
  }
})
}
</script>

</head>
<body>
<?php

include 'user_profile_header.php';

?>

<div class="cust_passchng_container">
    <form method="post">
        <br><br><input type="text" id="name" name="name" placeholder="Nombre de la cuenta" required><br>
        <input type="submit" name="create_acc" value="Aceptar"><br><br>
    </form>

</div>

</body>
</html>

<?php
$IBAN = 'ES92 1234 1234 1234 1234';
$balance = '100';

if(isset($_POST['create_acc'])){

    $acc_name= $_POST['name'];
    include 'db_connect.php';
    $customer_id=$_SESSION['idnum'];

    $sql = "SELECT * FROM users WHERE idnum='$customer_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $fullName = $row['fullname'];

    if(!$result=$conn->query($sql)){

        echo "Error:1 " . $sql . "<br>" . $conn->error;
    }

    $acc=$conn->prepare("insert into account(users_name, IBAN, name, balance) values(?, ?, ?, ?)");
    $acc->bind_param("sssd", $fullName, $IBAN, $acc_name, $balance);
    $acc->execute();

    $new_acc = $row['account'];
    
    $sql1 = "INSERT INTO users (account) values(?)";
    $stmt = $conn->prepare($sql1);
    $stmt->bind_param("s", $acc_name);

    $conn->commit();
    $stmt->execute();

    echo '<script type="text/javascript">'
    , 'alerta("¡Éxito!", "Cuenta creada", "success", "OK", "Volverás a la página de inicio");'
    , '</script>';

    $acc->close();
}

?>