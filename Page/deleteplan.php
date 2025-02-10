<?php
include("dbconnect.php");
session_start();

if (isset($_GET['plan_id'])) {
    $plan_ID = $_GET['plan_id'];
    
    $sql = "DELETE FROM plan_tbl WHERE plan_id = $plan_ID";
    
    $res = mysqli_query($con, $sql);
    
    if ($res == TRUE) {
        // Deletion successful
        $_SESSION['delete'] = "<div class='success'><h3>Pricing Plan Deleted Successfully..!</h3></div>";
        header("location: managepricing.php");
    } else {
        // Deletion failed
        $_SESSION['delete'] = "<div class='error'><h3>Failed to Delete Pricing Plan..!</h3></div>";
        header("location: managepricing.php");
    }
} else {
    header("location: managepricing.php");
}
?>