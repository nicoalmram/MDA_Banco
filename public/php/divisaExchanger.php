<!DOCTYPE html>
  <html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Calculadora de divisas</title>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/divisaCalculator.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $(function () {
            $('.nav').load("header.php");
            $('.footer').load("./footer.php");
        });
    </script>
      
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <div class="nav"></div>
  <body>
    <div id="customheader">
      <div id="left"><img src="../images/logo.png" alt="logo" class="divisa-img logo"></div>
      <div id="center"><h1>Calculadora de Divisas</h1></div>
      <div id="right"><img src="../images/ukraine.png" alt="donation" class="divisa-img donation"></div>
  </div>
    <div class="container">
      <div class="divisaDetails">
        <div class="input-box">
          <input type="text" id="amount" placeholder="Cantidad a cambiar" value="">
        </div>
        <div>
          <label>Divisa:</label>
          <select id="selectedCoin" class="select-box">
              <option value="EUR" selected>EUR</option>
              <option value="USD">USD</option>
              <option value="GBP">GBP</option>
              <option value="BTC">BTC</option>
          </select>
        </div>
        <div>
          <label>Convertir a:</label>
          <select id="desiredCoin" class="select-box">
              <option value="USD" selected>USD</option>
              <option value="EUR">EUR</option>
              <option value="GBP">GBP</option>
              <option value="BTC">BTC</option>
          </select>
        </div>
        <button class="button" onclick="calculateResult(); getapi();">Calcular Resultado</button><br>
        
        <input type="any" step="any" readonly id="showResult" placeholder="Dinero convertido">
      </div>
    </div>
    <script src="../js/divisaExchanger.js"></script>
  </body>
  <div class="footer"></div>
</html>
