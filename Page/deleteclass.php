<?php
include("dbconnect.php");
session_start();

if (isset($_GET['class_id'])) {
    $class_ID = $_GET['class_id'];
    
    $sql = "DELETE FROM class_tbl WHERE class_id = $class_ID";
    
    $res = mysqli_query($con, $sql);
    
    if ($res == TRUE) {
        // Deletion successful
        $_SESSION['delete'] = "<div class='success'><h3>Class Deleted Successfully..!</h3></div>";
        header("location: manageclass.php");
    } else {
        // Deletion failed
        $_SESSION['delete'] = "<div class='error'><h3>Failed to Delete Class..!</h3></div>";
        header("location: manageclass.php");
    }
} else {
    header("location: manageclass.php");
}
?>