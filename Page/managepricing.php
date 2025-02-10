<?php
session_start(); // Start the session at the top of the file
include("dbconnect.php");

if (isset($_POST["submit"])) {
    $plan_Name = $_POST["plan-name"];
    $plan_Price = $_POST["price"];
    $plan_Fea = $_POST["features"];
    $plan_Due = $_POST["duration"];

    if (!empty($plan_Name) && !empty($plan_Price) && !empty($plan_Fea) && !empty($plan_Due)) {
        $userResgistration = "INSERT INTO plan_tbl(plan_name, plan_price, plan_fea, plan_due) 
                              VALUES ('$plan_Name', '$plan_Price', '$plan_Fea', '$plan_Due')";

        $res1 = mysqli_query($con, $userResgistration);

        if ($res1) {
            $_SESSION['added'] = "<div class='success'><h3>New Pricing Plan Added Successfully!</h3></div>";
            header("Location: managepricing.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
            exit();
        }
    } else {
        $_SESSION['empty'] = "<div class='error'><h3>Fields cannot be empty!</h3></div>";
        header("Location: managepricing.php");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Pricing Plans - FitZone Admin</title>
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
    background-color: #121212; /* Dark background */
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

/* Table Section */
.table-section {
    background-color: #1f1f1f;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    margin-bottom: 30px;
}

.table-section h2 {
    font-size: 1.5rem;
    margin-bottom: 20px;
    color: #ffa500;
}

table {
    width: 100%;
    border-collapse: collapse;
    color: #e0e0e0;
}

thead th {
    text-align: left;
    background-color: #333;
    padding: 10px;
}

tbody td {
    padding: 10px;
    border-bottom: 1px solid #333;
}

tbody tr:hover {
    background-color: #2c2c2c;
}

.btn-edit {
    background: #ffa500;
    color: #121212;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-delete {
    background: #ff4444;
    color: #121212;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-edit:hover {
    background: #ffcc00;
}

.btn-delete:hover {
    background: #ff6666;
}

/* Form Section */
.form-section {
    background-color: #1f1f1f;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
}

.form-section h2 {
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
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #333;
    border-radius: 5px;
    background: #2c2c2c;
    color: #e0e0e0;
    font-size: 1rem;
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

    <?php
	        include("adminheader.php"); // Include your admin header here
        ?>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <header class="header">
                <h1>Manage Pricing Plans</h1>
                <p>View, edit, delete, or add new pricing plans for FitZone Fitness Center.</p>
                <div>
    <?php
            if(isset($_SESSION['added']))
            {
            echo $_SESSION['added'];
            unset($_SESSION['added']);
            }

        if(isset($_SESSION['empty']))
        {
            echo $_SESSION['empty'];
            unset($_SESSION['empty']);
        }
    ?>
</div>
            </header>

            <!-- Pricing Plans Table -->
            <section class="table-section">
                <h2>Current Pricing Plans</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Plan Name</th>
                            <th>Price</th>
                            <th>Features</th>
                            <th>Duration</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        // Fetch members from the database
                        $query = "SELECT * FROM plan_tbl";
                        $result = mysqli_query($con, $query);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                        <td>{$row['plan_name']}</td>
                                        <td>Rs.{$row['plan_price']}.00</td>
                                        <td>{$row['plan_fea']}</td>
                                        <td>{$row['plan_due']}</td>
                                        <td>
                                            <a href='editplan.php?plan_id={$row['plan_id']}' class='btn-edit'>Edit</a>
                                            <a href='deleteplan.php?plan_id={$row['plan_id']}' class='btn-delete'>Delete</a>
                                        </td>
                                    </tr>";
                            }
                        }
                        ?>
                        
                    </tbody>
                </table>
            </section>

            <!-- Add/Edit Pricing Plan Form -->
            <section class="form-section">
                <h2>Add/Edit Pricing Plan</h2>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="plan-name">Plan Name</label>
                        <input type="text" id="plan-name" name="plan-name" placeholder="Enter plan name" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price (e.g., Rs.5000.00)</label>
                        <input type="text" id="price" name="price" placeholder="Enter plan price" required>
                    </div>
                    <div class="form-group">
                        <label for="features">Features</label>
                        <textarea id="features" name="features" rows="4" placeholder="Enter plan features, separated by commas" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration (e.g., Month/Week/Day)</label>
                        <textarea id="duration" name="duration" rows="4" placeholder="Enter plan duration" required></textarea>
                    </div>
                    <button name="submit" type="submit" class="submit-btn">Save Plan</button>
                </form>
            </section>
        </div>
    </div>
</body>
</html>