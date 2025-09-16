<?php 
//---------------------------------------------------------------------------------------------------//
// Naam script		    : users.php
// Omschrijving		    : Dit is de admin pannel voor de users.
// Naam ontwikkelaar    : Tejo Veldman
// Project		        : Hollow Mountains
// Datum		        : Schooljaar 3 - periode 1 - 2025
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
    <title>Hollow Mountains - Users</title>
    <link rel="stylesheet" href="../../assets/CSS/style.css" />
    <link rel="shortcut icon" type="x-icon" href="../../assets/images/Hollow-Mountains.png">
    <!-- Font Awesome voor icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="../../assets/images/Hollow-Mountains.png" alt="Logo">
        </div>
        <a href="account-admin.php"><i class="fas fa-home"></i></a>
        <a href="#"><i class="fas fa-bell"></i></a>
        <a href="#"><i class="fas fa-sign-out-alt"></i></a>
    </div>

    <!-- Users Dashboard -->
    <?php
      require_once '../../config/DB_connect.php';
      $sql = "SELECT * FROM user";
      $result = $conn->query($sql);
    ?>

    <div class="admin-account-dashboard">

      <div class="account-card">
      <?php
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<div class='account-card-user'>
                      <p>". $row['naam'] . "</p> 
                      <div class='icons'>
                        <a onclick='userEdit(" . $row['ID'] . ")'><img src='../../assets/images/icons/user-edit.svg' /></a>
                        <a onclick='userLock(" . $row['ID'] . ")'><img src='../../assets/images/icons/user-lock.svg' /></a>
                        <a onclick='userRemove(" . $row['ID'] . ")'><img src='../../assets/images/icons/user-remove.svg' /></a>
                      </div>
                    </div>";
          }
        } else {
          echo "Geen gebruikers gevonden";
        }
        ?>
        </div>
        

      <div class="account-card">
        <h2>Gebruikers Instellingen</h2>
        <!-- Persoonlijke info -->
        <form id="personalForm">
          <div class="form-group">
            <label for="fullName">Naam</label>
            <input type="text" id="fullName" name="fullName" placeholder="Gebruikers volledige naam">
          </div>
          <div class="form-group">
            <label for="nickname">Roepnaam</label>
            <input type="text" id="nickname" name="nickname" placeholder="Gebruikers roepnaam">
          </div>
          <div class="form-group">
            <label for="password">Wachtwoord</label>
            <input type="password" id="password" name="password" placeholder="Gebruikers nieuw wachtwoord">
          </div>
          <div class="buttons">
            <button type="submit">Opslaan</button>
          </div>
        </form>

        <!-- Adres info -->
        <form id="addressForm">
          <div class="address-grid">
            <div class="form-group">
              <label for="street">Straat</label>
              <input type="text" id="street" name="street" placeholder="Straat">
            </div>
            <div class="form-group">
              <label for="houseNumber">Huisnummer</label>
              <input type="text" id="houseNumber" name="houseNumber" placeholder="Huisnummer">
            </div>
            <div class="form-group">
              <label for="addition">Toevoeging</label>
              <input type="text" id="addition" name="addition" placeholder="Toevoeging">
            </div>
            <div class="form-group">
              <label for="postcode">Postcode</label>
              <input type="text" id="postcode" name="postcode" placeholder="Postcode">
            </div>
            <div class="form-group">
              <label for="city">Stad</label>
              <input type="text" id="city" name="city" placeholder="Stad">
            </div>
            <div class="form-group">
              <label for="country">Land</label>
              <input type="text" id="country" name="country" placeholder="Land">
            </div>
          </div>
          <div class="buttons">
            <button type="submit">Opslaan</button>
          </div>
        </form>
      </div>
    </div>
</body>
</html>