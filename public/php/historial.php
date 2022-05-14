<?php

include 'user_profile_header.php';
?>

<html>
<head><title>Historial</title>
    <link rel="stylesheet" type="text/css" href="../css/historial.css" />
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

    <div class="statement">
        <label class="heading">Movimientos de la cuenta</label>
        <table>
            <th width="5%">#ID</th>
            <th width="15%">Fecha</th>
            <th width="31%">Descripción</th>
            <th width="10%">Emisor</th>
            <th width="10%">Cuenta emisor</th>
            <th width="10%">Receptor</th>
            <th width="10%">Cuenta receptor</th>
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
                <td>'.$row['date'].'</td>
                <td>'.$row['concept'].'</td>
                <td>'.$row['emisor'].'</td>
                <td>'.$row['usuario_emisor'].'</td>
                <td>'.$row['receptor'].'</td>
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
