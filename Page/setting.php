<?php
session_start(); // Start the session at the top of the file
include("dbconnect.php");

if (isset($_POST["submit"])) {
    $admin_Name = $_POST["name"];
    $admin_Email = $_POST["email"];
    $admin_Cnum = $_POST["phone"];
    $admin_Psw = $_POST["new-password"];

    if (!empty($admin_Name) && !empty($admin_Email) && !empty($admin_Cnum) && !empty($admin_Psw)) {
        $userResgistration = "INSERT INTO admin_tbl(admin_name, admin_email, contact, admin_psw) 
                              VALUES ('$admin_Name', '$admin_Email', '$admin_Cnum', '$admin_Psw')";

        $res1 = mysqli_query($con, $userResgistration);

        if ($res1) {
            $_SESSION['added'] = "<div class='success'><h3>New Admin Added Successfully!</h3></div>";
            header("Location: setting.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
            exit();
        }
    } else {
        $_SESSION['empty'] = "<div class='error'><h3>Fields cannot be empty!</h3></div>";
        header("Location: setting.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - FitZone Fitness Center</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<style>
    /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: #121212; /* Dark theme background */
    color: #e0e0e0; /* Light text */
}

/* Dashboard Layout */
.dashboard {
    display: flex;
    height: 100vh;
}

/* Sidebar */
.sidebar {
    width: 250px;
    background-color: #1c1c1c;
    padding: 20px;
    display: flex;
    flex-direction: column;
}

.sidebar-header h2 {
    color: #ffa500;
    text-align: center;
    margin-bottom: 30px;
}

.menu {
    list-style: none;
    padding: 0;
}

.menu li {
    margin-bottom: 20px;
}

.menu li a {
    color: #e0e0e0;
    text-decoration: none;
    font-size: 1rem;
    padding: 10px;
    display: block;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.menu li a:hover,
.menu li a.active {
    background-color: #ffa500;
    color: #121212;
}

/* Main Content */
.main-content {
    flex: 1;
    padding: 20px;
}

.header h1 {
    font-size: 2rem;
    margin-bottom: 10px;
    color: #ffa500;
}

.header p {
    font-size: 1rem;
    color: #cccccc;
}

/* Settings Section */
.settings-section {
    background-color: #1f1f1f;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    margin-bottom: 30px;
}

.settings-section h2 {
    font-size: 1.5rem;
    margin-bottom: 20px;
    color: #ffa500;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-size: 1rem;
    margin-bottom: 5px;
    color: #cccccc;
}

.form-group input,
.form-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #333;
    border-radius: 5px;
    background: #2c2c2c;
    color: #e0e0e0;
    font-size: 1rem;
}

.form-group input[type="checkbox"] {
    width: auto;
    margin-right: 10px;
}

.submit-btn {
    display: inline-block;
    background: #ffa500;
    color: #121212;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.2s ease;
}

.submit-btn:hover {
    background: #ffcc00;
    transform: scale(1.05);
}
</style>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <?php
	    include("adminheader.php");
    ?>
        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <header class="header">
                <h1>Settings</h1>
                <p>Manage your Admin account and site preferences here.</p>
            </header>

            <!-- Profile Settings -->
            <section class="settings-section">
                <h2>Admin Profile Settings</h2>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>
                    </div>
                    <div class="form-group">
                        <label for="new-password">Password</label>
                        <input type="password" id="new-password" name="new-password" placeholder="Enter your new password" required>
                    </div>
                    <button name="submit" type="submit" class="submit-btn">Save Changes</button>
                </form>
            </section>

            <!-- Password Settings
            <section class="settings-section">
                <h2>Change Password</h2>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="current-password">Current Password</label>
                        <input type="password" id="current-password" name="current-password" placeholder="Enter your current password" required>
                    </div>
                    <div class="form-group">
                        <label for="new-password">New Password</label>
                        <input type="password" id="new-password" name="new-password" placeholder="Enter your new password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm New Password</label>
                        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your new password" required>
                    </div>
                    <button type="submit" class="submit-btn">Update Password</button>
                </form>
            </section> -->
            <!-- Site Preferences -->
            <section class="settings-section">
                <h2>Site Preferences</h2>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="theme">Select Theme</label>
                        <select id="theme" name="theme">
                            <option value="light">Light</option>
                            <option value="dark" selected>Dark</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="notifications">Enable Notifications</label>
                        <input type="checkbox" id="notifications" name="notifications" checked>
                    </div>
                    <button type="submit" class="submit-btn">Save Preferences</button>
                </form>
            </section>
        </div>
    </div>
</body>
</html>