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

      </div>
    </div>
</body>
</html>