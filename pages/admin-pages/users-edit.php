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
require_once '../../config/DB_connect.php';

// User bijwerken
  if(isset($_POST['update-user'])) {
    $fullname_update = $_POST['fullname'];
    $nickname_update = $_POST['nickname'];
    if(isset($_POST['password'])){
    $password_update = hash('sha256', $_POST['password']);
    $query = mysqli_query($conn, "UPDATE user SET naam = '$fullname_update', gebruikersnaam = '$nickname_update', wachtwoord = '$password_update' WHERE ID = '{$_GET["user"]}'");
      } else {
    $query = mysqli_query($conn, "UPDATE user SET naam = '$fullname_update', gebruikersnaam = '$nickname_update' WHERE ID = '{$_GET["user"]}'");
      }
    if($query){
        echo "<script>window.location.href = 'users.php?error=opgeslagen';</script>";
        exit();
    } else {
      echo "<script>window.location.href = 'users.php?error=nietOpgeslagen';</script>";
      exit();
    }
}

// User-address bijwerken
  if(isset($_POST['update-user-address'])) {
    $street_update = $_POST['street'];
    $houseNumber_update = $_POST['houseNumber'];
    $addition_update = $_POST['addition'];
    $postcode_update = $_POST['postcode'];
    $city_update = $_POST['city'];
    $country_update = $_POST['country'];

    $query = mysqli_query($conn, "UPDATE address SET straat = '$street_update', huisnummer = '$houseNumber_update', toevoeging = '$addition_update', postcode = '$postcode_update', stad = '$city_update', land = '$country_update' WHERE user_ID = '{$_GET["user"]}'");
    if($query){
        echo "<script>window.location.href = 'users.php?error=addressOpgeslagen';</script>";
        exit();
    } else {
      echo "<script>window.location.href = 'users.php?error=nietOpgeslagen';</script>";
      exit();
    }
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
        <a href="#"><i class="fas fa-user-plus" id="userIcon"></i></a>
        <a href="#"><i class="fas fa-sign-out-alt"></i></a>
    </div>

    <!-- Users Dashboard -->
    <?php
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
                       <a href='users-edit.php?user=" . $row['ID'] . "'><img src='../../assets/images/icons/user-edit.svg' /></a>
                        <a onclick='userLock();'><img src='../../assets/images/icons/user-lock.svg' /></a>
                        <a onclick='userRemove();'><img src='../../assets/images/icons/user-remove.svg' /></a>
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
        <form id="personalForm" method="POST">
          <div class="form-group">
            <label for="fullName">Naam</label>
            <input type="text" id="fullName" name="fullName" placeholder="Gebruikers volledige naam" required>
          </div>
          <div class="form-group">
            <label for="nickname">Roepnaam</label>
            <input type="text" id="nickname" name="nickname" placeholder="Gebruikers roepnaam" required>
          </div>
          <div class="form-group">
            <label for="password">Wachtwoord</label>
            <input type="password" id="password" name="password" placeholder="Gebruikers nieuw wachtwoord">
          </div>
          <div class="buttons">
            <button type="submit" name="update-user">Opslaan</button>
          </div>
        </form>

        <!-- Adres info -->
        <form id="addressForm" method="POST">
          <div class="address-grid">
            <div class="form-group">
              <label for="street">Straat</label>
              <input type="text" id="street" name="street" placeholder="Straat" required>
            </div>
            <div class="form-group">
              <label for="houseNumber">Huisnummer</label>
              <input type="text" id="houseNumber" name="houseNumber" placeholder="Huisnummer" required>
            </div>
            <div class="form-group">
              <label for="addition">Toevoeging</label>
              <input type="text" id="addition" name="addition" placeholder="Toevoeging">
            </div>
            <div class="form-group">
              <label for="postcode">Postcode</label>
              <input type="text" id="postcode" name="postcode" placeholder="Postcode" required>
            </div>
            <div class="form-group">
              <label for="city">Stad</label>
              <input type="text" id="city" name="city" placeholder="Stad" required>
            </div>
            <div class="form-group">
              <label for="country">Land</label>
              <input type="text" id="country" name="country" placeholder="Land" required>
            </div>
          </div>
          <div class="buttons">
            <button type="submit" name="update-user-address">Opslaan</button>
          </div>
        </form>
      </div>
    </div>
</body>
<script src="../../assets/JS/Script.js"></script>
</html>