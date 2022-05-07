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
        <th>DNI</th>
        <th>Correo</th>
        <th>Num. contacto</th>
        <th>Dirección</th>
        <th>Codigo postal</th>
        <th>Contraseña</th>
        <th>Saldo</th>

        <?php

        $sql = "SELECT * from users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $Sl_no = 1;
            // output data of each row
            while($row = $result->fetch_assoc()) {

                echo '
			<tr>
			<td>'.$Sl_no++.'</td>
			<td>'.$row['fullname'].'</td>
			<td>'.$row['idnum'].'</td>
			<td>'.$row['email'].'</td>
			<td>'.$row['phone'].'</td>
			<td>'.$row['address'].'</td>
			<td>'.$row['zipcode'].'</td>
			<td>'.$row['pwd'].'</td>
			<td>'.$row['balance'].'€</td>
			</tr>';
            }

        }

        ?>

    </table>
</div>
</body>
</html>




