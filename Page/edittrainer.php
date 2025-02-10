<?php
session_start(); // Start the session
include("dbconnect.php"); // Include database connection

// Check if the `mem_id` is passed via GET
if (isset($_GET['tra_id'])) {
    $ID = $_GET['tra_id'];

    // Fetch the existing member details
    $sql = "SELECT * FROM tra WHERE tra_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $tra_Name = $row["tra_name"];
        $tra_Speci = $row["tra_speci"];
        $tra_Cnum = $row["contact"];
        $tra_due = $row["year"];
    } else {
        $_SESSION['update'] = "<div class='error'><h3>Traines not found.</h3></div>";
        header('Location: managetrainers.php');
        exit();
    }
} else {
    $_SESSION['update'] = "<div class='error'><h3>Invalid Request.</h3></div>";
    header('Location: managetrainers.php');
    exit();
}

// Handle the form submission
if (isset($_POST['submit'])) {
    $tra_Name = $_POST["trainer-name"];
    $tra_Speci = $_POST["specialization"];
    $tra_Cnum = $_POST["contact"];
    $tra_due = $_POST["experience"];

    // Update the member details
    $sql = "UPDATE tra SET tra_name = ?, tra_speci = ?, contact = ?, year = ? WHERE tra_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $tra_Name, $tra_Speci, $tra_Cnum, $tra_due, $ID);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['update'] = "<div class='success'><h3>Traines details updated successfully!</h3></div>";
        header('Location: managetrainers.php');
        exit();
    } else {
        $_SESSION['update'] = "<div class='error'><h3>Failed to update Traines details. Error: " . mysqli_error($con) . "</h3></div>";
        header('Location: managetrainers.php');
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Trainers - FitZone Fitness Center</title>
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

.form-group input {
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

.page-down-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 50px;
    height: 50px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 50%;
    font-size: 20px;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s ease, transform 0.3s ease;
    display: none; /* Hidden by default */
}

.page-down-btn:hover {
    background-color: #0056b3;
    transform: scale(1.1);
}
</style>
<body>
    <div class="dashboard">

    <?php
	    include("adminheader.php");
    ?>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <header class="header">
                <h1>Edit Trainers</h1>
                <!-- Page Down Button -->
                <button class="page-down-btn" id="pageDownBtn">⬇️</button>
                <p>Edit,trainers in FitZone Fitness Center.</p>
            </header>


<!-- Add/Edit Trainer Form -->
            <section class="form-section">
                <h2>Add/Edit Trainer</h2>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="trainer-name">Trainer Name</label>
                        <input type="text" id="trainer-name" name="trainer-name" value="<?php echo htmlspecialchars($tra_Name); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="specialization">Specialization</label>
                        <input type="text" id="specialization" name="specialization" value="<?php echo htmlspecialchars($tra_Speci); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="text" id="contact" name="contact" value="<?php echo htmlspecialchars($tra_Cnum); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="experience">Experience (Years)</label>
                        <input type="number" id="experience" name="experience" value="<?php echo htmlspecialchars($tra_due); ?>" required>
                    </div>
                    <button name="submit" type="submit" class="submit-btn">Save Trainer</button>
                </form>
            </section>
        </div>
    </div>

</body>
</html>


