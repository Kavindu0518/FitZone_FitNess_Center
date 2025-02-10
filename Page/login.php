
<?php
session_start();
include("dbconnect.php");


if(isset($_POST["login"]))
{
    $userName = $_POST["username"];
    $userPsw = ($_POST["password"]);
    
    $sql = "SELECT * FROM members_tbl WHERE mem_email='$userName' AND mem_psw='$userPsw'";
    $result = mysqli_query($con, $sql);
    
    if(mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['mem_email'] = $row['mem_email'];
        $_SESSION['mem_type'] = $row['mem_type'];
        header("Location: afterloginpage.php"); // Redirect to after login page
        exit();
    }
    else
    {
        // echo "<center><h5>Invalid username or password form!</h5></center>";
        $_SESSION['error'] = "<div class='error'><h4>Invalid username or password form..!</h4></div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FitZone Fitness Center</title>
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
    background: url('../assets/loginback.jpg') no-repeat center center fixed;
    background-size: cover;
    color: #e0e0e0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Login Container */
.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
}

/* Login Card */
.login-card {
    background: #1f1f1f;
    padding: 40px 30px;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    text-align: center;
    width: 350px;
}

.login-card h1 {
    font-size: 2rem;
    margin-bottom: 10px;
    color: #ffa500;
}

.login-card p {
    font-size: 1rem;
    color: #cccccc;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
    text-align: left;
}

.form-group label {
    display: block;
    font-size: 1rem;
    margin-bottom: 5px;
    color: #cccccc;
}

.form-group input {
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #444;
    background: #2c2c2c;
    color: #e0e0e0;
    font-size: 1rem;
}

.form-group input::placeholder {
    color: #777;
}

.btn {
    display: inline-block;
    background: #ffa500;
    color: #121212;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.2s ease;
    width: 100%;
    margin-top: 15px;
}

.btn:hover {
    background: #ffcc00;
    transform: scale(1.05);
}

.extra-options {
    margin-top: 15px;
}

.extra-options a {
    color: #ffa500;
    text-decoration: none;
    font-size: 0.9rem;
    margin: 5px 10px;
    display: inline-block;
}

.extra-options a:hover {
    text-decoration: underline;
}

.error-message {
    color: #ff4444;
    font-size: 0.9rem;
    margin-bottom: 15px;
    background: #2c2c2c;
    padding: 10px;
    border-radius: 8px;
    text-align: center;
}
</style>
<body>
    <div class="login-container">
        <div class="login-card">
            <h1>Welcome Back!</h1>
            <p>Please log in to your account</p>

            <!-- Display error message -->
            <?php
            if (isset($_SESSION['error'])) {
                echo "<div class='error-message'>" . $_SESSION['error'] . "</div>";
                unset($_SESSION['error']);
            }
            ?>

            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" autocomplete="off" required>
                </div>
                <button type="submit" class="btn" name="login">Log In</button>
                <div class="extra-options">
                    <a href="#">Forgot Password?</a>
                    <a href="createaccount">Create an Account</a>
                </div>
                <div class="extra-options">
                    
                    Are you System Administrator..? <a href="adminlogin.php"><b>Login Here</b></a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>