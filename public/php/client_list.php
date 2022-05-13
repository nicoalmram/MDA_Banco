<html>
<head><title>Active Customers</title>
</head>
<link rel="stylesheet" type="text/css" href="../css/client_list.css"/>
<body>

<?php

include 'admin_profile_header.php' ;
include 'db_connect.php';


?>
<div class="client_container">

    <table border="1px" cellpadding="10">
        <th>#</th>
        <th>Nombre completo</th>
        <th>Nombre de la cuenta</th>
        <th>DNI</th>
        <th>Correo</th>
        <th>Num. contacto</th>
        <th>Dirección</th>
        <th>Codigo postal</th>
        <th>Contraseña</th>
        <th>Saldo</th>

        <?php

        $sql = "SELECT st.*,sr.* from users st, account sr WHERE st.fullname=sr.users_name";
        $result = $conn->query($sql);

        //if ($result->num_rows > 0) {
            $Sl_no = 1;
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {

                ?>
                <tr>
                <td><?php echo $Sl_no++?></td>
                <td><?php echo $row['fullname']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['idnum']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['phone']?></td>
                <td><?php echo $row['address']?></td>
                <td><?php echo $row['zipcode']?></td>
                <td><?php echo $row['pwd']?></td>
                <td><?php echo $row['balance']?> €</td>
                </tr>';
            <?php
            }

        //}

        ?>

    </table>
</div>
</body>
</html>




