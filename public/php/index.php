<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Inicio Banco</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $(function () {
            $('.nav').load("./header.php");
            $('.footer').load("./footer.php");
        });
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <div class="nav"></div>
  <body>
    <div id="body-container">
      <!-- Slideshow container -->
      <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
          <img class="carrousel" src="../images/oferta-01.jpg">
          <div class="text">MDABanco ha revolucionado la oferta de cuentas con 
            regalo con una nueva promoción disponible en toda España. 
            Ahora, si abres una Cuenta en la entidad y domicilias 
            una nómina o pensión de 1.200 euros o más, te llevas 300 euros 
            netos de regalo.</div>
        </div>

        <div class="mySlides fade">
          <img class="carrousel" src="../images/oferta-02.jpg">
          <div class="text">Una cuenta de ahorro es una forma de depositar 
            el dinero en el banco y obtener una rentabilidad, traducida 
            en un porcentaje TAE (Tasa Anual Equivalente) durante el periodo en el que permanezca en el banco.</div>
        </div>

        <div class="mySlides fade">
          <img class="carrousel" src="../images/familia.jpg">
          <div class="text">Extiende los beneficios de ser cliente Select a las personas más importantes para ti. 
            Accede a condiciones especiales de financiación para 
            los estudios de tu hijo, vehículos o vivienda.</div>
        </div>
      </div>
      <br>

      <!-- The dots/circles -->
      <div id="buttons" style="text-align:center">
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>


      <section class="texto" id="articulos">
          <div class="imagen_Texto_izquierda">
            <img src="../images/wallet.jpg">
            <h4>Ahorra más que nunca</h4>
            <p>Con nuestro banco sentirás control total de tus gastos y ahorros. Mantén un seguimiento de todos tus movimientos
              en cada una de tus cuentas.
            </p>
          </div>

          <div class="imagen_Texto_derecha">
            <img src="../images/businessman.jpg">
            <h4>Trato profesional y eficaz</h4>
            <p>Disponemos de los mejores profesionales para resolver cualquier duda o problema que tenga. 
              No dude en ponerse en contacto con nosotros.</p>
          </div>

          <div class="banner">
            <img src="../images/banco.jpg">
          </div>

      </section>
    </div>
  </body>
  <div class="footer"></div>
  <script src="../js/index.js"></script>

</html>