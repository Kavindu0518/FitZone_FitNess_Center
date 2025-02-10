<?php
session_start(); // Start the session
include("dbconnect.php");

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])) {
    $class_name = $_POST["class-name"];
    $class_type = $_POST["class-type"];
    $class_complexity = $_POST["class-complexity"];
    $class_min = $_POST["duration"];
    $class_tea = $_POST["trainer"];

    // Handle image upload
    if (isset($_FILES['class-image']) && $_FILES['class-image']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['class-image']['name'];
        $image_tmp = $_FILES['class-image']['tmp_name'];
        $image_folder = 'uploads/classes/';

        // Create the uploads folder if not exists
        if (!is_dir($image_folder)) {
            mkdir($image_folder, 0777, true);
        }

        $image_path = $image_folder . basename($image_name);

        if (move_uploaded_file($image_tmp, $image_path)) {
            // Insert into database using prepared statements
            $query = "INSERT INTO class_tbl (class_name, class_type, class_complexity, class_min, class_tea, class_image) 
                      VALUES (?, ?, ?, ?, ?, ?)";
            if ($stmt = $con->prepare($query)) {
                // Corrected type definition string to "sssiss"
                $stmt->bind_param("sssiss", $class_name, $class_type, $class_complexity, $class_min, $class_tea, $image_path);
                if ($stmt->execute()) {
                    $_SESSION['added'] = "<div class='success'><h3>New Class Added Successfully!</h3></div>";
                    header("Location: manageclass.php");
                    exit();
                } else {
                    $_SESSION['error'] = "<div class='error'><h3>Failed to add class: " . $stmt->error . "</h3></div>";
                }
                $stmt->close();
            } else {
                $_SESSION['error'] = "<div class='error'><h3>Database error: " . $con->error . "</h3></div>";
            }
        } else {
            $_SESSION['error'] = "<div class='error'><h3>Failed to upload image.</h3></div>";
        }
    } else {
        $_SESSION['error'] = "<div class='error'><h3>Invalid image or no image uploaded.</h3></div>";
    }
    header("Location: manageclass.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Classes - FitZone Fitness Center</title>
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
            <!-- Header -->
            <header class="header">
                <h1>Manage Classes</h1>
                <button class="page-down-btn" id="pageDownBtn">⬇️</button>
                <p>View, edit, or delete classes offered by FitZone Fitness Center.</p>
                <div>
    <?php
            if(isset($_SESSION['added']))
            {
            echo $_SESSION['added'];
            unset($_SESSION['added']);
            }

        if(isset($_SESSION['error']))
        {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
    ?>
</div>
            </header>

            <!-- Table Section -->
            <section class="table-section">
                <h2>Current Classes</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Class Name</th>
                            <th>Type</th>
                            <th>Complexity</th>
                            <th>Duration</th>
                            <th>Trainer</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch classes from the database
                        $query = "SELECT * FROM class_tbl";
                        $result = mysqli_query($con, $query);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                        <td>{$row['class_name']}</td>
                                        <td>{$row['class_type']}</td>
                                        <td>{$row['class_complexity']}</td>
                                        <td>{$row['class_min']} mins</td>
                                        <td>{$row['class_tea']}</td>
                                        <td>
                                            <a href='editclass.php?class_id={$row['class_id']}' class='btn-edit'>Edit</a>
                                            <a href='deleteclass.php?class_id={$row['class_id']}' class='btn-delete'>Delete</a>
                                        </td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No classes found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </section>

            <!-- Add/Edit Class Form -->
            <section class="form-section">
                <h2>Add/Edit Class</h2>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="class-name">Class Name</label>
                        <input type="text" id="class-name" name="class-name" placeholder="Enter class name" required>
                    </div>
                    <div class="form-group">
                        <label for="class-type">Class Type</label>
                        <select id="class-type" name="class-type" required>
                            <option value="mind-body">Mind & Body</option>
                            <option value="strength">Strength</option>
                            <option value="dance">Dance</option>
                            <option value="cardio">Cardio</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="class-complexity">Class complexity</label>
                        <select id="class-complexity" name="class-complexity" required>
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Advanced">Advanced</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration (mins)</label>
                        <input type="number" id="duration" name="duration" placeholder="Enter duration" required>
                    </div>
                    <div class="form-group">
                        <label for="trainer">Trainer</label>
                        <select id="trainer" name="trainer" required>
                            <?php
                            $sql = "SELECT DISTINCT tra_name FROM tra";
                            $res = mysqli_query($con, $sql);
                            if (mysqli_num_rows($res) > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    echo "<option value='{$row['tra_name']}'>{$row['tra_name']}</option>";
                                }
                            } else {
                                echo "<option value='0'>No Trainer Found</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="class-image">Class Image | [Size: 400*250]</label>
                        <input type="file" id="class-image" name="class-image" accept="image/*" required>
                    </div>
                    <button name="submit" type="submit" class="submit-btn">Save Class</button>
                </form>
            </section>
        </div>
    </div>
<script>
    const pageDownBtn = document.getElementById('pageDownBtn');
    window.addEventListener('scroll', () => {
        pageDownBtn.style.display = window.scrollY > 100 ? 'block' : 'none';
    });
    pageDownBtn.addEventListener('click', () => {
        window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
    });
</script>

</body>
</html>
