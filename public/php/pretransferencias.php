<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style>
        #customer_profile .link4{

            background-color: rgba(5, 21, 71,0.4);

        }
    </style>
    <title>Transferencia</title>
    <link rel="stylesheet" href="../css/transferencias.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  </head>
  <body>
    <?php
      include 'user_profile_header.php';
      include 'db_connect.php';

      $conn = new mysqli('localhost','root','','mdabank');

      
      $id=$_SESSION['idnum'];
      $sql="SELECT * FROM users where idnum= '$id' ";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $name = $row['fullname'];
      $sql2="SELECT * FROM account where users_name= '$name' ";
      $result2 = $conn->query($sql2);
      $row2 = $result2->fetch_assoc();
      $acc = $row['account'];
      $balance = $row2['balance'];

      $res = $conn->query($sql2);

      //echo '<script> location="../../views/transferencias.html" </script>';
    ?>
    <div class="center">
      <h1>Transferencia</h1>
      <form class="form" method="POST" action="confirmation.php">
        <table class="center-form">
          <tr>
            <td><h3>Nombre del titular</h3></td>
            <td ><input type=text name="user_name" id="user_name" value="<?php echo $_SESSION['fullname']; ?>" size="50" readonly></td>
          </tr>
          <tr>
            <td><h3>Cuenta de origen</h3></td>
            <td ><input type=text name="transf_acc" id="transf_acc" placeholder="Nombre de cuenta" size="50"></td>
          </tr>
          <tr>
            <td><h3>Nombre del beneficiario</h3></td>
            <td ><input type=text name="transf_name" id="transf_name" placeholder="Nombre Apellido1 Apellido2" size="50"></td>
          </tr>
          <tr>
            <td><h3>Cuenta destino</h3></td>
            <td><input type=text name="transf_acc2" id="transf_acc2" placeholder="Cuenta destino" size="50"></td>
          </tr>
          <tr>
            <td><h3>Cantidad a transferir</h3></td>
            <td ><input type=text name="transf_money" id="transf_money" placeholder="Cantidad a transferir" size="50"></td>
          </tr>
          <tr>
            <td><h3>Fecha</h3></td>
            <td ><input type=date name="date" id="date" placeholder="DD/MM/AAAA" size="50"></td>
          </tr>
          <tr>
            <td><h3>Concepto</h3></td>
            <td ><input type=text name="concept" id="concept" placeholder="Concepto" size="50"></td>
          </tr>
          <tr>
            <td><h3>Contraseña</h3></td>
            <td><input type=password name="pass" id="pass" size="50"></td>
          </tr>
          <tr><th COLSPAN="2"><input type="submit" class="button" name="cnfrm-submit" value="CONTINUAR"/></tr>
        </table>
      </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/transfer.js"></script>
  </body>
</html>