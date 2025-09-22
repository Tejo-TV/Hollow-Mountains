<?php 
//---------------------------------------------------------------------------------------------------//
// Script Name         : users.php
// Description         : Admin panel for managing users.
// Developer           : Tejo Veldman
// Project             : Hollow Mountains
// Date                : School year 3 - period 1 - 2025
//---------------------------------------------------------------------------------------------------//

session_start();

// Check if user is logged in as admin
if ($_SESSION["userRole"] == "admin") {
    echo "<script>console.log('Correct role');</script>";
} else {
    echo "<script>window.location.href = '../login.php?error=wrongWay';</script>";
}

// Show error/success popups based on URL parameters
if (isset($_GET["error"])) {
    if ($_GET["error"] == "opgeslagen") {
        echo "<div class='popup'>
                <p> ✅ Data successfully saved! </p>
              </div>";
    } else if ($_GET["error"] == "nietOpgeslagen") {
        echo "<div class='popup2'>
                <p> ❌ Something went wrong while saving. Please try again. </p>
              </div>";
    } else if ($_GET["error"] == "addressOpgeslagen") {
        echo "<div class='popup'>
                <p> ✅ Address successfully saved! </p>
              </div>";
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
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Sidebar navigation -->
    <div class="sidebar">
        <div class="logo">
            <img src="../../assets/images/Hollow-Mountains.png" alt="Logo">
        </div>
        <a href="account-admin.php"><i class="fas fa-home"></i></a>
        <a href="#"><i class="fas fa-bell"></i></a>
        <a onclick="settingsOverlay()"><i class="fas fa-user-plus" id="userIcon"></i></a>
        <a href="#"><i class="fas fa-sign-out-alt"></i></a>
    </div>

<!-- Settings overlay -->
<div id="settingsOverlay" class="settings-overlay">
  <div class="settings">
    <h2>Nieuwe gebruiker aanmaken</h2>

    <button class="close-btn" onclick="closeSettingsOverlay()">×</button>

    <!-- Form for creating a new user -->
    <form id="newUserForm" method="POST">

      <!-- Personal info -->
      <div class="form-group">
        <label for="fullName">Naam</label>
        <input type="text" id="fullName" name="fullName" placeholder="Volledige naam">
      </div>

      <div class="form-group">
        <label for="email">E-mailadres</label>
        <input type="email" id="email" name="email" placeholder="E-mailadres">
      </div>

      <div class="form-group">
        <label for="role">Rol</label>
        <select id="role" name="role">
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <div class="form-group">
        <label for="nickname">Roepnaam</label>
        <input type="text" id="nickname" name="nickname" placeholder="Roepnaam">
      </div>

      <div class="form-group">
        <label for="password">Wachtwoord</label>
        <input type="password" id="password" name="password" placeholder="Wachtwoord">
      </div>

      <hr style="margin:20px 0; border-color:#555;" />

      <!-- Address info -->
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

      <!-- Save button -->
      <div class="buttons">
        <button type="submit" name="new-user">Nieuwe gebruiker opslaan</button>
      </div>
    </form>
  </div>
</div>


    <!-- Users Dashboard -->
    <?php
        require_once '../../config/DB_connect.php';

        // Get all users from database
        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);
    ?>

    <div class="admin-account-dashboard">
        <div class="account-card">
            <?php
            // Loop through all users and display them
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='account-card-user'>
                            <p>" . $row['naam'] . "</p> 
                            <div class='icons'>
                                <a href='users-edit.php?user=" . $row['ID'] . "'>
                                    <img src='../../assets/images/icons/user-edit.svg' alt='Edit user' />
                                </a>
                                <a onclick='userLock();'>
                                    <img src='../../assets/images/icons/user-lock.svg' alt='Lock user' />
                                </a>
                                <a onclick='userRemove();'>
                                    <img src='../../assets/images/icons/user-remove.svg' alt='Remove user' />
                                </a>
                            </div>
                          </div>";
                }
            } else {
                echo "No users found.";
            }
            ?>
        </div>
        
        <div class="account-card">
            <h2>User Settings</h2>
        </div>  
    </div>
</body>
<script src="../../assets/JS/Script.js"></script>
</html>
