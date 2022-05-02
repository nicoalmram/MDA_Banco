<?php
$fullName = $_POST['Name'];
$dni = $_POST['IDnum'];
$email = $_POST['Email'];
$phone = $_POST['Phone'];
$address = $_POST['Address'];
$zipcode = $_POST['Zipcode'];
$pwd = $_POST['Pass'];

// Database connection
$conn = new mysqli('localhost','root','','mdabank');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Fallo en la conexión : ". $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into users(fullname, idnum, email, phone, address, zipcode, pwd) values(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisis", $fullName, $dni, $email, $phone, $address, $zipcode, $pwd);
    $execval = $stmt->execute();
    echo $execval;
    echo '<script>alert("Se ha registrado con éxito")
			location="../../views/index.html"
			</script>';
    $stmt->close();
    $conn->close();
}
?>
