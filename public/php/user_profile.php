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
    $name = $row['fullname'];
    $sql2="SELECT * FROM account where users_name= '$name' ";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();

    $phone = $row['phone'];
    $balance = $row2['balance'];
    $res = $conn->query($sql2);

?>

<div class="cust_profile_container">
    <div class="acc_details">
        <span class="heading">Detalles de la cuenta</span><br>
        <select id="target">

            <?php while($row2 = mysqli_fetch_array($res)):;?>
            <?php $cuenta = $row2['name'];
            $id_cuenta = $row2['ID'];
            ?>

            <?php echo "<option id='$id_cuenta'> $cuenta</option>";?>

            <?php endwhile;?>

        </select>
        <label>Núm de Identificación : <?php echo $_SESSION['idnum']; ?></label>
        <label>Nombre completo : <?php echo $_SESSION['fullname']; ?></label>
        <label>Correo : <?php echo $_SESSION['email']; ?></label>
        <label>Núm Telefono : <?php echo $phone; ?></label>
        <label id="balance">Saldo disponible : <?php echo $balance; ?> €</label>
    </div>

    <div class="statement">
        <label class="heading">Movimientos de la cuenta</label>
        <table>
            <th width="5%">#ID</th>
            <th width="31%">Descripción</th>
            <th width="10%">Emisor</th>
            <th width="10%">Receptor</th>
            <th width="20%">Total</th>
            <?php

            $cust_id = $_SESSION['idnum'];
            $ses_name = $_SESSION['fullname'];

            $sql = "SELECT * from transactions WHERE usuario_emisor = '$ses_name' ORDER By id DESC LIMIT 10";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $Sl_no = 1;
                // output data of each row
                while($row = $result->fetch_assoc()) {

                    echo '
            <tr>
                <td>'.$Sl_no++.'</td>
                <td>'.$row['concept'].'</td>
                <td>'.$row['usuario_emisor'].'</td>
                <td>'.$row['usuario_receptor'].'</td>
                <td>€'.$row['amount'].'</td>
            </tr>';
                }


            }

            ?>
        </table>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../js/accounts.js"></script>
<script>


    function myFunction(){
        var address = $('#name').find(':selected').data('add');
        var contact = $('#name').find(':selected').data('con');
        $('#add').val(address);
        $('#con').val(contact);
    }
</script>

</body>
</html>
