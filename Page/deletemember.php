<?php
include("dbconnect.php");
session_start();

if (isset($_GET['mem_id'])) {
    $mem_ID = $_GET['mem_id'];
    
    $sql = "DELETE FROM members_tbl WHERE mem_id = $mem_ID";
    
    $res = mysqli_query($con, $sql);
    
    if ($res == TRUE) {
        // Deletion successful
        $_SESSION['delete'] = "<div class='success'><h3>Member Deleted Successfully..!</h3></div>";
        header("location: managemember.php");
    } else {
        // Deletion failed
        $_SESSION['delete'] = "<div class='error'><h3>Failed to Delete Member..!</h3></div>";
        header("location: managemember.php");
    }
} else {
    header("location: managemember.php");
}
?>