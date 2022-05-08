<html>

<head>
    <link rel="stylesheet" type="text/css" href="../css/nav.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<nav>
    <div class="navbar">
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
                        <a href="perfil.html">Cuenta</a>
                        <a href="pretransferencias.html">Realizar una transferencia</a>
                    </div>
                    <div class="column">
                        <lu class="column-header">
                            <div class="img-container">
                                <img class="img" src="../images/bankLogo.png" alt="bankLogo">
                            </div>
                            <h3 style="display:inline-block; white-space:nowrap;">Conoce tu banco</h3>
                        </lu>
                        <a href="divisaCalculator.html">Calculadora de divisas</a>
                        <a href="#">Más sobre nosotros</a>
                        <a href="terminosycondiciones.html">Términos y condiciones</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="login-container" id="logged-in">
            <!--Obtener el usuario desde la base de datos y mostrarlo aquí ¿PHP?-->
            <form class="actualUser" >
                <label>Sesión iniciada como: </label>
                <label></label>
            </form>
            <a href="" class="register-button"><i class="fa fa-fw fa-user"></i>OK</a>
        </div>
        <a href="" class="logo-container">
            <img src="../images/bankLogo.png" alt="logo" class="logo-nav"></a>
    </div>
</nav>
<script src="../js/nav.js"></script>
</html>
