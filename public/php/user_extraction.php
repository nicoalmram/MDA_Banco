<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style>
        #customer_profile .link4{

            background-color: rgba(5, 21, 71,0.4);

        }
    </style>
    <title>Sacar Dinero</title>
    <link rel="stylesheet" href="../css/transferencias.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/deposit.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
    crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
    crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function alerta(title, text, icon, confirmButtonText){
        Swal.fire({
            title,
            text,
            icon,
            confirmButtonText
        }).then(function (result) {
            if (true) {
                window.location = "user_extraction.php";
            }
        })
    }
</script>
<script>
    function makeid(title, text, icon, confirmButtonText) {
        text += " ";
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < 15; i++ ) {
            text += characters.charAt(Math.floor(Math.random() * 
            charactersLength));
        }
        alerta(title, text, icon, confirmButtonText);
    }
</script>
<script>
    function success(title, text, icon, confirmButtonText){
        Swal.fire({
            title,
            text,
            icon,
            confirmButtonText
        }).then(function (result) {
            if (true) {
                window.location = "user_profile.php";
            }
        })
    }
</script>
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
      $query = $conn->query("SELECT account FROM users where idnum= '$id'");
      $res = $conn->query($sql2);
    ?>
    <div class="center">
      <h1>Extraer dinero</h1>
      <form class="form" method="POST">
        <table class="center-form">
          <tr>
            <td><h3>Nombre del titular</h3></td>
            <td ><input type=text name="user_name" id="user_name" value="<?php echo $_SESSION['fullname']; ?>" size="50" readonly></td>
          </tr>
          <tr>
            <td><h3>Cuenta de origen</h3></td>
            <td ><select name="transf_acc" id="transf_acc">
                <?php
                    while($row = $query->fetch_row()){
                        $account = $row[0];
                ?>
                <option value= "<?php echo $account ?>" ><?php echo  $account ?></option>
                <?php
                    }
                    ?>
            </td>
          </tr>
          <tr>
            <td><h3>Cantidad a retirar</h3></td>
            <td ><input type=text name="transf_money" id="transf_money" placeholder="Cantidad a transferir" size="50"></td>
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
<?php
    if(isset($_POST['cnfrm-submit'])){
        $usr_name = $_POST['user_name'];
        $usr_acc = $_POST['transf_acc'];
        $credit_amount = $_POST['transf_money'];
        if(!is_numeric($_POST['transf_money'])){

            echo '<script type="text/javascript">'
                            , 'alerta("¡Error!", "Cantidad introducida no válida", "error", "Volver");'
                            , '</script>';
        }else{
            include 'db_connect.php';

            //Datos del cliente necesarios para simular el deposito
            $sql = "SELECT * FROM users WHERE fullname = '$usr_name'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $name = $row['fullname'];
                $sql2="SELECT balance FROM account where name= '$usr_acc' ";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();
                $customer_balance = $row2['balance'] - $credit_amount;

                

                if($_POST['transf_money'] > $customer_balance){
                    echo '<script type="text/javascript">'
                    , 'alerta("¡Error!", "Saldo en la cuenta inferior a la cantidad a extraer", "error", "Volver");'
                    , '</script>';
                }else if($_POST['transf_money'] <= 0){
                    echo '<script type="text/javascript">'
                    , 'alerta("¡Error!", "Cantidad a extraer no válida", "error", "Volver");'
                    , '</script>';
                }
                else{
                    $sql1 = "Update account SET balance = '$customer_balance' WHERE name = '$usr_acc'";
                    if($conn->query($sql1) == TRUE){
                        $conn->commit();
                        echo '<script type="text/javascript">'
                                , 'makeid("¡Éxito!", "Extracción realizada con éxito, por favor guarde el siguiente código y utilicelo en uno de nuestros ATM: ", "success", "OK");'
                                , '</script>';
                    }else{
                        echo '<script>alert("Operación fallida\n\nMotivo:\n\n'.$conn->error.'")</script>';
                        $conn->rollback();
    
                    }
                }
            }
        }
    }
?>