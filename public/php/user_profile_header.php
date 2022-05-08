<?php
session_start();
?>

<html>
    <head>
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

             <label>Bienvenido <?php echo $_SESSION['fullname']; ?></label></div>
            <a class="cust_home" href="user_profile.php"><input type="button" name="home" value="Inicio" id="home"></a>
            <a class="cust_logout" href="user_logout.php"><input type="button" name="logout_btn" value="Cerrar" id="logout"></a>

        </div>

        <div class="profile_nav">
        <ul>
            <a href="user_detail.php"><li class="link1">Mi cuenta</li></a>
            <a href=""><li class="link2">Mi perfil</li></a>
            <a href="user_pass.php"><li class="link3">Cambiar contraseña</li></a>
            <a href=""><li class="link4">Hacer transferencia</li></a>
            <a href=""><li class="link5">Historial completo</li></a>
            </ul>
        </div>

    </body>
</html>