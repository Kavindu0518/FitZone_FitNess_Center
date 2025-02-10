<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - FitZone Fitness Center</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
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

.menu li a:hover {
    background-color: #ffa500;
    color: #121212;
}

/* Main Content */
.main-content {
    flex: 1;
    padding: 20px;
}

.header {
    margin-bottom: 30px;
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

/* Cards Section */
.cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
}

.card {
    background-color: #1f1f1f;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
}

.card h2 {
    font-size: 2rem;
    margin-bottom: 10px;
    color: #ffa500;
}

.card p {
    font-size: 1rem;
    color: #cccccc;
}

/* Table Section */
.table-section {
    background-color: #1f1f1f;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
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

/* Responsive Design */
@media (max-width: 768px) {
    .dashboard {
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
    }

    .cards {
        grid-template-columns: 1fr;
    }
}
    </style>
    <div class="dashboard">
    <?php
	    include("adminheader.php");
        include("dbconnect.php");
    ?>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <header class="header">
                <h1>Admin Dashboard</h1>
                <p>Welcome back! Manage your fitness center with ease.</p>
            </header>

            <!-- Cards Section -->
            <section class="cards">
                <div class="card">
                    <!-- <h2>120</h2> -->
                    <?php
                    $sql = "SELECT * FROM members_tbl";
                    $res = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($res);
                    echo "<h2>$count</h2>";
                ?>
                    <p>Active Members</p>
                </div>
                <div class="card">
                <?php
                    $sql = "SELECT * FROM tra";
                    $res = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($res);
                    echo "<h2>$count</h2>";
                ?>
                    <p>Trainers</p>
                </div>
                <div class="card">
                <?php
                    $sql = "SELECT * FROM class_tbl";
                    $res = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($res);
                    echo "<h2>$count</h2>";
                ?>
                    <p>Classes Scheduled</p>
                </div>
                <div class="card">
                <?php
                    $sql = "SELECT * FROM plan_tbl";
                    $res = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($res);
                    echo "<h2>$count</h2>";
                ?>
                    <p>Pricing Plan</p>
                </div>
            </section>

            <!-- Table Section -->
            <section class="table-section">
                <h2>Recent Member Registrations</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Membership Type</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Fetch the latest three members from the database
                    $query = "SELECT * FROM members_tbl ORDER BY mem_id DESC LIMIT 5"; // Replace 'mem_id' with your unique identifier or timestamp column
                    $result = mysqli_query($con, $query);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>{$row['mem_name']}</td>
                                    <td>{$row['mem_email']}</td>
                                    <td>{$row['contact']}</td>
                                    <td>{$row['mem_type']}</td>
                                </tr>";
                        }
                    }
                    ?>

                    </tbody>
                </table>
            </section>
        </div>
    </div>
</body>
</html>