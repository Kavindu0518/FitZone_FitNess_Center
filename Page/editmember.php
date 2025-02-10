<?php
session_start(); // Start the session
include("dbconnect.php"); // Include database connection

// Check if the `mem_id` is passed via GET
if (isset($_GET['mem_id'])) {
    $ID = $_GET['mem_id'];

    // Fetch the existing member details
    $sql = "SELECT * FROM members_tbl WHERE mem_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $mem_Name = $row["mem_name"];
        $mem_Email = $row["mem_email"];
        $mem_Cnum = $row["contact"];
        $mem_Type = $row["mem_type"];
    } else {
        $_SESSION['update'] = "<div class='error'><h3>Member not found.</h3></div>";
        header('Location: managemember.php');
        exit();
    }
} else {
    $_SESSION['update'] = "<div class='error'><h3>Invalid Request.</h3></div>";
    header('Location: managemember.php');
    exit();
}

// Handle the form submission
if (isset($_POST['submit'])) {
    $mem_Name = $_POST["member-name"];
    $mem_Email = $_POST["email"];
    $mem_Cnum = $_POST["phone"];
    $mem_Type = $_POST["membership"];

    // Update the member details
    $sql = "UPDATE members_tbl SET mem_name = ?, mem_email = ?, contact = ?, mem_type = ? WHERE mem_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $mem_Name, $mem_Email, $mem_Cnum, $mem_Type, $ID);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['update'] = "<div class='success'><h3>Member details updated successfully!</h3></div>";
        header('Location: managemember.php');
        exit();
    } else {
        $_SESSION['update'] = "<div class='error'><h3>Failed to update member details. Error: " . mysqli_error($con) . "</h3></div>";
        header('Location: managemember.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member - FitZone Fitness Center</title>
    <link rel="stylesheet" href="styles.css">
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
.form-group select {
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
        <?php include("adminheader.php"); ?>

        <!-- Main Content -->
        <div class="main-content">
            <header class="header">
                <h1>Update Member Details</h1>
                <p>Edit members of FitZone Fitness Center.</p>
            </header>

            <?php
            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            ?>

            <!-- Edit Member Form -->
            <section class="form-section">
                <h2>Edit Member</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="member-name">Member Name</label>
                        <input type="text" id="member-name" name="member-name" value="<?php echo htmlspecialchars($mem_Name); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($mem_Email); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($mem_Cnum); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="membership">Membership Type</label>
                        <select id="membership" name="membership" required>
                            <option value="gold" <?php if ($mem_Type == 'gold') echo 'selected'; ?>>Gold</option>
                            <option value="silver" <?php if ($mem_Type == 'silver') echo 'selected'; ?>>Silver</option>
                            <option value="platinum" <?php if ($mem_Type == 'platinum') echo 'selected'; ?>>Platinum</option>
                            <option value="basic" <?php if ($mem_Type == 'basic') echo 'selected'; ?>>Basic</option>
                        </select>
                    </div>
                    <button name="submit" type="submit" class="submit-btn">Save Member</button>
                </form>
            </section>
        </div>
    </div>
</body>
</html>
