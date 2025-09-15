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

<div class="sidebar">
    <div class="logo">
        <img src="../../assets/images/Hollow-Mountains.png" alt="Logo">
    </div>
    <a href="account-admin.php"><i class="fas fa-home"></i></a>
    <a href="#"><i class="fas fa-bell"></i></i></a>
    <a href="#"><i class="fas fa-cog"></i></a>
    <a href="#"><i class="fas fa-sign-out-alt"></i></a>
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
</html>