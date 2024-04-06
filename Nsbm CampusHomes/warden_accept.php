<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["accept"])) {
    
    $pid = $_POST["pid"];
    
    // if warden provide ,
    $reason = isset($_POST["reason"]) ? $_POST["reason"] : '';

   
    $query = "UPDATE property SET approval_status = 'approved'";
    if (!empty($reason)) {
        
        $query .= ", approval_reason = '$reason'";
    }
    $query .= " WHERE pid = $pid";

    // Execute the update query
    if (mysqli_query($con, $query)) {
        
        header("Location: " . $_SERVER["HTTP_REFERER"]); // Redirect back to the previous page
        exit(); 
    } else {
    
        echo "Error updating record: " . mysqli_error($con);
    }
} else {
    
    echo "Invalid request!";
}
?>
