<?php 
//---------------------------------------------------------------------------------------------------//
// Naam script		    : account-admin.php
// Omschrijving		    : Dit is de admin homepagina.
// Naam ontwikkelaar  : Tejo Veldman
// Project		        : Hollow Mountains
// Datum		          : Schooljaar 3 - periode 1 - 2025
//---------------------------------------------------------------------------------------------------//
session_start();
// checken of persoon is ingelogd
if ($_SESSION["userRole"] == "admin"){
  echo "<script>console.log('Juiste rol');</script>";
} else {
  echo "<script>window.location.href = '../login.php?error=wrongWay';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hollow Mountains - Admin</title>
    <link rel="stylesheet" href="../../assets/CSS/style.css" />
    <link rel="shortcut icon" type="x-icon" href="../../assets/images/Hollow-Mountains.png">
    <!-- Font Awesome voor icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <?php
    // error popups
    if(isset($_GET["error"])) {
      if ($_GET["error"] == "none"){
        echo "<div class='popup'>
              <p> ✅ Succesvol ingelogd! </p>
              </div>";
      }
    }
    ?>

<!-- Logout overlay -->
  <div id="signoutOverlay" class="signout-overlay">
    <div class="signout">
      <h2>Wil je echt uitloggen?</h2>
      <div class="buttons">
        <button  onclick="window.location.href='../Components/logout.inc.php'">Uitloggen</button>
        <button onclick="closeSignOutOverlay()">Annuleren</button>
      </div>
    </div>
  </div>

<div class="sidebar">
    <div class="logo">
        <img src="../../assets/images/Hollow-Mountains.png" alt="Logo">
    </div>
    <a href="account-admin.php"><i class="fas fa-home"></i></a>
    <a href="#"><i class="fas fa-bell"></i></i></a>
    <a href="#"><i class="fas fa-cog"></i></a>
    <a onclick="signOutOverlay()"><i class="fas fa-sign-out-alt"></i></a>
</div>

    <div class="profileHome-admin">
        <a href="users.php" class="admin-card">
          <i class="fas fa-users"></i>
          <h3>Gebruikersbeheer</h3>
          <p>Bekijken / Editen / Toevoegen</p>
        </a>

        <a href="attracties-admin.php" class="admin-card">
          <i class="fas fa-landmark"></i>
          <h3>Attracties beheren</h3>
          <p>Bekijken / Editen / Toevoegen</p>
        </a>

        <a href="onderhoud-admin.php" class="admin-card">
          <i class="fas fa-tools"></i>
          <h3>Onderhoud</h3>
          <p>Onderhoudsschema instellen</p>
        </a>

        <a href="#" class="admin-card">
          <i class="fas fa-ban"></i>
          <h3>In ontwikkeling</h3>
          <p>(Niet beschikbaar)</p>
        </a>

        <a href="#" class="admin-card">
          <i class="fas fa-ban"></i>
          <h3>In ontwikkeling</h3>
          <p>(Niet beschikbaar)</p>
        </a>

        <a href="#" class="admin-card">
          <i class="fas fa-ban"></i>
          <h3>In ontwikkeling</h3>
          <p>(Niet beschikbaar)</p>
        </a>
    </div>

</body>
<script src="../../assets/JS/Script.js"></script>
</html>