<?php 
//---------------------------------------------------------------------------------------------------//
// Naam script		  : login.php
// Omschrijving		  : Op deze pagina kan je inloggen
// Naam ontwikkelaar : Tejo Veldman
// Project		      : Hollow Mountains
// Datum		        : Schooljaar 3 - periode 1 - 2025
//---------------------------------------------------------------------------------------------------//
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hollow Mountains - Login</title>
    <link rel="stylesheet" href="../assets/CSS/style.css" />
    <link rel="shortcut icon" type="x-icon" href="../assets/images/Hollow-Mountains.png">
  </head>
  <body>

    <?php
    // error popups
    if(isset($_GET["error"])) {
      if ($_GET["error"] == "wrongWay") {
        echo "<div class='popup2'>
              <p> 🕵️‍♂️ Je probeert een geheime plek te bezoeken... maar je hebt geen toegang. </p>
              </div>";
        
      } else if ($_GET["error"] == "wrongLogin") {
        echo "<div class='popup2'>
              <p> 🚫 Verkeerde e-mail of wachtwoord. Probeer opnieuw. </p>
              </div>";
      } else if ($_GET["error"] == "uitgelogd") {
        echo "<div class='popup'>
              <p> ✅ Succesvol uitgelogd!</p>
              </div>";
      } else if ($_GET["error"] == "stmtfailed") {
        echo "<div class='popup2'>
              <p> 🚫 ERROR UNKNOWN. Probeer opnieuw. </p>
              </div>";
      }
    }
    ?>

    <!-- main body -->
    <div class="container1">
      <div class="login-box">
        <div id="imglogo">
          <a href="../index.php"><img src="../assets/images/Hollow-Mountains.png" alt="Hollow Mountains logo"></a>
        </div>

        <form action="components/login.inc.php" method="POST">
          <label for="email">E-mail</label>
          <input type="text" name="email" id="email" placeholder="Voer uw e-mail in" required>

          <label for="password">Wachtwoord</label>
          <input type="password" id="password" name="ww" placeholder="Voer uw wachtwoord in" required>

          <button type="submit" name="login" class="login-button">Login</button>
        </form>

        <p class="signup">
          Heb je geen account? Vraag er een aan bij uw manager!
        </p>
      </div>
    </div>
  </body>
</html>
