<?php
include("dbconnect.php");
session_start();

if (isset($_GET['tra_id'])) {
    $mem_ID = $_GET['tra_id'];
    
    $sql = "DELETE FROM tra WHERE tra_id = $mem_ID";
    
    $res = mysqli_query($con, $sql);
    
    if ($res == TRUE) {
        // Deletion successful
        $_SESSION['delete'] = "<div class='success'><h3>Trainer Deleted Successfully..!</h3></div>";
        header("location: managetrainers.php");
    } else {
        // Deletion failed
        $_SESSION['delete'] = "<div class='error'><h3>Failed to Delete Trainer..!</h3></div>";
        header("location: managetrainers.php");
    }
} else {
    header("location: managetrainers.php");
}
?>