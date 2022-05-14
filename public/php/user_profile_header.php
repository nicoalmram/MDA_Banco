<?php
session_start();
?>

<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/user_profile_header.css" />
    <style>
    #home, #logout{
        background-color:rgba(5, 21, 71,0.9);
        border:none;
        padding:5px;
        width:70px;
        color:white;
        cursor:pointer;
        box-shadow:2px 2px 6px rgba(5, 21, 71,0.9);
        transition-duration: 0.6s;
    }

    #home:hover, #logout:hover{
        padding:10px;
    }
	</style>
	</head>

<body id="customer_profile">
    
    <?php
		include 'db_connect.php';

		$customer_id=$_SESSION['idnum'];
		$sql="SELECT * FROM users WHERE idnum='$customer_id'";
		$result=$conn->query($sql);
		if($result->num_rows > 0)
		$row = $result->fetch_assoc();

	?>
        <div class="head">

            <div class="customer_details"
               <a> <?php echo '<img class="custmr_img" src="../imges/No_image.jpg"'; ?> onerror="this.src='../images/No_image.jpg'"  height="115px" width="105px"/'> </a>
            </div>

             <div class="welcome">

             <label>Bienvenido <?php echo $_SESSION['fullname']; ?></label>
             <a href="./index.php" class="logo-container">
              <img src="../images/bankLogo.png" alt="logo" class="logo-nav"></a>
             <div class="dropdown">
            <button class="dropbtn" onclick="myFunction();equis(this)">
              <div class="nav-container">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
              </div>
            </button>  
            <div class="dropdown-content" id="myDropdown">
              <div class="header">
                <h2>Banco MDA</h2>
              </div>
              <div class="row">
                <div class="column">
                    <lu class="column-header">
                      <div class="img-container">
                          <img class="img" src="../images/clock.png" alt="bankLogo">
                        </div>
                        <h3 style="display:inline-block; white-space:nowrap;">Mi día a día</h3>
                    </lu>
                  <a href="retiro.html">Retirar dinero</a>
                  <a href="./user_isLoged.php">Mi perfil</a>
                  <a href="pretransferencias.html">Realizar una transferencia</a>
                </div>
                <div class="column">
                    <lu class="column-header">
                        <div class="img-container">
                            <img class="img" src="../images/bankLogo.png" alt="bankLogo">
                          </div>
                          <h3 style="display:inline-block; white-space:nowrap;">Conoce tu banco</h3>
                      </lu>
                  <a href="./divisaExchanger.php">Calculadora de divisas</a>
                  <a href="#">Más sobre nosotros</a>
                  <a href="terminosycondiciones.html">Términos y condiciones</a>
                </div>
              </div>
            </div>
          </div>
            </div>
            <a class="cust_home" href="user_profile.php"><input type="button" name="home" value="Inicio" id="home"></a>
            <a class="cust_logout" href="user_logout.php"><input type="button" name="logout_btn" value="Cerrar" id="logout"></a>
        </div>
        <div class="profile_nav">
        <ul>
            <a href="user_detail.php"><li class="link1">Mi cuenta</li></a>
            <a href=""><li class="link2">Mi perfil</li></a>
            <a href="user_pass.php"><li class="link3">Cambiar contraseña</li></a>
            <a href="pretransferencias.php"><li class="link4">Hacer transferencia</li></a>
            <a href="historial.php"><li class="link5">Historial completo</li></a>
            </ul>
        </div>
          <script src="../js/nav.js"></script>
    </body>
    
</html>