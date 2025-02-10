<?php
session_start(); // Start the session at the top of the file
include("dbconnect.php");

if (isset($_POST["submit"])) {
    $mem_Name = $_POST["member-name"];
    $mem_Email = $_POST["email"];
    $mem_Cnum = $_POST["phone"];
    $mem_Type = $_POST["membership"];
    $mem_Psw = $_POST["member-psw"];

    if (!empty($mem_Name) && !empty($mem_Email) && !empty($mem_Cnum) && !empty($mem_Type) && !empty($mem_Psw)) {
        $userResgistration = "INSERT INTO members_tbl(mem_name, mem_email, contact, mem_type, mem_psw) 
                              VALUES ('$mem_Name', '$mem_Email', '$mem_Cnum', '$mem_Type', '$mem_Psw')";

        $res1 = mysqli_query($con, $userResgistration);

        if ($res1) {
            $_SESSION['added'] = "<div class='success'><h3>New Member Added Successfully!</h3></div>";
            header("Location: managemember.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
            exit();
        }
    } else {
        $_SESSION['empty'] = "<div class='error'><h3>Fields cannot be empty!</h3></div>";
        header("Location: managemember.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Members - FitZone Fitness Center</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
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
</head>
<body>
    <div class="dashboard">

        <?php
	        include("adminheader.php"); // Include your admin header here
        ?>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <header class="header">
                <h1>Manage Members</h1>
                <!-- Page Down Button -->
                <button class="page-down-btn" id="pageDownBtn">⬇️</button>
                <p>View, edit, or delete members of FitZone Fitness Center.</p>
                <br>
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
</br>

            </header>

            <!-- Table Section -->
            <section class="table-section">
                <h2>Current Members</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Member Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Membership Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch members from the database
                        $query = "SELECT * FROM members_tbl";
                        $result = mysqli_query($con, $query);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                        <td>{$row['mem_name']}</td>
                                        <td>{$row['mem_email']}</td>
                                        <td>{$row['contact']}</td>
                                        <td>{$row['mem_type']}</td>
                                        <td>
                                            <a href='editmember.php?mem_id={$row['mem_id']}' class='btn-edit'>Edit</a>
                                            <a href='deletemember.php?mem_id={$row['mem_id']}' class='btn-delete'>Delete</a>
                                        </td>
                                    </tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </section>

            <!-- Add/Edit Member Form -->
            <section class="form-section">
                <h2>Add/Edit Member</h2>
                <form action="managemember.php" method="post">
                    <div class="form-group">
                        <label for="member-name">Member Name</label>
                        <input type="text" id="member-name" name="member-name" placeholder="Enter member name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter email address" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" placeholder="Enter phone number" required>
                    </div>
                    <div class="form-group">
                        <label for="membership">Membership Type</label>
                        <select id="membership" name="membership" required>
                            <option value="gold">Gold</option>
                            <option value="silver">Silver</option>
                            <option value="platinum">Platinum</option>
                            <option value="basic">Basic</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="member-psw">Password</label>
                        <input type="text" id="member-psw" name="member-psw" placeholder="Enter member password" required>
                    </div>
                    <button name="submit" type="submit" class="submit-btn">Save Member</button>
                </form>
            </section>
        </div>
    </div>

    <script>
        // Page Down Button Logic
        const pageDownBtn = document.getElementById('pageDownBtn');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                pageDownBtn.style.display = 'block';
            } else {
                pageDownBtn.style.display = 'none';
            }
        });

        pageDownBtn.addEventListener('click', () => {
            window.scrollTo({
                top: document.body.scrollHeight,
                behavior: 'smooth'
            });
        });
    </script>
</body>
</html>
