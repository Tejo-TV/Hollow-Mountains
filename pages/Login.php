<?php 
//---------------------------------------------------------------------------------------------------//
// Naam script		  : login.php
// Omschrijving		  : Op deze pagina kan je inloggen
// Naam ontwikkelaar: Tejo Veldman
// Project		      : Hollow Mountains
// Datum		        : Schooljaar 3 - periode 1 - 2025
//---------------------------------------------------------------------------------------------------//
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Apothecare - Login</title>
    <link rel="stylesheet" href="../assets/CSS/style.css" />
    <link rel="shortcut icon" type="x-icon" href="../assets/images/logo/Apothecare-minilogo-nobg.png">
    <!-- Dit is voor de font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
  </head>
  <body class="login-page">
<!-- account aangemaakt popup -->
 <?php
 
 if(isset($_GET["error"])) {
  if ($_GET["error"] == "none"){
    echo "<div class='popup'>
          <p> ✅ Account succesvol aangemaakt! Log nu in. </p>
          </div>";
  } else if ($_GET["error"] == "wrongWay") {
    echo "<div class='popup2'>
          <p> 🕵️‍♂️ Je probeert een geheime plek te bezoeken... maar je hebt geen toegang. </p>
          </div>";
  } else if ($_GET["error"] == "wrongLogin") {
    echo "<div class='popup2'>
          <p> 🚫 Verkeerde email of wachtwoord probeer opnieuw </p>
          </div>";
  } else if ($_GET["error"] == "uitgelogd") {
    echo "<div class='popup'>
          <p> ✅ Succesvol uitgelogd!</p>
          </div>";
  }
}

 ?>

<!-- main body -->
    <div class="container1">
      <div class="login-box">
        <div id="imglogo">
          <a href="../index.php"><img src="../assets/images/logo/apothecare-nobg.png" alt="logopng"></a>
        </div>

        <form action="components/login.inc.php" method="POST">
          <label for="email">E-mail</label>
          <input type="email" name="email" placeholder="Voer uw e-mail in" required />

          <div class="passwd-wrap">
            <label for="password">Wachtwoord</label>
            <input type="password" id="password" name="ww" placeholder="Voer uw wachtwoord in" required>
            <button type="button" id="show-password">
              <img id="eye" src="../assets/images/icons/eye-show.svg" />
            </button>
          </div>

          <p class="forgot">Forgot password?</p>

          <button type="submit" name="login" class="login-button">Login</button>
        </form>
        <p class="signup">
          Heb je geen account?
          <a href="register.php"><span class="free">Registreer nu gratis</span>!</a>
        </p>
      </div>
    </div>
    <script src="../assets/js/main.js"></script>
  </body>
</html>
