<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Transferencia</title>
    <link rel="stylesheet" href="../css/transferencias.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/footer.css">
  </head>
  <div class="nav"></div>
  <body>
    <?php
      include 'user_profile_header.php';
      include 'db_connect.php';

      $conn = new mysqli('localhost','root','','mdabank');

      
      $sql="SELECT * FROM users";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $sql2="SELECT * FROM account";
      $result2 = $conn->query($sql2);
      $row2 = $result2->fetch_assoc();
      $name = $row['fullname'];
      $acc = $row['account'];
      $balance = $row2['balance'];

      //echo '<script> location="../../views/transferencias.html" </script>';
    ?>
    <div class="center">
      <h1>Transferencia</h1>
      <form class="form" id="form" method="get" action="confirmation.php">
        <table class="center-form">
          <tr>
            <td><h3>Nombre del titular</h3></td>
            <td ><input type=text name="user_name" id="user_name" value="<?php echo $name; ?>" size="50" readonly></td>
          </tr>
          <tr>
            <td><h3>Cuenta de origen</h3></td>
            <td ><input type=text name="user_account" id="user_account" value="<?php echo $acc; ?>" size="50" readonly></td>
          </tr>
          <tr>
            <td><h3>Nombre del beneficiario</h3></td>
            <td ><input type=text name="transf_name" id="transf_name" size="50"></td>
          </tr>
          <tr>
            <td><h3>Cuenta destino</h3></td>
            <td><input type=text name="transf_acc" id="transf_acc" size="50"></td>
          </tr>
          <tr>
            <td><h3>Cantidad a transferir</h3></td>
            <td ><input type=text name="transf_money" id="transf_money" size="50"></td>
          </tr>
          <tr>
            <td><h3>Saldo actual</h3></td>
            <td><input type=text name="balance" id="balance" value="<?php echo $balance; ?>" size="50" readonly></td>
          </tr>
          <tr>
            <td><h3>Contraseña</h3></td>
            <td><input type=password name="pass" id="pass" size="50"></td>
          </tr>
          <tr><th COLSPAN="2"><input type="button" class="button" value="VOLVER" onclick="history.back()"></tr>
          <tr><th COLSPAN="2"><input type="submit" class="button" name="cnfrm-submit" value="CONTINUAR"/></tr>
        </table>
      </form>
    </div>
  </body>
  <div class="footer"></div>
</html>