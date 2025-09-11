<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hollow Mountains - Admin</title>
    <link rel="stylesheet" href="../assets/CSS/style.css" />
    <link rel="shortcut icon" type="x-icon" href="../assets/images/Hollow-Mountains.png">
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

    <div class="sidebar"></div>
    <div class="profileHome-admin"></div>

</body>
</html>