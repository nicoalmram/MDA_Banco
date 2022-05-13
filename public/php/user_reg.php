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
    window.location = "../../views/index.html";
  }
})
}
</script>
<?php
$fullName = $_POST['Name'];
$dni = $_POST['IDnum'];
$email = $_POST['Email'];
$phone = $_POST['Phone'];
$address = $_POST['Address'];
$zipcode = $_POST['Zipcode'];
$pwd = $_POST['Pass'];
$account = $_POST['account'];
$IBAN = 'ES92 1234 1234 1234 1234';
$balance = '100';

// Database connection
$conn = new mysqli('localhost','root','','mdabank');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Fallo en la conexión : ". $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into users(fullname, idnum, email, phone, address, zipcode, pwd, account) values(?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisiss", $fullName, $dni, $email, $phone, $address, $zipcode, $pwd, $account);
    $acc=$conn->prepare("insert into account(users_name, IBAN, name, balance) values(?, ?, ?, ?)");
    $acc->bind_param("sssd", $fullName, $IBAN, $account, $balance);
    $execval = $stmt->execute();
    $acc->execute();
    echo $execval;
    echo '<script type="text/javascript">'
   , 'alerta("¡Éxito!", "Registro completado", "success", "OK", "Volverás a la página principal");'
   , '</script>';
    $stmt->close();
    $acc->close();
    $conn->close();
}
?>
