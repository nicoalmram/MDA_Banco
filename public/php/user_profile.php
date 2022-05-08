<?php

include 'user_profile_header.php';
?>

<html>
<head><title>Mi perfil</title>
    <link rel="stylesheet" type="text/css" href="../css/user_profile.css" />
</head>
<body>


<?php
    include 'db_connect.php';

    $id=$_SESSION['idnum'];
    $sql="SELECT * FROM users where idnum= '$id' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $phone = $row['phone'];
    $balance = $row['balance'];


?>

<div class="cust_profile_container">
    <div class="acc_details">
        <span class="heading">Detalles de la cuenta</span><br>
        <label>Núm de Identificación : <?php echo $_SESSION['idnum']; ?></label>
        <label>Nombre completo : <?php echo $_SESSION['fullname']; ?></label>
        <label>Correo : <?php echo $_SESSION['email']; ?></label>
        <label>Núm Telefono : <?php echo $phone; ?></label>
        <label>Saldo disponible : <?php echo $balance ; ?>€</label>
    </div>

    <div class="statement">
        <label class="heading">Movimientos de la cuenta</label>
        <table>
            <th width="5%">#ID</th>
            <th width="15%">Fecha</th>
            <th width="31%">Descripción</th>
            <th width="10%">Recibido.</th>
            <th width="10%">Enviado.</th>
            <th width="20%">Total</th>
            <?php

            $cust_id = $_SESSION['idnum'];

            $sql = "SELECT * from transactions ORDER By id DESC LIMIT 10";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $Sl_no = 1;
                // output data of each row
                while($row = $result->fetch_assoc()) {

                    echo '
            <tr>
                <td>'.$Sl_no++.'</td>
                <td>'.$row['fecha'].'</td>
                <td>'.$row['descrip'].'</td>
                <td>'.$row['recibido'].'</td>
                <td>'.$row['enviado'].'</td>
                <td>€'.$row['total'].'</td>
            </tr>';
                }


            }

            ?>
        </table>
    </div>
</div>

</body>
</html>
