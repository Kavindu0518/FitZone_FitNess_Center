<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - FitZone Fitness Center</title>
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

/* Reports Section */
.reports-section {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
}

.report-card {
    background: #1f1f1f;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    text-align: center;
    padding: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.report-card:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.7);
}

.report-card h2 {
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: #ffa500;
}

.report-card p {
    font-size: 1rem;
    margin-bottom: 10px;
    color: #cccccc;
}

.report-card h3 {
    font-size: 2rem;
    color: #28a745;
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

.btn-download {
    background: #28a745;
    color: #121212;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-download:hover {
    background: #218838;
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
                <h1>Reports</h1>
                <p>View detailed reports and analytics for FitZone Fitness Center.</p>
            </header>

            <!-- Reports Section -->
            <section class="reports-section">
                <div class="report-card">
                    <h2>Active Members</h2>
                    <p>Current Active Members</p>
                    <h3>120</h3>
                </div>
                <div class="report-card">
                    <h2>Monthly Revenue</h2>
                    <p>Total Revenue (This Month)</p>
                    <h3>$12,500</h3>
                </div>
                <div class="report-card">
                    <h2>New Registrations</h2>
                    <p>New Members This Month</p>
                    <h3>45</h3>
                </div>
                <div class="report-card">
                    <h2>Classes Conducted</h2>
                    <p>Total Classes This Month</p>
                    <h3>150</h3>
                </div>
            </section>

            <!-- Detailed Reports Table -->
            <section class="table-section">
                <h2>Detailed Reports</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Report Name</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Monthly Revenue Report</td>
                            <td>Detailed breakdown of this month's revenue.</td>
                            <td>Dec 2024</td>
                            <td>
                                <button class="btn-download">Download</button>
                            </td>
                        </tr>
                        <tr>
                            <td>New Member Report</td>
                            <td>List of all new members registered this month.</td>
                            <td>Dec 2024</td>
                            <td>
                                <button class="btn-download">Download</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Class Performance Report</td>
                            <td>Analysis of classes conducted and attendance.</td>
                            <td>Dec 2024</td>
                            <td>
                                <button class="btn-download">Download</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</body>
</html>