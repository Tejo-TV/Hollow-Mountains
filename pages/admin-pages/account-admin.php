<?php 
//---------------------------------------------------------------------------------------------------//
// Script Name         : account-admin.php
// Description         : Admin homepage
// Developer           : Tejo Veldman
// Project             : Hollow Mountains
// Date                : School Year 3 - Period 1 - 2025
//---------------------------------------------------------------------------------------------------//

session_start();

// ------------------------
// Check if user is logged in as admin
// ------------------------
if ($_SESSION["userRole"] !== "admin") {
    echo "<script>window.location.href = '../login.php?error=wrongWay';</script>";
    exit();
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
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <?php
    // ------------------------
    // Show success popup if logged in
    // ------------------------
    if(isset($_GET["error"]) && $_GET["error"] === "none") {
        echo "<div class='popup'>
                <p> ✅ Successfully logged in! </p>
              </div>";
    }
    ?>

    <!-- Logout overlay -->
    <div id="signoutOverlay" class="signout-overlay">
        <div class="signout">
            <h2>Do you really want to log out?</h2>
            <div class="buttons">
                <button onclick="window.location.href='../Components/logout.inc.php'">Log Out</button>
                <button onclick="closeSignOutOverlay()">Cancel</button>
            </div>
        </div>
    </div>

    <!-- Settings overlay -->
    <div id="settingsOverlay" class="settings-overlay">
        <div class="settings">
            <h2>Account Settings</h2>
            <button class="close-btn" onclick="closeSettingsOverlay()">×</button>

            <!-- Personal Information Form -->
            <form id="personalForm">
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" id="fullName" name="fullName" placeholder="Your full name">
                </div>
                <div class="form-group">
                    <label for="nickname">Nickname</label>
                    <input type="text" id="nickname" name="nickname" placeholder="Your nickname">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="New password">
                </div>
                <div class="buttons">
                    <button type="submit">Save</button>
                </div>
            </form>

            <hr style="margin:20px 0; border-color:#555;" />

            <!-- Address Information Form -->
            <form id="addressForm">
                <div class="address-grid">
                    <div class="form-group">
                        <label for="street">Street</label>
                        <input type="text" id="street" name="street" placeholder="Street">
                    </div>
                    <div class="form-group">
                        <label for="houseNumber">House Number</label>
                        <input type="text" id="houseNumber" name="houseNumber" placeholder="House Number">
                    </div>
                    <div class="form-group">
                        <label for="addition">Addition</label>
                        <input type="text" id="addition" name="addition" placeholder="Addition">
                    </div>
                    <div class="form-group">
                        <label for="postcode">Postcode</label>
                        <input type="text" id="postcode" name="postcode" placeholder="Postcode">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" placeholder="City">
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" id="country" name="country" placeholder="Country">
                    </div>
                </div>
                <div class="buttons">
                    <button type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Sidebar navigation -->
    <div class="sidebar">
        <div class="logo">
            <img src="../../assets/images/Hollow-Mountains.png" alt="Logo">
        </div>
        <a href="account-admin.php"><i class="fas fa-home"></i></a>
        <a href="#"><i class="fas fa-bell"></i></a>
        <a onclick="signOutOverlay()"><i class="fas fa-sign-out-alt"></i></a>
    </div>

    <!-- Admin Dashboard -->
    <div class="admin-dashboard">
        <a href="users.php" class="admin-card">
            <i class="fas fa-users"></i>
            <h3>User Management</h3>
            <p>View / Edit / Add Users</p>
        </a>

        <a href="attracties-admin.php" class="admin-card">
            <i class="fas fa-bolt"></i>
            <h3>Manage Attractions</h3>
            <p>View / Edit / Add Attractions</p>
        </a>

        <a href="onderhoud-admin.php" class="admin-card">
            <i class="fas fa-tools"></i>
            <h3>Maintenance</h3>
            <p>Set maintenance schedule</p>
        </a>

        <a onclick="settingsOverlay()" class="admin-card">
            <i class="fas fa-cog"></i>
            <h3>User Settings</h3>
            <p>Update your account info</p>
        </a>

        <a href="#" class="admin-card">
            <i class="fas fa-ban"></i>
            <h3>In Development</h3>
            <p>(Not available)</p>
        </a>

        <a href="#" class="admin-card">
            <i class="fas fa-ban"></i>
            <h3>In Development</h3>
            <p>(Not available)</p>
        </a>
    </div>

    <script src="../../assets/JS/Script.js"></script>
</body>
</html>
