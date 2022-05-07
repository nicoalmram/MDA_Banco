<html>
<head><title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_profile.css" />
</head>
<body>

<?php include'admin_profile_header.php'; ?>
<form method="post">
    <div class="admin_options">
        <input type="submit" name="viewdet" value="Ver cliente"/>
        <input type="submit" name="add_staff" value="Añadir personal"/>
        <input type="submit" name="edit_cust" value="Modificar cuenta"/>
        <input type="submit" name="del_cust" value="Eliminar cuenta"/>
        <input type="submit" name="add_balance" value="DEPÓSITO"/>
    </div>
</form>

</body>
</html>


<?php

if(isset($_POST['viewdet'])){
    header('location:client_list.php');
}

if(isset($_POST['add_staff'])){
    echo '<script>alert("Sin implementar")</script>';

}

if(isset($_POST['edit_cust'])){
    echo '<script>alert("Sin implementar")</script>';
}

if(isset($_POST['del_cust'])){
    echo '<script>alert("Sin implementar")</script>';
}

if(isset($_POST['add_balance'])){
    header('location:deposit.php');
}

?>
