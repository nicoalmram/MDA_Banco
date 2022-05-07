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
<div class="head">

    <div class="customer_details"
    <a> <?php echo '<img class="custmr_img" src="../imges/No_image.jpg"'; ?> onerror="this.src='../images/No_image.jpg'"  height="115px" width="105px"/'> </a>
</div>

<div class="welcome">

    <label>Panel de control <strong>administrador</strong></label></div>
<a class="cust_home" href="admin_profile.php"><input type="button" name="home" value="Inicio" id="home"></a>
<a class="cust_logout" href="user_logout.php"><input type="button" name="logout_btn" value="Cerrar" id="logout"></a>

</div>


</body>
</html>