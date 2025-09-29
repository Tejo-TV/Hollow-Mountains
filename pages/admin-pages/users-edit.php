<?php
//---------------------------------------------------------------------------------------------------//
// Script Name          : users.php
// Description          : Admin panel for managing users
// Developer Name       : Tejo Veldman
// Project              : Hollow Mountains
// Date                 : School Year 3 - Period 1 - 2025
//---------------------------------------------------------------------------------------------------//

session_start();

// Check if user is an admin
if ($_SESSION["userRole"] === "admin") {
    echo "<script>console.log('Correct role');</script>";
} else {
    echo "<script>window.location.href = '../login.php?error=wrongWay';</script>";
    exit();
}

require_once '../../config/DB_connect.php';

// Update user information
if (isset($_POST['update-user'])) {
    $fullname_update = $_POST['fullName'];
    $nickname_update = $_POST['nickname'];

    if (!empty($_POST['password'])) {
        $password_update = hash('sha256', $_POST['password']);
        $query = mysqli_query(
            $conn,
            "UPDATE user SET naam = '$fullname_update', gebruikersnaam = '$nickname_update', wachtwoord = '$password_update' WHERE ID = '{$_GET["user"]}'"
        );
    } else {
        $query = mysqli_query(
            $conn,
            "UPDATE user SET naam = '$fullname_update', gebruikersnaam = '$nickname_update' WHERE ID = '{$_GET["user"]}'"
        );
    }

    if ($query) {
        echo "<script>window.location.href = 'users.php?error=userSaved';</script>";
        exit();
    } else {
        echo "<script>window.location.href = 'users.php?error=userNotSaved';</script>";
        exit();
    }
}

// Update user address
if (isset($_POST['update-user-address'])) {
    $street_update = $_POST['street'];
    $houseNumber_update = $_POST['houseNumber'];
    $addition_update = $_POST['addition'];
    $postcode_update = $_POST['postcode'];
    $city_update = $_POST['city'];
    $country_update = $_POST['country'];

    $query = mysqli_query(
        $conn,
        "UPDATE address SET straat = '$street_update', huisnummer = '$houseNumber_update', toevoeging = '$addition_update', postcode = '$postcode_update', stad = '$city_update', land = '$country_update' WHERE user_ID = '{$_GET["user"]}'"
    );

    if ($query) {
        echo "<script>window.location.href = 'users.php?success=userSaved';</script>";
        exit();
    } else {
        echo "<script>window.location.href = 'users.php?error=addressNotSaved';</script>";
        exit();
    }
}

// Fetch user information
$sql_user = "SELECT * FROM user WHERE ID = '{$_GET["user"]}'";
$result_user = $conn->query($sql_user);

if ($result_user && $result_user->num_rows === 1) {
    $user = $result_user->fetch_assoc();
    $naam = $user['naam'];
    $roepnaam = $user['gebruikersnaam'];
}

// Fetch user address
$sql_address = "SELECT * FROM address WHERE user_ID = '{$_GET["user"]}'";
$result_address = $conn->query($sql_address);

if ($result_address && $result_address->num_rows === 1) {
    $address = $result_address->fetch_assoc();
    $straat = $address['straat'];
    $huisnummer = $address['huisnummer'];
    $toevoeging = $address['toevoeging'];
    $postcode = $address['postcode'];
    $stad = $address['stad'];
    $land = $address['land'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hollow Mountains - Users</title>
    <link rel="stylesheet" href="../../assets/CSS/style.css" />
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/Hollow-Mountains.png">
    <!-- Font Awesome for icons -->
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
        <a onclick="window.location.href='users.php#start'"><i class="fas fa-user-plus" id="userIcon"></i></a>
        <a href="#"><i class="fas fa-sign-out-alt"></i></a>
    </div>

    <!-- Users Dashboard -->
    <div class="admin-account-dashboard">
        <div class="account-card">
            <?php
            $sql_all_users = "SELECT * FROM user";
            $result_all_users = $conn->query($sql_all_users);

            if ($result_all_users->num_rows > 0) {
                while ($row = $result_all_users->fetch_assoc()) {
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
                echo "No users found";
            }
            ?>
        </div>

        <div class="account-card">
            <h2>User Settings</h2>

            <!-- Personal Information Form -->
            <form id="personalForm" method="POST">
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" id="fullName" name="fullName" placeholder="User's full name" value="<?php echo $naam; ?>" required>
                </div>
                <div class="form-group">
                    <label for="nickname">Nickname</label>
                    <input type="text" id="nickname" name="nickname" placeholder="User's nickname" value="<?php echo $roepnaam; ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="New password">
                </div>
                <div class="buttons">
                    <button type="submit" name="update-user">Save</button>
                </div>
            </form>

            <!-- Address Information Form -->
            <form id="addressForm" method="POST">
                <div class="address-grid">
                    <div class="form-group">
                        <label for="street">Street</label>
                        <input type="text" id="street" name="street" placeholder="Street" value="<?php echo $straat; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="houseNumber">House Number</label>
                        <input type="text" id="houseNumber" name="houseNumber" placeholder="House Number" value="<?php echo $huisnummer; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="addition">Addition</label>
                        <input type="text" id="addition" name="addition" placeholder="Addition" value="<?php echo $toevoeging; ?>">
                    </div>
                    <div class="form-group">
                        <label for="postcode">Postcode</label>
                        <input type="text" id="postcode" name="postcode" placeholder="Postcode" value="<?php echo $postcode; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" placeholder="City" value="<?php echo $stad; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" id="country" name="country" placeholder="Country" value="<?php echo $land; ?>" required>
                    </div>
                </div>
                <div class="buttons">
                    <button type="submit" name="update-user-address">Save</button>
                </div>
            </form>
        </div>
    </div>
    <script src="../../assets/JS/Script.js"></script>
</body>
</html>
