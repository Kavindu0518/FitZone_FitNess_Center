<?php


$server = "localhost";
$dbusername = "root";
$password = "";
$dbname = "fitzon_system";

//connect with DB
$con = mysqli_connect($server, $dbusername, $password, $dbname);

//check the connection
if (mysqli_connect_errno()) {
    echo "Failed to connect with the database: " . mysqli_connect_error();
    die();
} else {
    // echo "Done"; // Uncomment for testing purposes if needed
}

?>


